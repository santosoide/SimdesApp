<?php namespace SimdesApp\Repositories\Contracts;

interface RkpdesInterface
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
     * get jumlah desa
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountByDesa($organisasi_id);

    /**
     * Get the RKPDes by program_rpjmdes_id
     *
     * @param      $organisasi_id
     * @param      $program_rpjmdes_id
     * @param int $page
     * @param int $limit
     * @param null $term
     *
     * @return mixed
     */
    public function getByProgram($organisasi_id, $program_rpjmdes_id, $page, $limit, $term);

    /**
     * Get List RKPDes by organisasi_id using on Belanja
     *      *
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListRkpdes($organisasi_id);

    /**
     * get rkpdes by organisasi id
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @param      $organisasi_id
     *
     * @return mixed
     */
    public function getRkpdesByDesa($page, $limit, $term, $organisasi_id);

    /**
     * find by rpjmdes program
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @param      $rpjmdes_program_id
     *
     * @return mixed
     */
    public function findByRpjmdesProgram($page, $limit, $term, $rpjmdes_program_id);

}
