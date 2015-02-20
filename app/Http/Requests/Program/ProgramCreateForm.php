<?php namespace SimdesApp\Http\Requests\Program;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class ProgramCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'bidang_id'     => 'Bidang Id',
        'program'       => 'Program',
        'organisasi_id' => 'Organisasi Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'required|max:255',
            'bidang_id'     => 'required|integer',
            'program'       => 'required|max:255',
            'organisasi_id' => 'required|max:255'
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
                'bidang_id'     => $message->first('bidang_id'),
                'program'       => $message->first('program'),
                'organisasi_id' => $message->first('organisasi_id')
            ]
        ];
    }
}
