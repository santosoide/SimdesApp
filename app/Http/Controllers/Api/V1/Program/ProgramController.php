<?php namespace SimdesApp\Http\Controllers\Api\V1\Program;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Program;
use SimdesApp\Repositories\Contracts\ProgramInterface;
use SimdesApp\Repositories\Program\ProgramRepository;
use SimdesApp\Http\Requests\Program\ProgramCreateForm;
use SimdesApp\Http\Requests\Program\ProgramEditForm;
class ProgramController extends Controller
{
    /**
     * @var ProgramInterface
     */
    protected $program;

    /**
     * Create new AkunController Instance
     *
     * @param ProgramInterface $program
     */
    public function __construct(ProgramInterface $program)
    {
        $this->program = $program;
    }

    /**
     * Show data
     *
     * @return mixed
     */
    public function index()
    {
        return $this->program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Program
     *
     * @param ProgramCreateForm $request
     *
     * @return mixed
     */
    public function store(ProgramCreateForm $request)
    {
        return $this->program->create($request->all());
    }

    /**
     * Show detail Program
     *
     * @param                   $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->program->findById($id);
    }

    /**
     * Update data Program
     *
     * @param                   $id
     * @param ProgramEditForm   $request
     *
     * @return mixed
     */
    public function update($id, ProgramEditForm $request)
    {
        return $this->program->update($id, $request->all());
    }

    /**
     * Delete data Program
     *
     * @param                   $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->program->destroy($id);
    }
}
