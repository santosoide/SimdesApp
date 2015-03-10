<?php namespace SimdesApp\Repositories\Contracts;

interface StandarSatuanHargaInterface {

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
     * Get Akun list using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getList();

    /**
     * Get list Satuan Harga Accessing by frontoffice
     *
     * @param int $page
     * @param int $per_page
     * @param null $term
     *
     * @return mixed
     */
    public function getListSatuanHarga($page, $per_page, $term);
}
