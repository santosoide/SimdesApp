<?php namespace SimdesApp\Http\Controllers\Api\V1\Bidang;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Bidang;
use SimdesApp\Http\Requests\Bidang\BidangCreateForm;
use SimdesApp\Http\Requests\Bidang\BidangEditForm;
use SimdesApp\Repositories\Contracts\BidangInterface;
class BidangController extends Controller
{
    /**
     * @var BidangInterface
     */
    protected $bidang;

    /**
     * Create new AkunController Instance
     *
     * @param BidangInterface $bidang
     */
    public function __construct(BidangInterface $bidang)
    {
        $this->bidang = $bidang;
    }

    /**
     * Show data
     *
     * @return mixed
     */
    public function index()
    {
        return $this->bidang->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Bidang
     *
     * @param BidangCreateForm $request
     *
     * @return mixed
     */
    public function store(BidangCreateForm $request)
    {
        return $this->bidang->create($request->all());
    }

    /**
     * Show data Bidang
     *
     * @param                  $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->bidang->findById($id);
    }

    /**
     * Update data Bidang
     *
     * @param                  $id
     * @param BidangEditForm   $request
     *
     * @return mixed
     */
    public function update($id, BidangEditForm $request)
    {
        return $this->bidang->update($id, $request->all());
    }

    /**
     * Delete data Bidang
     *
     * @param                  $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->bidang->destroy($id);
    }
}
