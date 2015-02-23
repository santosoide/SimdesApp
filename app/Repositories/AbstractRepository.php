<?php
namespace SimdesApp\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function getNew(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }

    /**
     * @param array $response
     * @return mixed
     */
    public function successResponseOk(array $response = [])
    {
        return \Response::json($response, 200);
    }

    /**
     * @return mixed
     */
    public function errorInsertResponse()
    {
        return $this->successResponseOk([
            'success' => false,
            'message' => [
                'msg' => 'Terjadi kesalahan silahkan ulangi lagi aksi terakhir anda',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function errorUpdateResponse()
    {
        return $this->successResponseOk([
            'success' => false,
            'message' => [
                'msg' => 'Terjadi kesalahan silahkan ulangi lagi aksi terakhir anda',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function errorDeleteResponse()
    {
        return $this->successResponseOk([
            'success' => false,
            'message' => [
                'msg' => 'Terjadi kesalahan silahkan ulangi lagi aksi terakhir anda',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function emptyDeleteResponse()
    {
        return $this->successResponseOk([
            'success' => false,
            'message' => [
                'msg' => 'Record sudah tidak ada atau sudah dihapus',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function successDeleteResponse()
    {
        return $this->successResponseOk([
            'success' => true,
            'message' => [
                'msg' => 'Sukses : Data berhasil dihapus',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function successInsertResponse()
    {
        return $this->successResponseOk([
            'success' => true,
            'message' => [
                'msg' => 'Sukses : Data berhasil disimpan',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    public function successUpdateResponse()
    {
        return $this->successResponseOk([
            'success' => true,
            'message' => [
                'msg' => 'Sukses : Data berhasil diupdate',
            ],
        ]);
    }

}