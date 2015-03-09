<?php namespace SimdesApp\Http\Controllers\Api\V1\Belanja;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Belanja\BelanjaCreateForm;
use SimdesApp\Http\Requests\Belanja\BelanjaEditForm;
use SimdesApp\Repositories\Contracts\BelanjaInterface;
class BelanjaController extends Controller
{
    /**
     * @var BelanjaInterface
     */
    protected $belanja;

    /**
     * Create new BelanjaController Instance
     *
     * @param BelanjaInterface $belanja
     */
    public function __construct(BelanjaInterface $belanja)
    {
        $this->belanja = $belanja;
    }

    /**
     * Show belanja
     *
     * @return mixed
     */
    public function index()
    {
        return $this->belanja->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Insert belanja
     *
     * @param BelanjaCreateForm $request
     *
     * @return mixed
     */
    public function store(BelanjaCreateForm $request)
    {
        return $this->belanja->create($request->all());
    }

    /**
     * Get belanja
     *
     * @param $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->belanja->findById($id);
    }

    /**
     * Update belanja
     *
     * @param                 $id
     * @param BelanjaEditForm $request
     *
     * @return mixed
     */
    public function update($id, BelanjaEditForm $request)
    {
        return $this->belanja->update($id, $request->all());
    }

    /**
     * Delete belanja
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->belanja->destroy($id);
    }
}
