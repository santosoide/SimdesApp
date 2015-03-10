<?php namespace SimdesApp\Repositories\Contracts;

interface PendapatanInterface
{

    /**
     * Find data using search adn custom pagination
     *
     * @param $page
     * @param $term
     * @param $limit
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function find($page, $limit, $term, $organisasi_id);

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
     * Get name pendapatan from kelompok, jenis, obyek
     *
     * @param $kelompok_id
     * @param $jenis_id
     * @param $obyek_id
     * @return mixed
     */
    public function getNamaPendapatan($kelompok_id, $jenis_id, $obyek_id);

    /**
     * Get kode rekening from kelompok, jenis, obyek
     *
     * @param $kelompok_id
     * @param $jenis_id
     * @param $obyek_id
     * @return mixed
     */
    public function getKodeRekening($kelompok_id, $jenis_id, $obyek_id);

    /**
     * Get count DPA is finish = 0
     *
     * @return mixed
     */
    public function getCountDpa();

    /**
     * get jumlah desa
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountByDesa($organisasi_id);

    /**
     * get jumlah rka by desa
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountRkaByDesa($organisasi_id);

    /**
     * get jumlah dpa by desa
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountDpaByDesa($organisasi_id);

}
