<?php namespace SimdesApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {
    public function authorize()
    {
        return true;
    }

    public function forbiddenResponse()
    {
        return [
            'success' => false,
            'result'  => [
                'message' => 'You are unauthorized',
                'action'  => 'redirect',
                'path'    => 'logout'
            ]
        ];
    }
}
