<?php namespace SimdesApp\Http\Requests\LokasiProgram;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class LokasiProgramCreateForm extends Request
{
    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'rpjmdes_program_id'     => 'RPJMDesa Program',
        'pejabat_desa_id'        => 'Penanggung Jawab',
        'lokasi'                 => 'Lokasi',
        'volume1'                => 'Volume 1',
        'volume2'                => 'Volume 2',
        'volume3'                => 'Volume 3',
        'satuan1'                => 'Satuan 1',
        'satuan2'                => 'Satuan 2',
        'satuan3'                => 'Satuan 3',
        'sasaran_manfaat_laki'   => 'Sasaran Manfaat Laki - laki',
        'sasaran_manfaat_wanita' => 'Sasaran Manfaat Wanita',
        'sasaran_manfaat_artm'   => 'Sasaran Manfaat Anggota Keluarga tidak Mampu',
        'sasaran_satuan'         => 'Satuan Sasaran',
        'Harga Satuan'           => 'Harga Satuan',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rpjmdes_program_id'     => 'required|max:50',
            'pejabat_desa_id'        => 'required|max:50',
            'lokasi'                 => 'required|max:255',
            'volume1'                => 'required|integer|max:10000000000',
            'volume2'                => 'integer|max:10000000000',
            'volume3'                => 'integer|max:10000000000',
            'satuan1'                => 'required|max:255',
            'satuan2'                => 'max:255',
            'satuan3'                => 'max:255',
            'sasaran_manfaat_laki'   => 'required|integer|max:1000000',
            'sasaran_manfaat_wanita' => 'required|integer|max:1000000',
            'sasaran_manfaat_artm'   => 'required|integer|max:1000000',
            'sasaran_satuan'         => 'required|max:255',
            'harga_satuan'           => 'required|integer|max:10000000000',
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
                'rpjmdes_program_id'     => $message->first('rpjmdes_program_id'),
                'pejabat_desa_id'        => $message->first('pejabat_desa_id'),
                'lokasi'                 => $message->first('lokasi'),
                'volume1'                => $message->first('volume1'),
                'volume2'                => $message->first('volume2'),
                'volume3'                => $message->first('volume3'),
                'satuan1'                => $message->first('satuan1'),
                'satuan2'                => $message->first('satuan2'),
                'satuan3'                => $message->first('satuan3'),
                'sasaran_manfaat_laki'   => $message->first('sasaran_manfaat_laki'),
                'sasaran_manfaat_wanita' => $message->first('sasaran_manfaat_wanita'),
                'sasaran_manfaat_artm'   => $message->first('sasaran_manfaat_artm'),
                'sasaran_satuan'         => $message->first('sasaran_satuan'),
                'harga_satuan'           => $message->first('harga_satuan')
            ]
        ];
    }
}
