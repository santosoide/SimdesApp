<?php namespace SimdesApp\Http\Controllers\Api\V1\Kelompok;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kelompok;
use SimdesApp\Repositories\Contracts\KelompokInterface;
use SimdesApp\Repositories\Kelompok\KelompokRepository;
use SimdesApp\Http\Requests\Kelompok\KelompokCreateForm;
use SimdesApp\Http\Requests\Kelompok\KelompokEditForm;
class KelompokController extends Controller
{

    /**
     * @var KelompokInterface
     */
    protected $kelompok;

    /**
     * @param KelompokInterface $kelompok
     */
    public function __construct(KelompokInterface $kelompok)
    {
        $this->kelompok = $kelompok;
    }

    /**
     * Find with pagging
     *
     * @return mixed
     */
    public function index()
    {
        return $this->kelompok->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert
     *
     * @param KelompokCreateForm $request
     *
     * @return mixed
     */
    public function store(KelompokCreateForm $request)
    {
        return $this->kelompok->create($request->all());
    }

    /**
     * Get
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->kelompok->findById($id);
    }

    /**
     * Update
     *
     * @param                  $id
     * @param KelompokEditForm $request
     *
     * @return mixed
     */
    public function update($id, KelompokEditForm $request)
    {
        return $this->kelompok->update($id, $request->all());
    }

    /**
     * Delete
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->kelompok->destroy($id);
    }
}
