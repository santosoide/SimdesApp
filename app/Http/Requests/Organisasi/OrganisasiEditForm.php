<?php namespace SimdesApp\Http\Requests\Organisasi;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class OrganisasiEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'nama'     => 'Nama',
        'alamat'   => 'Alamat',
        'no_telp'  => 'No Telepon',
        'email'    => 'Email',
        'desa'     => 'Desa',
        'kec_id'   => 'Kecamatan',
        'kab'      => 'Kabupaten',
        'kode_kab' => 'Kode Kabupaten'
    ];

    /**
     * Validation rule
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'     => 'max:255',
            'alamat'   => 'max:255',
            'no_telp'  => 'max:15',
            'email'    => 'email',
            'desa'     => 'max:255',
            'kec_id'   => 'integer',
            'kab'      => 'max:255',
            'kode_kab' => 'integer'
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
                'nama'     => $message->first('nama'),
                'alamat'   => $message->first('alamat'),
                'no_telp'  => $message->first('no_telp'),
                'email'    => $message->first('email'),
                'desa'     => $message->first('desa'),
                'kec_id'   => $message->first('kec_id'),
                'kab'      => $message->first('kab'),
                'kode_kab' => $message->first('kode_kab')
            ]
        ];
    }
}
