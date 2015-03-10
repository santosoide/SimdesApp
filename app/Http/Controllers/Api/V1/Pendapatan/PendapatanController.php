<?php namespace SimdesApp\Http\Controllers\Api\V1\Pendapatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Pendapatan;
use SimdesApp\Repositories\Contracts\PendapatanInterface;
use SimdesApp\Repositories\Pendapatan\PendapatanRepository;
use SimdesApp\Http\Requests\Pendapatan\PendapatanCreateForm;
use SimdesApp\Http\Requests\Pendapatan\PendapatanEditForm;

class PendapatanController extends Controller
{
    /**
     * @var
     */
    protected $pendapatan;

    /**
     * Create new PendapatanController Instance
     *
     * @param PendapatanInterface $pendapatan
     */
    public function __construct(PendapatanInterface $pendapatan)
    {
        $this->pendapatan = $pendapatan;
    }

    /**
     * Show pendapatan
     *
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function index(PendapatanRepository $pendapatan)
    {
        return $pendapatan->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Insert pendapatan
     *
     * @param PendapatanCreateForm $request
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function store(PendapatanCreateForm $request, PendapatanRepository $pendapatan)
    {
        return $pendapatan->create($request->all());
    }

    /**
     * Get Pendapatan
     *
     * @param PendapatanRepository $pendapatan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(PendapatanRepository $pendapatan, $id)
    {
        return $pendapatan->findById($id);
    }

    /**
     * Update pendapatan
     *
     * @param $id
     * @param PendapatanEditForm $request
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function update($id, PendapatanEditForm $request, PendapatanRepository $pendapatan)
    {
        return $pendapatan->update($id, $request->all());
    }

    /**
     * Delete pendapatan
     *
     * @param $id
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function destroy($id, PendapatanRepository $pendapatan)
    {
        return $pendapatan->destroy($id);
    }
}
