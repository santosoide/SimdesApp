<?php namespace SimdesApp\Http\Requests\StandarSatuanHarga;

use SimdesApp\Http\Requests\Request;
use Illuminate\Validation\Validator;

class StandarSatuanHargaEditForm extends Request {

    /**
     * Custom attribute
     *
     * @var array
     */
    protected $customAttributes = [
        'kode_rekening' => 'Kode Rekening',
        'barang'        => 'Barang',
        'spesifikasi'   => 'Spesifikasi',
        'satuan'        => 'Satuan',
        'harga'         => 'Harga'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'kode_rekening' => 'max:255',
            'barang'        => 'max:255',
            'spesifikasi'   => 'max:255',
            'satuan'        => 'max:255',
            'harga'         => 'integer|max:1000000000'
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
                'barang'        => $message->first('barang'),
                'spesifikasi'   => $message->first('spesifikasi'),
                'satuan'        => $message->first('satuan'),
                'harga'         => $message->first('harga')
            ]
        ];
    }
}
