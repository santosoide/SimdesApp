<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Belanja;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaCreatForm;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaEditForm;
use SimdesApp\Repositories\Contracts\TransaksiBelanjaInterface;
use SimdesApp\Repositories\Transaksi_Belanja\TransaksiBelanjaRepository;

class TransaksiBelanjaController extends Controller
{
    /**
     * @var TransaksiBelanjaInterface
     */
    protected $transaksiBelanja;

    /**
     * Create new AkunController Instance
     *
     * @param TransaksiBelanjaInterface $transaksiBelanja
     */
    public function __construct(TransaksiBelanjaInterface $transaksiBelanja)
    {
        $this->transaksiBelanja = $transaksiBelanja;
    }

    /**
     * Find transaksi belanja
     *
     * @return mixed
     */
    public function index()
    {
        return $this->transaksiBelanja->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi belanja
     *
     * @param TransaksiBelanjaCreatForm $request
     * @return mixed
     */
    public function store(TransaksiBelanjaCreatForm $request)
    {
        return $this->transaksiBelanja->create($request->all());
    }

    /**
     * Get transaksi belanja
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->transaksiBelanja->findById($id);
    }

    /**
     * Update transaksi belanja
     *
     * @param $id
     * @param TransaksiBelanjaEditForm $request
     * @return mixed
     */
    public function update($id, TransaksiBelanjaEditForm $request)
    {
        return $this->transaksiBelanja->update($id, $request->all());
    }

    /**
     * Delete transaksi belanja
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transaksiBelanja->destroy($id);
    }

    /**
     * get belanja by organisasi id
     *
     * @param TransaksiBelanjaRepository
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiBelanjaByDesa($organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $this->transaksiBelanja->getTransaksiBelanjaByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiBelanjaRepository
     * @return mixed
     */
    public function getChartByOrganisasiId()
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $this->transaksiBelanja->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiBelanjaRepository
     * @return mixed
     */
    public function getChart()
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $this->transaksiBelanja->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
