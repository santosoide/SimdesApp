<?php namespace SimdesApp\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * Create an Instance Object Model
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return static
     */
    public function getNew(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }

    /**
     * @param array $response
     *
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
    public function relationDeleteResponse()
    {
        return $this->successResponseOk([
            'success' => false,
            'message' => [
                'msg' => 'Data tidak boleh dihapus, karena data sudah terelasi',
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

    /**
     * @param $id
     * @param $organisasi_id
     *
     * @return mixed
     * @throws RepositoryNotFoundException
     */
    public function findByOrganisasiId($id, $organisasi_id)
    {
        $model = $this->model
            ->where('_id', $id)
            ->where('organisasi_id', $organisasi_id)
            ->first();
        if (!$model) {
            throw new RepositoryNotFoundException();
        }

        return $model;
    }

    /**
     * Get Organisasi_id from the session
     *
     * @return mixed
     */
    public function getOrganisasiId()
    {
        //get organisasi id from session
        $organisasi_id = \Session::get('organisasi_id');
        if ($organisasi_id) {
            return $organisasi_id;
        } else {
            return '';
        }
    }

    /**
     * Get the User_id from the session
     *
     * @return mixed
     */
    public function getUserId()
    {
        //get user id from session
        $user_id = \Session::get('user_id');
        if ($user_id) {
            return $user_id;
        } else {
            return '';
        }
    }
}