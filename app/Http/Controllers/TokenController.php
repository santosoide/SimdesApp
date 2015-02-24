<?php namespace SimdesApp\Http\Controllers;

class TokenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return csrf_token();
	}

}
