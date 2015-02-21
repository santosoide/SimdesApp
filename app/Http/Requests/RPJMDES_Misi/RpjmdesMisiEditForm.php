<?php namespace SimdesApp\Http\Requests\RPJMDES_Misi;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesMisiEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'rpjmdes_id'    => 'RPJMDES Id',
        'misi'          => 'Misi',
        'user_id'       => 'User Id',
        'organisasi_id' => 'Organisasi Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'rpjmdes_id'    => 'max:255',
            'misi'          => 'max:255',
            'user_id'       => 'max:255',
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
                'rpjmdes_id'    => $message->first('rpjmdes_id'),
                'misi'          => $message->first('misi'),
                'user_id'       => $message->first('user_id'),
                'organisasi_id' => $message->first('organisasi_id')
            ]
        ];
    }
}
