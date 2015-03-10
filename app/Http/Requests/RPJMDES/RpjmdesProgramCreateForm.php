<?php namespace SimdesApp\Http\Requests\RPJMDES;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesProgramCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
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
            'kegiatan_id'    => 'required|integer',
            'pelaksanaan'    => 'required|integer',
            'sumber_dana_id' => 'required|integer'
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
                'kegiatan_id'    => $message->first('kegiatan_id'),
                'pelaksanaan'    => $message->first('pelaksanaan'),
                'sumber_dana_id' => $message->first('sumber_dana_id'),
            ]
        ];
    }
}
