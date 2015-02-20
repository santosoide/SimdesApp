<?php namespace SimdesApp\Http\Requests\Kegiatan;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class KegiatanCreateForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'program_id'    => 'Program Id',
        'kegiatan'      => 'Kegiatan',
        'organisasi_id' => 'Organisasi Id'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'required|max:255',
            'program_id'    => 'required|integer',
            'kegiatan'      => 'required|max:255',
            'organisasi_id' => 'required|max:255'
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
                'program_id'    => $message->first('program_id'),
                'kegiatan'      => $message->first('kegiatan'),
                'organisasi_id' => $message->first('organisasi_id')
            ]
        ];
    }
}
