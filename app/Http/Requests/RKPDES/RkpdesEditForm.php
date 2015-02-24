<?php namespace SimdesApp\Http\Requests\RKPDES;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class RkpdesEditForm extends Request
{

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'rpjmdes_program_id' => 'RPJMDES Program Id',
        'dana_desa_id'       => 'Dana Desa Id',
        'tahun'              => 'Tahun',
        'lokasi'             => 'Lokasi',
        'anggaran'           => 'Anggaran',
        'kegiatan'           => 'Kegiatan',
        'pejabat_desa_id'    => 'Pejabat Desa Id',
        'is_finish'          => 'Is Finish',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'rpjmdes_program_id' => 'max:255',
            'dana_desa_id'       => 'max:255',
            'tahun'              => 'max:255',
            'lokasi'             => 'max:255',
            'anggaran'           => 'integer|max:1000000000',
            'kegiatan'           => 'max:255',
            'pejabat_desa_id'    => 'max:255',
            'is_finish'          => 'integer|max:1'
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
                'rpjmdes_program_id' => $message->first('rpjmdes_program_id'),
                'dana_desa_id'       => $message->first('dana_desa_id'),
                'tahun'              => $message->first('tahun'),
                'lokasi'             => $message->first('lokasi'),
                'anggaran'           => $message->first('anggaran'),
                'kegiatan'           => $message->first('kegiatan'),
                'pejabat_desa_id'    => $message->first('pejabat_desa_id'),
                'is_finish'          => $message->first('is_finish')
            ]
        ];
    }
}
