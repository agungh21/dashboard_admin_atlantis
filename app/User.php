<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'active_at', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    public static function createUser(array $request)
    {
        $user = self::create($request);

        return $user;
    }

    public function updateUser(array $request)
    {
        $this->update($request);

        return $this;
    }

    public function deleteUser()
    {
        return $this->delete();
    }

    // function
    public function roleHtml()
    {
        if ($this->role == self::ROLE_ADMIN) {
            return '<span class="badge badge-primary">Admin</span>';
        } else {
            return '-';
        }
    }

    public function isAdmin()
    {
        return $this->role === "admin";
    }

    public static function dt()
    {
        $data = self::where('created_at', '!=', NULL);
        return \Datatables::eloquent($data)
            ->editColumn('action', function ($data) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item edit text-primary" href="javascript:void(0);" data-edit-href="' . route('admin.user.update', $data->id) . '" data-get-href="' . route('admin.user.get', $data->id) . '"><i class="fa fa-pen mr-2"></i> Edit</a>
                            <a class="dropdown-item delete text-danger" href="javascript:void(0);" data-delete-message="Yakin ingin menghapus?" data-delete-href="' . route('admin.user.destroy', $data->id) . '"><i class="fa fa-trash mr-2"></i> Hapus</a>
                        </div>
                    </div>
                ';

                return $action;
            })

            ->editColumn('role', function ($data) {
                return $data->roleHtml();
            })

            ->rawColumns(['action', 'role'])
            ->make(true);
    }
}
