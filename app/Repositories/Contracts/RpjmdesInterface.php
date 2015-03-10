<?php namespace SimdesApp\Repositories\Contracts;

interface RpjmdesInterface {

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
     * @param $rpjmdes_id
     *
     * @return mixed
     */
    public function cekForDelete($rpjmdes_id);

    /**
     * Ajax dropdown visi
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListByOrganisasi($organisasi_id);
}
