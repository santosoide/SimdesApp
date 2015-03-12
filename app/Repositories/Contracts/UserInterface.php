<?php namespace SimdesApp\Repositories\Contracts;

interface UserInterface {

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
     * @param $level
     * @return int
     */
    public function getLevel($level);

    /**
     * check organisasi for check before delete
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function findIsExists($organisasi_id);

    /**
     * @param $email
     *
     * @return mixed
     */
    public function resetPassword($email);
}
