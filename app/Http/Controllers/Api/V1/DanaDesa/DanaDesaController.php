<?php namespace SimdesApp\Http\Controllers\Api\V1\DanaDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaCreateForm;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaEditForm;
use SimdesApp\Repositories\Contracts\DanaDesaInterface;

class DanaDesaController extends Controller
{
    /**
     * @var DanaDesaInterface
     */
    protected $danaDesa;

    /**
     * Create new AkunController Instance
     *
     * @param DanaDesaInterface $danaDesa
     */
    public function __construct(DanaDesaInterface $danaDesa)
    {
        $this->danaDesa = $danaDesa;
    }

    /**
     * Find dana desa
     *
     * @return mixed
     */
    public function index()
    {
        return $this->danaDesa->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert dana desa
     *
     * @param DanaDesaCreateForm $request
     * @return mixed
     */
    public function store(DanaDesaCreateForm $request)
    {
        return $this->danaDesa->create($request->all());
    }

    /**
     * Get dana desa
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->danaDesa->findById($id);
    }

    /**
     * Update dana desa
     *
     * @param $id
     * @param DanaDesaEditForm $request
     * @return mixed
     */
    public function update($id, DanaDesaEditForm $request)
    {
        return $this->danaDesa->update($id, $request->all());
    }

    /**
     * Delete dana desa
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->danaDesa->destroy($id);
    }

    /**
     * Get list dana desa using in detil organisasi
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getDanaDesa($organisasi_id)
    {
        return $this->danaDesa->listByOrganisasiId($organisasi_id);
    }

    /**
     * Get list dana desa using by frontoffice
     *
     * @return mixed
     */
    public function getDanaDesaTersedia()
    {
        return $this->danaDesa->listByOrganisasiId($this->getOrganisasiId());
    }
}
