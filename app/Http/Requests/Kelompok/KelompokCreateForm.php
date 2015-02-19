<?php namespace SimdesApp\Http\Requests\Kelompok;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class KelompokCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'akun_id'       => 'Akun Id',
        'kelompok'      => 'Kelompok',
    ];

    /**
     * Validation rule
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'required|max:255|unique:kelompok,kode_rekening',
            'akun_id'       => 'required|integer',
            'kelompok'      => 'required|max:15',
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
     * Format Error
     *
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
                'akun_id'       => $message->first('akun_id'),
                'kelompok'      => $message->first('kelompok')
            ]
        ];
    }
}
