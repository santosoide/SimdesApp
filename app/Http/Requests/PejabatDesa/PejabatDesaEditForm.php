<?php namespace SimdesApp\Http\Requests\PejabatDesa;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class PejabatDesaEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'nama'          => 'Nama',
        'jabatan'       => 'Jabatan',
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
                'fungsi'        => $message->first('fungsi'),
                'level'         => $message->first('level')
            ]
        ];
    }
}
