<?php namespace SimdesApp\Http\Requests\RPJMDES;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'visi'          => 'Visi',
        'user_id'       => 'User Id',
        'organisasi_id' => 'Organisasi Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'visi'          => 'max:255',
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
                'visi'          => $message->first('visi'),
                'user_id'       => $message->first('user_id'),
                'organisasi_id' => $message->first('organisasi_id')
            ]
        ];
    }
}
