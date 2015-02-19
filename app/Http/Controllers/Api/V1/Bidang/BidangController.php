<?php namespace SimdesApp\Http\Controllers\Api\V1\Bidang;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Bidang;
use SimdesApp\Repositories\Bidang\BidangRepository;
use SimdesApp\Http\Requests\Bidang\BidangCreateForm;
use SimdesApp\Http\Requests\Bidang\BidangEditForm;

class BidangController extends Controller {

    public function index(BidangRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(BidangCreateForm $request, BidangRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    public function show(BidangRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    public function update($id, BidangEditForm $request, BidangRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    public function destroy($id, BidangRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
