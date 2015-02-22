<?php namespace SimdesApp\Http\Requests\Transaksi_Pendapatan;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class TransaksiPendapatanEditForm extends Request
{
    /**
     * @var array
     */
    protected $customAttributes = [
        'pendapatan_id'   => 'Pejabat',
        'tanggal'         => 'Tanggal',
        'nomor_bukti'     => 'Nomor Bukti',
        'jumlah'          => 'Jumlah',
        'pejabat_desa_id' => 'Pejabat Desa'
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
            'pendapatan_id'   => 'required|max:255',
            'tanggal'         => 'required|max:225',
            'nomor_bukti'     => 'required|max:255',
            'jumlah'          => 'required|max:255',
            'pejabat_desa_id' => 'required|max:255'
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
                'pendapatan_id'   => $message->first('pendapatan_id'),
                'tanggal'         => $message->first('tanggal'),
                'nomor_bukti'     => $message->first('nomor_bukti'),
                'jumlah'          => $message->first('jumlah'),
                'pejabat_desa_id' => $message->first('pejabat_desa_id')
            ]
        ];
    }

}
