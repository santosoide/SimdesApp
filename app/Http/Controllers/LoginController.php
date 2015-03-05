<?php namespace SimdesApp\Http\Controllers;

class LoginController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('login');
	}

}
