<?php namespace SimdesApp\Http\Requests\Transaksi_Belanja;

use Illuminate\Validation\Validator;
use SimdesApp\Http\Requests\Request;

class TransaksiBelanjaEditForm extends Request
{
    /**
     * @var array
     */
    protected $customAttributes = [
        'belanja_id'              => 'Belanja',
        'nomor_bukti'             => 'Nomor Bukti',
        'tanggal'                 => 'Tanggal',
        'jumlah'                  => 'Jumlah',
        'item'                    => 'Item',
        'harga'                   => 'Harga',
        'standar_satuan_harga_id' => 'Standar Satuan Harga',
        'pejabat_desa_id'         => 'Pejabat Desa'
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
            'belanja_id'              => 'required|max:255',
            'nomor_bukti'             => 'required|max:225',
            'tanggal'                 => 'required|max:255',
            'jumlah'                  => 'required|integer|max:10000000000',
            'item'                    => 'required|max:255',
            'harga'                   => 'required|integer|max:10000000000',
            'standar_satuan_harga_id' => 'required|max:255',
            'pejabat_desa_id'         => 'required|max:255'
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
                'belanja_id'              => $message->first('belanja_id'),
                'nomor_bukti'             => $message->first('nomor_bukti'),
                'tanggal'                 => $message->first('tanggal'),
                'jumlah'                  => $message->first('jumlah'),
                'item'                    => $message->first('item'),
                'harga'                   => $message->first('harga'),
                'standar_satuan_harga_id' => $message->first('standar_satuan_harga_id'),
                'pejabat_desa_id'         => $message->first('pejabat_desa_id'),
            ]
        ];
    }
}
