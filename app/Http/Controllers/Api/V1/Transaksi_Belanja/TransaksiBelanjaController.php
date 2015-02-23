<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Belanja;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaCreatForm;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaEditForm;
use SimdesApp\Repositories\Transaksi_Belanja\TransaksiBelanjaRepository;

class TransaksiBelanjaController extends Controller
{
    /**
     * Find transaksi belanja
     *
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function index(TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi belanja
     *
     * @param TransaksiBelanjaCreatForm $request
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function store(TransaksiBelanjaCreatForm $request, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->create($request->all());
    }

    /**
     * Get transaksi belanja
     *
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(TransaksiBelanjaRepository $transaksiBelanja, $id)
    {
        return $transaksiBelanja->findById($id);
    }

    /**
     * Update transaksi belanja
     *
     * @param $id
     * @param TransaksiBelanjaEditForm $request
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function update($id, TransaksiBelanjaEditForm $request, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->update($id, $request->all());
    }

    /**
     * Delete transaksi belanja
     *
     * @param $id
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function destroy($id, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->destroy($id);
    }

}
