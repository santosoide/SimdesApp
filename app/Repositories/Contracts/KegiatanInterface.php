<?php namespace SimdesApp\Repositories\Contracts;

interface KegiatanInterface
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
     * Check program
     *
     * @param $program_id
     *
     * @return mixed
     */
    public function findIsExists($program_id);

    /**
     * Get list kegiatan by program
     *
     * @param $program_id
     *
     * @return mixed
     */
    public function getListByProgram($program_id);
}