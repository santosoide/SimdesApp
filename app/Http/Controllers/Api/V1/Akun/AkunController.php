<?php namespace SimdesApp\Http\Controllers\Api\V1\Akun;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Akun;
use SimdesApp\Http\Requests\Akun\AkunCreateForm;
use SimdesApp\Http\Requests\Akun\AkunEditForm;
use SimdesApp\Repositories\Contracts\AkunInterface;

class AkunController extends Controller
{

    /**
     * @var AkunInterface
     */
    protected $akun;

    /**
     * Create new AkunController Instance
     *
     * @param AkunInterface $akun
     */
    public function __construct(AkunInterface $akun)
    {
        $this->akun = $akun;
    }

    /**
     * Find data using custom pagination
     *
     * @return mixed
     */
    public function index()
    {
        return $this->akun->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Store a new record
     *
     * @param AkunCreateForm $request
     *
     * @return mixed
     */
    public function store(AkunCreateForm $request)
    {
        return $this->akun->create($request->all());
    }

    /**
     * Show detail akun
     *
     * @param  $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->akun->findById($id);
    }

    /**
     * Update the record
     *
     * @param                $id
     * @param AkunEditForm $request
     *
     * @return mixed
     */
    public function update($id, AkunEditForm $request)
    {
        return $this->akun->update($id, $request->all());
    }

    /**
     * Delete the record
     *
     * @param  $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->akun->destroy($id);
    }
}
