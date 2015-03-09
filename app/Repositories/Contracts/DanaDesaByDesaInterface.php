<?php namespace SimdesApp\Repositories\Contracts;
interface DanaDesaByDesaInterface
{
    /**
     * Find data using search adn custom pagination
     *
     * @param $page
     * @param $limit
     * @param $term
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
}