<?php namespace SimdesApp\Http\Controllers\Api\V1\PejabatDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\PejabatDesa;
use SimdesApp\Repositories\Contracts\PejabatDesaInterface;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaCreateForm;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaEditForm;

class PejabatDesaController extends Controller
{

    /**
     * @var PejabatDesaInterface
     */
    protected $pejabatDesa;

    /**
     * Create new PejabatDesaController Instance
     *
     * @param PejabatDesaInterface $pejabatDesa
     */
    public function __construct(PejabatDesaInterface $pejabatDesa)
    {
        $this->pejabatDesa = $pejabatDesa;
    }

    /**
     * Show data Pejabat Desa
     *
     * @return mixed
     */
    public function index()
    {
        return $this->pejabatDesa->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Create data Pejabat Desa
     *
     * @param PejabatDesaCreateForm $request
     * @return mixed
     */
    public function store(PejabatDesaCreateForm $request)
    {
        return $this->pejabatDesa->create($request->all());
    }

    /**
     * Show detail Pejabat Desa
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->pejabatDesa->findById($id);
    }

    /**
     * Update data Pejabat Desa
     *
     * @param $id
     * @param PejabatDesaEditForm $request
     * @return mixed
     */
    public function update($id, PejabatDesaEditForm $request)
    {
        return $this->pejabatDesa->update($id, $request->all());
    }

    /**
     * Delete data Pejabat Desa
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->pejabatDesa->destroy($id);
    }

    /**
     * Get the list pejabat desa by organisasi_id using on detil organisasi
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function listPejabatDesa($organisasi_id)
    {
        return $this->pejabatDesa->listByOrganisasiId($organisasi_id);
    }

    /**
     * Get the list pejabat desa by organisasi_id using on rpjmdes_program
     *
     * @return mixed
     */
    public function getListPejabatDesa()
    {
        return $this->pejabatDesa->getListByOrganisasiId($this->getOrganisasiId());
    }
}
