<?php

namespace App\MyClass;

class Response
{

    public static function error($e)
    {
        // self::sendError($e);

        return response()->json([
            'icon'        => 'flaticon-alarm-1',
            'code'        => 500,
            'title'       => 'Terjadi Kesalahan',
            'message'    => "{$e->getFile()} : {$e->getLine()} {$e->getMessage()}",
            'trace'        => $e->getTraceAsString()
        ], 500);
    }


    public static function success($array = [])
    {
        if (!array_key_exists('message', $array)) {
            $array['message'] = 'Berhasil';
        }

        return response()->json(array_merge($array, [
            'code'        => 200,
        ]));
    }


    public static function save($array = [])
    {
        return response()->json(array_merge($array, [
            'icon'        => 'flaticon-alarm-1',
            'title'       => 'Berhasil Simpan',
            'code'        => 200,
        ]));
    }


    public static function update($array = [])
    {
        return response()->json(array_merge($array, [
            'icon'        => 'flaticon-alarm-1',
            'title'       => 'Berhasil Update',
            'code'        => 200,
        ]));
    }


    public static function delete($array = [])
    {
        return response()->json(array_merge($array, [
            'icon'        => 'flaticon-alarm-1',
            'title'    => 'Berhasil Dihapus',
            'code'        => 200,
        ]));
    }


    public static function invalid($array = [])
    {
        if (!array_key_exists('message', $array)) {
            $array['message'] = 'Tidak valid';
        }

        return response()->json(array_merge($array, [
            'code'        => 422,
        ]), 422);
    }

}
