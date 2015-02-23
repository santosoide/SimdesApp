<?php namespace SimdesApp\Http\Requests\RPJMDES;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'visi' => 'Visi'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'visi' => 'required|max:255'
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
                'visi' => $message->first('visi')
            ]
        ];
    }
}
