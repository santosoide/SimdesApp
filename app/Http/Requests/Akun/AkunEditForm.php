<?php namespace SimdesApp\Http\Requests\Akun;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class AkunEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'akun' => 'Akun'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'akun' => 'max:255'
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
                'akun' => $message->first('akun'),
            ]
        ];
    }
}
