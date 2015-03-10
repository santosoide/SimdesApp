<?php namespace SimdesApp\Repositories\Contracts;

interface PejabatDesaInterface {

    /**
     * Find data using search adn custom pagination
     *
     * @param $page
     * @param $limit
     * @param $term
     * @param $organisasi_id
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
     * Get the list pejabat desa by organisasi_id using on detil organisasi
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function listByOrganisasiId($organisasi_id);

    /**
     * Get the list pejabat desa by organisasi_id using on rpjmdes_program
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function getListByOrganisasiId($organisasi_id);

}
