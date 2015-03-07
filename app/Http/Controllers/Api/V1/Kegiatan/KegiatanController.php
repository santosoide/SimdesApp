<?php namespace SimdesApp\Http\Controllers\Api\V1\Kegiatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kegiatan;
use SimdesApp\Repositories\Contracts\KegiatanInterface;
use SimdesApp\Http\Requests\Kegiatan\KegiatanCreateForm;
use SimdesApp\Http\Requests\Kegiatan\KegiatanEditForm;
class KegiatanController extends Controller
{

    /**
     * @var KegiatanInterface
     */
    protected $kegiatan;

    /**
     * @param KegiatanInterface $kegiatan
     */
    public function __construct(KegiatanInterface $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    /**
     * Find data using search adn custom pagination
     *
     * @return mixed
     */
    public function index()
    {
        return $this->kegiatan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Store a new record
     *
     * @param KegiatanCreateForm $request
     *
     * @return mixed
     */
    public function store(KegiatanCreateForm $request)
    {
        return $this->kegiatan->create($request->all());
    }

    /**
     * Get a data
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->kegiatan->findById($id);
    }

    /**
     * Update therecord
     *
     * @param                  $id
     * @param KegiatanEditForm $request
     *
     * @return mixed
     */
    public function update($id, KegiatanEditForm $request)
    {
        return $this->kegiatan->update($id, $request->all());
    }

    /**
     * Destroy the record
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->kegiatan->destroy($id);
    }
}
