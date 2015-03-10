<?php namespace SimdesApp\Repositories\Contracts;

interface LokasiProgramInterface {

    /**
     * Find data using search adn custom pagination
     *
     * @param $page
     * @param $limit
     * @param $term
     * @param $organisasi_id
     * @param $rpjmdes_program_id
     * @return mixed
     */
    public function find($page, $limit, $term, $organisasi_id, $rpjmdes_program_id);

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

}
