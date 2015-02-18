<?php namespace SimdesApp\Http\Controllers\Api\V1\User;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\User;
use SimdesApp\Repositories\User\UserRepository;
use SimdesApp\Http\Requests\User\UserCreateForm;
use SimdesApp\Http\Requests\User\UserEditForm;

class UserController extends Controller {

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

}
