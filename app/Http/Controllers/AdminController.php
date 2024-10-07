<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Campaign;
use App\Models\CampaignTarget;
use App\Models\Setting;
use App\MyClass\Response;
use App\MyClass\Validations;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    // -------------
    // DASHBOARD
    // -------------
    public function index()
    {
        $settings = Setting::getSettingCommon();

        $users = User::where('role', User::ROLE_USER)->count();

        return view('admin.index', [
            'title' => 'Dashboard',
            'settings' => $settings,
            'users' => $users,
        ]);
    }

    // -------------
    // USER
    // -------------
    public function userIndex(Request $request)
    {
        $settings = Setting::getSettingCommon();
        if ($request->ajax()) {
            return User::dt();
        }
        return view('admin.user.index', [
            'title' => 'User',
            'settings' => $settings,
        ]);
    }

    public function userStore(Request $request, User $user)
    {

        Validations::userValidation($request);

        DB::beginTransaction();

        try {
            $user->createUser([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            DB::commit();
            return \Res::save([
                'message' => 'User Berhasil Ditambahkan',
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    public function userUpdate(Request $request, User $user)
    {
        Validations::userEditValidation($request, $user->id);
        DB::beginTransaction();

        try {
            $user->updateUser($request->except(['password', 'confirm_password']));

            if(!empty($request->password)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            DB::commit();

            return \Res::update([
                'message' => 'User Berhasil Diupdate',
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    public function userDestroy(User $user)
    {
        DB::beginTransaction();

        try {
            $user->deleteUser();
            DB::commit();

            return \Res::delete([
                'message' => 'User Berhasil Dihapus',
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    public function userGet(User $user)
    {
        try {
			return Response::success([
				'user' => $user
			]);
		} catch (\Exception $e) {
			return Response::error($e);
		}
    }

    // ---------------
    // Pengaturan Umum
    // ---------------
    public function settingCommonIndex()
    {
        $title = "Umum";
        $settings = Setting::getSettingCommon();

        return view('admin.setting.common', [
            'title'            => $title,
            'settings'         => $settings,
            'breadcrumbs' => [
                [
                    'title' => "Dashboard",
                    'link'  => route('admin'),
                ],
                [
                    'title' => $title,
                    'link'  => route('admin.setting.common'),
                ],
            ],
        ]);
    }

    public function settingCommonStore(Request $request)
    {

        DB::beginTransaction();

        try {
            $requestAll = $request->all();

            Setting::commonStore($requestAll);

            DB::commit();

            return \Res::save();
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }
}
