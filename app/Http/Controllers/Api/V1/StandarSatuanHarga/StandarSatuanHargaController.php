<?php namespace SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;
use SimdesApp\Repositories\Contracts\StandarSatuanHargaInterface;
use SimdesApp\Http\Requests\StandarSatuanHarga\StandarSatuanHargaCreateForm;
use SimdesApp\Http\Requests\StandarSatuanHarga\StandarSatuanHargaEditForm;

class StandarSatuanHargaController extends Controller
{

    /**
     * @var
     */
    protected $standarSatuanHarga;

    /**
     * Create new StandarSatuanHargaController Instance
     *
     * @param StandarSatuanHargaInterface $standarSatuanHarga
     */
    public function __construct(StandarSatuanHargaInterface $standarSatuanHarga)
    {
        $this->standarSatuanHarga = $standarSatuanHarga;
    }

    /**
     * Show data
     *
     * @return mixed
     */
    public function index()
    {
        return $this->standarSatuanHarga->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Show data Standar Satuan Harga
     *
     * @param StandarSatuanHargaCreateForm $request
     * @return mixed
     */
    public function store(StandarSatuanHargaCreateForm $request)
    {
        return $this->standarSatuanHarga->create($request->all());
    }

    /**
     * Show detail Standar Satuan Harga
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->standarSatuanHarga->findById($id);
    }

    /**
     * Update data Standar Satuan Harga
     *
     * @param $id
     * @param StandarSatuanHargaEditForm $request
     * @return mixed
     */
    public function update($id, StandarSatuanHargaEditForm $request)
    {
        return $this->standarSatuanHarga->update($id, $request->all());
    }

    /**
     * Delete data Standar Satuan Harga
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->standarSatuanHarga->destroy($id);
    }

    /**
     * Get list Satuan Harga Accessing by frontoffice
     *
     * @param StandarSatuanHargaRepository
     * @return mixed
     */
    public function getListSatuanHarga()
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $this->standarSatuanHarga->getListSatuanHarga($page, $per_page = 5, $term);
    }
}
