<?php namespace SimdesApp\Http\Controllers\Api\V1\Bidang;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Bidang;
use SimdesApp\Repositories\Bidang\BidangRepository;
use SimdesApp\Http\Requests\Bidang\BidangCreateForm;
use SimdesApp\Http\Requests\Bidang\BidangEditForm;

class BidangController extends Controller {

    /**
     * Show data
     *
     * @param BidangRepository $obyek
     * @return mixed
     */
    public function index(BidangRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Bidang
     *
     * @param BidangCreateForm $request
     * @param BidangRepository $obyek
     * @return mixed
     */
    public function store(BidangCreateForm $request, BidangRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    /**
     * Show data Bidang
     *
     * @param BidangRepository $obyek
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(BidangRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    /**
     * Update data Bidang
     *
     * @param $id
     * @param BidangEditForm $request
     * @param BidangRepository $obyek
     * @return mixed
     */
    public function update($id, BidangEditForm $request, BidangRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    /**
     * Delete data Bidang
     *
     * @param $id
     * @param BidangRepository $obyek
     * @return mixed
     */
    public function destroy($id, BidangRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
