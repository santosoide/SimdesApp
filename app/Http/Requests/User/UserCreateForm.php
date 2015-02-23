<?php namespace SimdesApp\Http\Requests\User;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class UserCreateForm extends Request
{

    /**
     * @var array
     */
    protected $customAttributes = [
        'email'     => 'Email',
        'nama'      => 'Nama',
        'password'  => 'Password',
        'level'     => 'Level'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email|unique:users,email',
            'nama'      => 'required',
            'password'  => 'required|between:6,25|confirmed',
            'level'     => 'required|integer'
        ];
    }

    /**
     * @param $validator
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->customAttributes);
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();

        return [
            'success'    => false,
            'validation' => [
                'email'     => $message->first('email'),
                'nama'      => $message->first('nama'),
                'password'  => $message->first('password'),
                'is_active' => $message->first('is_active'),
                'level'     => $message->first('level')
            ]
        ];
    }
}
