<?php namespace SimdesApp\Repositories\Contracts;

interface KelompokInterface
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
     * Cek if Exists in relation
     *
     * @param $akun_id
     *
     * @return mixed
     */
    public function findIsExists($akun_id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getNamaKelompok($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getKodeRekening($id);

    /**
     * @param $akun_id
     *
     * @return mixed
     */
    public function getListKelompok($akun_id);
}