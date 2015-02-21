<?php namespace SimdesApp\Http\Requests\RPJMDES_Program;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesProgramEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'user_id'        => 'User Id',
        'organisasi_id'  => 'Organisasi Id',
        'kegiatan_id'    => 'Kegiatan Id',
        'pelaksanaan'    => 'Pelaksanaan',
        'sumber_dana_id' => 'Sumber Dana Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'        => 'max:255',
            'organisasi_id'  => 'max:255',
            'kegiatan_id'    => 'integer',
            'pelaksanaan'    => 'integer',
            'sumber_dana_id' => 'integer'
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
                'user_id'        => $message->first('user_id'),
                'organisasi_id'  => $message->first('organisasi_id'),
                'kegiatan_id'    => $message->first('kegiatan_id'),
                'pelaksanaan'    => $message->first('pelaksanaan'),
                'sumber_dana_id' => $message->first('sumber_dana_id'),
            ]
        ];
    }
}
