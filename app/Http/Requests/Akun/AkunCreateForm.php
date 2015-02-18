<?php namespace SimdesApp\Http\Requests\Akun;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class AkunCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'akun'          => 'Akun'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'required|unique:akun,kode_rekening',
            'akun'          => 'required|max:255'
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
                'kode_rekening' => $message->first('kode_rekening'),
                'akun'          => $message->first('akun'),
            ]
        ];
    }
}
