<?php namespace SimdesApp\Http\Requests\User;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class UserEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'email'     => 'Email',
        'is_active' => 'Is Active',
        'level'     => 'Level'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'email',
            'is_active' => 'integer',
            'level'     => 'integer'
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
                'is_active' => $message->first('is_active'),
                'level'     => $message->first('level')
            ]
        ];
    }
}
