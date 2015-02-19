<?php namespace SimdesApp\Http\Requests\Jenis;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class JenisCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'kelompok_id'   => 'Kelompok Id',
        'jenis'         => 'Jenis',
        'status'        => 'Status'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'required|max:255|unique:jenis,kode_rekening',
            'kelompok_id'   => 'required|integer',
            'jenis'         => 'required|max:255',
            'status'        => 'required|between:5,10'
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
                'kelompok_id'   => $message->first('kelompok_id'),
                'jenis'         => $message->first('jenis'),
                'status'        => $message->first('status')
            ]
        ];
    }

}
