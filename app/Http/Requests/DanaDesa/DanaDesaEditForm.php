<?php namespace SimdesApp\Http\Requests\DanaDesa;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class DanaDesaEditForm extends Request
{
    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'sumber_dana_id' => 'Sumber Dana',
        'jumlah'         => 'Jumlah'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sumber_dana_id' => 'required|max:50',
            'jumlah'         => 'required|integer|max:10000000000'
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
                'sumber_dana_id' => $message->first('sumber_dana_id'),
                'jumlah'         => $message->first('jumlah')
            ]
        ];
    }
}
