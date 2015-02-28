<?php namespace SimdesApp\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;

abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;

    /**
     * Get the input param
     *
     * @param $input
     *
     * @return mixed
     */
    public function input($input)
    {
        return Input::get($input);
    }

    /**
     * Get input only for login post
     *
     * @param array $input
     * @return mixed
     */
    protected function inputOnly($input = [])
    {
        return Input::only($input);
    }

    /**
     * Get the Level from the session
     *
     * @return mixed
     */
    public function getLevel()
    {
        try {
            \Auth::user()->level;
        } catch (Exception $ex) {
            return 'anda sudah logout, silahkan login kembali';
        }

        return \Auth::user()->level;
    }

    /**
     * Get Organisasi_id from the session
     *
     * @return mixed
     */
    public function getOrganisasiId()
    {
        //get organisasi id from session
        $organisasi_id = \Session::get('organisasi_id');
        if ($organisasi_id) {
            return $organisasi_id;
        } else {
            return 'anda sudah logout, silahkan login kembali';
        }
    }

    /**
     * Get the User_id from the session
     *
     * @return mixed
     */
    public function getUserId()
    {
        //get user id from session
        $user_id = \Session::get('user_id');
        if ($user_id) {
            return $user_id;
        } else {
            return 'anda sudah logout, silahkan login kembali';
        }
    }

//    /**
//     * Get Kewenangan_id from the session
//     *
//     * @return mixed
//     */
//    public function getProgramId()
//    {
//        //get program id from session
//        $program_id = \Session::get('program_id');
//        if ($program_id) {
//            return $program_id;
//        } else {
//            return 'anda sudah logout, silahkan login kembali';
//        }
//    }
//
//    /**
//     * Get Bidang_id from the session
//     *
//     * @return mixed
//     */
//    public function getBidangId()
//    {
//        //get bidang id from session
//        $bidang_id = \Session::get('bidang_id');
//        if ($bidang_id) {
//            return $bidang_id;
//        } else {
//            return 'anda sudah logout, silahkan login kembali';
//        }
//    }
}
