<?php namespace SimdesApp\Http\Controllers\Api\V1\RPJMDES_Program;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RPJMDES_Program;
use SimdesApp\Repositories\Contracts\RpjmdesProgramInterface;
use SimdesApp\Repositories\RPJMDES\RpjmdesProgramRepository;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesProgramCreateForm;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesProgramEditForm;

class RpjmdesProgramController extends Controller
{

    /**
     * @var RpjmdesProgramInterface
     */
    protected $rpjmdesProgram;

    /**
     * Create new RpjmdesProgramController Instance
     *
     * @param RpjmdesProgramInterface $rpjmdesProgram
     */
    public function __construct(RpjmdesProgramInterface $rpjmdesProgram)
    {
        $this->rpjmdesProgram = $rpjmdesProgram;
    }

    /**
     * @param RpjmdesProgramRepository $program
     * @return mixed
     */
    public function index(RpjmdesProgramRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * @param RpjmdesProgramCreateForm $request
     * @param RpjmdesProgramRepository $program
     * @return mixed
     */
    public function store(RpjmdesProgramCreateForm $request, RpjmdesProgramRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * @param RpjmdesProgramRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(RpjmdesProgramRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * @param $id
     * @param RpjmdesProgramEditForm $request
     * @param RpjmdesProgramRepository $program
     * @return mixed
     */
    public function update($id, RpjmdesProgramEditForm $request, RpjmdesProgramRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * @param $id
     * @param RpjmdesProgramRepository $program
     * @return mixed
     */
    public function destroy($id, RpjmdesProgramRepository $program)
    {
        return $program->destroy($id);
    }
}
