<?php namespace SimdesApp\Http\Controllers\Api\V1\LokasiProgram;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\LokasiProgram\LokasiProgramCreateForm;
use SimdesApp\Http\Requests\LokasiProgram\LokasiProgramEditForm;
use SimdesApp\Repositories\Contracts\LokasiProgramInterface;
use SimdesApp\Repositories\LokasiProgram\LokasiProgramRepository;

class LokasiProgramController extends Controller
{

    /**
     * @var LokasiProgramInterface
     */
    protected $lokasiProgram;

    /**
     * Create new LokasiProgramController Instance
     *
     * @param LokasiProgramInterface $lokasiProgram
     */
    public function __construct(LokasiProgramInterface $lokasiProgram)
    {
        $this->lokasiProgram = $lokasiProgram;
    }

    /**
     * Find lokasi program
     *
     * @param LokasiProgramRepository $lokasiProgram
     * @return mixed
     */
    public function index(LokasiProgramRepository $lokasiProgram)
    {
        return $lokasiProgram->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'), $this->input('rpjmdes_program_id'));
    }

    /**
     * Insert lokasi program
     *
     * @param LokasiProgramCreateForm $request
     * @param LokasiProgramRepository $lokasiProgram
     * @return mixed
     */
    public function store(LokasiProgramCreateForm $request, LokasiProgramRepository $lokasiProgram)
    {
        return $lokasiProgram->create($request->all());
    }

    /**
     * Get lokasi program
     *
     * @param LokasiProgramRepository $lokasiProgram
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(LokasiProgramRepository $lokasiProgram, $id)
    {
        return $lokasiProgram->findById($id);
    }

    /**
     * Update lokasi program
     *
     * @param $id
     * @param LokasiProgramEditForm $request
     * @param LokasiProgramRepository $lokasiProgram
     * @return mixed
     */
    public function update($id, LokasiProgramEditForm $request, LokasiProgramRepository $lokasiProgram)
    {
        return $lokasiProgram->update($id, $request->all());
    }

    /**
     * Delete lokasi program
     *
     * @param $id
     * @param LokasiProgramRepository $lokasiProgram
     * @return mixed
     */
    public function destroy($id, LokasiProgramRepository $lokasiProgram)
    {
        return $lokasiProgram->destroy($id);
    }

}
