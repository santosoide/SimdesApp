<?php namespace SimdesApp\Http\Requests\RPJMDES;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RpjmdesMisiCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'rpjmdes_id'    => 'RPJMDES Id',
        'misi'          => 'Misi'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'rpjmdes_id'    => 'required|max:255',
            'misi'          => 'required|max:255'
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
                'misi'          => $message->first('misi')
            ]
        ];
    }
}
