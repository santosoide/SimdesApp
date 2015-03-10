<?php namespace SimdesApp\Http\Controllers\Api\V1\RKPDES;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RKPDES;
use SimdesApp\Repositories\Contracts\RkpdesInterface;
use SimdesApp\Repositories\RKPDES\RkpdesRepository;
use SimdesApp\Http\Requests\RKPDES\RkpdesCreateForm;
use SimdesApp\Http\Requests\RKPDES\RkpdesEditForm;

class RkpdesController extends Controller
{

    /**
     * @var
     */
    protected $rkpdes;

    /**
     * Create new RkpdesController Instance
     *
     * @param RkpdesInterface $rkpdes
     */
    public function  __construct(RkpdesInterface $rkpdes)
    {
        $this->rkpdes = $rkpdes;
    }

    /**
     * Show data RKPDES
     *
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function index(RkpdesRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data RKPDES
     *
     * @param RkpdesCreateForm $request
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function store(RkpdesCreateForm $request, RkpdesRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail RKPDES
     *
     * @param RkpdesRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(RkpdesRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data RKPDES
     *
     * @param $id
     * @param RkpdesEditForm $request
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function update($id, RkpdesEditForm $request, RkpdesRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data RKPDES
     *
     * @param $id
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function destroy($id, RkpdesRepository $program)
    {
        return $program->destroy($id);
    }

    /**
     * Get the RKPDes by $program_rpjmdes_id
     *
     * @param RkpdesRepository $rkpdes
     * @param $program_rpjmdes_id
     * @return mixed
     */
    public function getByProgram(RkpdesRepository $rkpdes, $program_rpjmdes_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $rkpdes->getByProgram($this->getOrganisasiId(), $program_rpjmdes_id, $page, $limit = 10, $term);
    }

    /**
     * Get List RKPDes by organisasi_id using on Pendapatan
     *
     * @param RkpdesRepository $rkpdes
     * @return mixed
     */
    public function getListRkpdes(RkpdesRepository $rkpdes)
    {

        return $rkpdes->getListRkpdes($this->getOrganisasiId());
    }

    /**
     * get rkpdes by organisasi id
     *
     * @param RkpdesRepository $rkpdes
     * @param $organisasi_id
     * @return mixed
     */
    public function getRkpdesByDesa(RkpdesRepository $rkpdes, $organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $rkpdes->getRkpdesByDesa($page, $limit = 10, $term, $organisasi_id);
    }

    /**
     * find by rpjmdes program
     *
     * @param RkpdesRepository $rkpdes
     * @param $rpjmdes_program_id
     * @return mixed
     */
    public function findByRpjmdesProgram(RkpdesRepository $rkpdes, $rpjmdes_program_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $rkpdes->findByRpjmdesProgram($page, $limit = 10, $term, $rpjmdes_program_id);
    }
}
