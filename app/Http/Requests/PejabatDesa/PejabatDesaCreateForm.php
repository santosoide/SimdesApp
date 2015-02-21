<?php namespace SimdesApp\Http\Requests\PejabatDesa;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class PejabatDesaCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'nama'          => 'Nama',
        'jabatan'       => 'Jabatan',
        'organisasi_id' => 'Organisasi Id',
        'user_id'       => 'User Id',
        'fungsi'        => 'Fungsi',
        'level'         => 'Level'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'nama'          => 'required|max:255',
            'jabatan'       => 'required|max:255',
            'organisasi_id' => 'required|max:255',
            'user_id'       => 'required|max:255',
            'fungsi'        => 'required|max:255',
            'level'         => 'required|integer|max:1'
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
                'nama'          => $message->first('nama'),
                'jabatan'       => $message->first('jabatan'),
                'organisasi_id' => $message->first('organisasi_id'),
                'user_id'       => $message->first('user_id'),
                'fungsi'        => $message->first('fungsi'),
                'level'         => $message->first('level')
            ]
        ];
    }
}
