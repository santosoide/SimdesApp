<?php namespace SimdesApp\Http\Requests\Kecamatan;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class KecamatanCreateForm extends Request
{
    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_kec' => 'Kode Kecamatan',
        'kec'      => 'Kecamatan'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_kec' => 'required|max:255',
            'kec'      => 'required|max:255'
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
                'kode_kec' => $message->first('kode_kec'),
                'kec'      => $message->first('kec'),
            ]
        ];
    }
}
