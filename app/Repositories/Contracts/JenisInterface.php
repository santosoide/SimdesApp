<?php namespace SimdesApp\Repositories\Contracts;

interface JenisInterface
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
    public function find($page, $term, $limit);

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
     * @param $id
     *
     * @return mixed
     */
    public function getNamaJenis($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getKodeRekening($id);

    /**
     * @param $kelompok_id
     *
     * @return mixed
     */
    public function findIsExists($kelompok_id);

    /**
     * @param $kelompok_id
     *
     * @return mixed
     */
    public function getListJenis($kelompok_id);
}