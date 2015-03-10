<?php namespace SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;
use SimdesApp\Repositories\Contracts\StandarSatuanHargaInterface;
use SimdesApp\Repositories\StandarSatuanHarga\StandarSatuanHargaRepository;
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
     * @param StandarSatuanHargaRepository $program
     * @return mixed
     */
    public function index(StandarSatuanHargaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Show data Standar Satuan Harga
     *
     * @param StandarSatuanHargaCreateForm $request
     * @param StandarSatuanHargaRepository $program
     * @return mixed
     */
    public function store(StandarSatuanHargaCreateForm $request, StandarSatuanHargaRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail Standar Satuan Harga
     *
     * @param StandarSatuanHargaRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(StandarSatuanHargaRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data Standar Satuan Harga
     *
     * @param $id
     * @param StandarSatuanHargaEditForm $request
     * @param StandarSatuanHargaRepository $program
     * @return mixed
     */
    public function update($id, StandarSatuanHargaEditForm $request, StandarSatuanHargaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data Standar Satuan Harga
     *
     * @param $id
     * @param StandarSatuanHargaRepository $program
     * @return mixed
     */
    public function destroy($id, StandarSatuanHargaRepository $program)
    {
        return $program->destroy($id);
    }

    /**
     * Get list Satuan Harga Accessing by frontoffice
     *
     * @param StandarSatuanHargaRepository
     * @param $standarSatuanHarga
     * @return mixed
     */
    public function getListSatuanHarga(StandarSatuanHargaRepository $standarSatuanHarga)
    {
        $term = $this->input('term');
        $page = $this->input('page');
        //$per_page = $this->input('per_page');

        return $standarSatuanHarga->getListSatuanHarga($page, $per_page = 5, $term);
    }
}
