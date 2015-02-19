<?php namespace SimdesApp\Http\Requests\Obyek;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class ObyekEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'jenis_id'      => 'Jenis Id',
        'obyek'         => 'Obyek',
        'organisasi_id' => 'Organisasi Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'max:255',
            'jenis_id'      => 'integer',
            'obyek'         => 'max:255',
            'organisasi_id' => 'max:255'
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
                'jenis_id'      => $message->first('jenis_id'),
                'obyek'         => $message->first('obyek'),
                'organisasi_id' => $message->first('organisasi_id')
            ]
        ];
    }
}
