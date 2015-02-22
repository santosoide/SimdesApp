<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Pendapatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanCreateForm;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanEditForm;
use SimdesApp\Repositories\Transaksi_Pendapatan\TransaksiPendapatanRepository;

class TransaksiPendapatanController extends Controller
{
    /**
     * Find transaksi pendapatan
     *
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function index(TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi pendapatan
     *
     * @param TransaksiPendapatanCreateForm $request
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function store(TransaksiPendapatanCreateForm $request, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->create($request->all());
    }

    /**
     * Get transaksi pendapatan
     *
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(TransaksiPendapatanRepository $transaksiPendapatan, $id)
    {
        return $transaksiPendapatan->findById($id);
    }

    /**
     * Update transaksi pendapatan
     *
     * @param $id
     * @param TransaksiPendapatanEditForm $request
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function update($id, TransaksiPendapatanEditForm $request, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->update($id, $request->all());
    }

    /**
     * Delete transaksi pendapatan
     *
     * @param $id
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function destroy($id, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->destroy($id);
    }

}
