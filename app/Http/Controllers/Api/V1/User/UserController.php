<?php namespace SimdesApp\Http\Controllers\Api\V1\User;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\User;
use SimdesApp\Repositories\Contracts\UserInterface;
use SimdesApp\Repositories\User\UserRepository;
use SimdesApp\Http\Requests\User\UserCreateForm;
use SimdesApp\Http\Requests\User\UserEditForm;

class UserController extends Controller
{

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * Create new UserController Instance
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Show data
     * URL = url/api/v1/backoffice/user GET
     *
     * @param UserRepository $user
     * @return mixed
     */
    public function index(UserRepository $user)
    {
        return $user->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data User
     * URL = url/api/v1/backoffice/user POST
     *
     * @param UserCreateForm $request
     * @param UserRepository $user
     * @return mixed
     */
    public function store(UserCreateForm $request, UserRepository $user)
    {
        return $user->create($request->all());
    }

    /**
     * Show detail User
     * URL = url/api/v1/backoffice/user/1 GET
     *
     * @param UserRepository $user
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(UserRepository $user, $id)
    {
        return $user->findById($id);
    }

    /**
     * Update data User
     * URL = url/api/v1/backoffice/user/1 PUT
     *
     * @param $id
     * @param UserEditForm $request
     * @param UserRepository $user
     * @return mixed
     */
    public function update($id, UserEditForm $request, UserRepository $user)
    {
        return $user->update($id, $request->all());
    }

    /**
     * Delete data User
     * URL = url/api/v1/backoffice/user/1 DELETE
     *
     * @param $id
     * @param UserRepository $user
     * @return mixed
     */
    public function destroy($id, UserRepository $user)
    {
        return $user->destroy($id);
    }

    /**
     * Get list data from sotfdelete
     *
     * @return mixed
     */
    public function trashed()
    {
        return $this->user->getTrashed();
    }

    /**
     * Restore data from sotfdelete
     *
     * @return mixed
     */
    public function restore()
    {
        return $this->user->getRestore();
    }

    /**
     * Get a list User by Full Text Search Backoffice Filter
     *
     * @return mixed
     */
    public function findUserBackOffice()
    {
        return $this->user->findByBackOffice($this->input('term'));
    }

    /**
     * Get a list User by Full Text Search Frontoffice Filter
     *
     * @return mixed
     */
    public function findUserFrontOffice()
    {
        return $this->user->findByFrontOffice($this->input('term'), $this->getOrganisasiId());
    }

    /**
     * Set unActive User
     *
     * @return mixed
     */
    public function setUnactive()
    {
        return $this->user->unActiveUser($this->input('_id'));
    }

    /**
     * Get a list User by Full Text Search Filter by Organsiasi_id
     *
     * @return mixed
     */
    public function getUserDesa()
    {
        return $this->user->findByOrganisasiId($this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Get the list user desa by organisasi_id is using in detil page
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function listUserDesa($organisasi_id)
    {
        return $this->user->listByOrganisasiId($organisasi_id);
    }
}
