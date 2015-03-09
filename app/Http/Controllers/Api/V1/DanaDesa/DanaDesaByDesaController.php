<?php namespace SimdesApp\Http\Controllers\Api\V1\DanaDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaCreateForm;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaEditForm;
use SimdesApp\Repositories\Contracts\DanaDesaByDesaInterface;
class DanaDesaByDesaController extends Controller
{
    /**
     * @var DanaDesaByDesaInterface
     */
    protected $danaDesaByDesa;

    /**
     * Create new AkunController Instance
     *
     * @param DanaDesaByDesaInterface $danaDesaByDesa
     */
    public function __construct(DanaDesaByDesaInterface $danaDesaByDesa)
    {
        $this->danaDesaByDesa = $danaDesaByDesa;
    }

    /**
     * Find dana desa
     *
     * @return mixed
     */
    public function index()
    {
        return $this->danaDesaByDesa->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Insert dana desa
     *
     * @param DanaDesaCreateForm $request
     *
     * @return mixed
     */
    public function store(DanaDesaCreateForm $request)
    {
        return $this->danaDesaByDesa->create($request->all());
    }

    /**
     * Get dana desa
     *
     * @param                    $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->danaDesaByDesa->findById($id);
    }

    /**
     * Update dana desa
     *
     * @param                    $id
     * @param DanaDesaEditForm   $request
     *
     * @return mixed
     */
    public function update($id, DanaDesaEditForm $request)
    {
        return $this->danaDesaByDesa->update($id, $request->all());
    }

    /**
     * Delete dana desa
     *
     * @param                    $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->danaDesaByDesa->destroy($id);
    }
}
