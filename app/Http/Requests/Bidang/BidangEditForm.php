<?php namespace SimdesApp\Http\Requests\Bidang;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class BidangEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'fungsi_id'     => 'Fungsi Id',
        'bidang'        => 'Bidang'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'max:255',
            'fungsi_id'     => 'integer',
            'bidang'        => 'max:255'
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
                'fungsi_id'     => $message->first('fungsi_id'),
                'bidang'        => $message->first('bidang')
            ]
        ];
    }
}
