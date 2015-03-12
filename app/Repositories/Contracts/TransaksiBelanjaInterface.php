<?php namespace SimdesApp\Repositories\Contracts;
interface TransaksiBelanjaInterface
{
    /**
     * Find data using search adn custom pagination
     *
     * @param $page
     * @param $term
     * @param $limit
     *
     * @return mixed
     */
    public function find($page, $limit, $term);

    /**
     * Get a data
     *
     * @param $id
     *
     * @return mixed
     */
    public function findById($id);

    /**
     * Store a new record
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update the record
     *
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Destroy the record
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListBelanjaIsFinish($organisasi_id);

    /**
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountByDesa($organisasi_id);

    /**
     * @param int  $page
     * @param int  $limit
     * @param null $term
     * @param      $organisasi_id
     *
     * @return mixed
     */
    public function getTransaksiBelanjaByDesa($page = 1, $limit = 10, $term = null, $organisasi_id);

    /**
     * @param $organisasi_id
     * @param $tanggal_awal
     * @param $tanggal_akhir
     * @param $dana_desa_id
     *
     * @return mixed
     */
    public function getChartByOrganisasiId($organisasi_id, $tanggal_awal, $tanggal_akhir, $dana_desa_id);

    /**
     * @param $tanggal_awal
     * @param $tanggal_akhir
     * @param $dana_desa_id
     *
     * @return mixed
     */
    public function getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
}