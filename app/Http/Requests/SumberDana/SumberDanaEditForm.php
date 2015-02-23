<?php namespace SimdesApp\Http\Requests\SumberDana;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class SumberDanaEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'sumber_dana' => 'Sumber Dana'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'sumber_dana' => 'required|max:255'
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
                'sumber_dana' => $message->first('sumber_dana')
            ]
        ];
    }
}
