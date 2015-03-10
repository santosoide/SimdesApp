<?php namespace SimdesApp\Repositories\Contracts;

interface OrganisasiInterface {

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
     * check data user before delete
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function cekForDelete($organisasi_id);

    /**
     * Get kode desa
     *
     * @param $id
     * @return mixed
     */
    public function getKodeDesa($id);

    /**
     * Get by kecamatan
     *
     * @param $kec_id
     * @return mixed
     */
    public function getByKecamatan($kec_id);

    /**
     * Get the list of Organisasi using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getList();

}
