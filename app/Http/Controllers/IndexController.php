<?php namespace SimdesApp\Http\Controllers;

class IndexController extends Controller
{

    /**
     * Show the back office index page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the front office index page
     *
     * @return \Illuminate\View\View
     */
    public function front()
    {
        return view('front/index');
    }
}
