<?php namespace SimdesApp\Http\Requests\Kewenangan;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class KewenanganEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'kewenangan'    => 'Kewenangan'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'max:255',
            'kewenangan'    => 'max:255'
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
                'kewenangan'    => $message->first('kewenangan')
            ]
        ];
    }
}
