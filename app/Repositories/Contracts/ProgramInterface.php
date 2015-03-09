<?php namespace SimdesApp\Repositories\Contracts;
interface ProgramInterface
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
     * Update therecord
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
     * @param $bidang_id
     *
     * @return mixed
     */
    public function findIsExists($bidang_id);

    /**
     * @param $bidang_id
     *
     * @return mixed
     */
    public function getListByBidang($bidang_id);

    /**
     * @param $bidang_id
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListByBidangOrganisasi($bidang_id, $organisasi_id);

    /**
     * @return mixed
     */
    public function getJumlahProgram();
}