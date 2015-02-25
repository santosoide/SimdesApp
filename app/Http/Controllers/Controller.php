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
}
