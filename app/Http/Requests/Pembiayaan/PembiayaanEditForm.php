<?php namespace SimdesApp\Http\Requests\Pembiayaan;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class PembiayaanEditForm extends Request
{

    /**
     * @var array
     */
    protected $customAttributes = [
        'tahun'        => 'Tahun',
        'kelompok_id'  => 'Kelompok',
        'jenis_id'     => 'Jenis',
        'obyek_id'     => 'Obyek',
        'rincian_id'   => 'Rincian',
        'volume1'      => 'Volume 1',
        'volume2'      => 'Volume 2',
        'volume3'      => 'Volume 3',
        'satuan1'      => 'Satuan 1',
        'satuan2'      => 'Satuan 2',
        'satuan3'      => 'Satuan 3',
        'satuan_harga' => 'Harga Satuan',
    ];

    /**
     * @param $validator
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->customAttributes);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tahun'        => 'required|integer',
            'kelompok_id'  => 'required|integer',
            'jenis_id'     => 'integer',
            'obyek_id'     => 'integer',
            'rincian_id'   => 'integer',
            'volume1'      => 'required|integer',
            'volume2'      => 'integer',
            'volume3'      => 'integer',
            'satuan1'      => 'required',
            'satuan2'      => 'max:255',
            'satuan3'      => 'max:255',
            'satuan_harga' => 'required|integer|max:10000000000',
        ];
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
                'tahun'        => $message->first('tahun'),
                'kelompok_id'  => $message->first('kelompok_id'),
                'jenis_id'     => $message->first('jenis_id'),
                'obyek_id'     => $message->first('obyek_id'),
                'volume1'      => $message->first('volume1'),
                'volume2'      => $message->first('volume2'),
                'volume3'      => $message->first('volume3'),
                'satuan1'      => $message->first('satuan1'),
                'satuan2'      => $message->first('satuan2'),
                'satuan3'      => $message->first('satuan3'),
                'satuan_harga' => $message->first('satuan_harga')
            ]
        ];
    }

}
