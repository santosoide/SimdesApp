<?php
namespace SimdesApp\Repositories\User;


use SimdesApp\Models\User;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class UserRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param User $user
     * @param LaraCacheInterface $cache
     */
    public function __construct(User $user, LaraCacheInterface $cache)
    {
        $this->model = $user;
        $this->cache = $cache;
    }

    /**
     * Instant find data User
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null)
    {
        // Create Key for cache
        $key = 'find-user-' . $page . $limit . $term;

        // Create Section
        $section = 'user';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $user = $this->model
            ->where('nama', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $user, $limit);

        return $user;
    }

    /**
     * Create data User
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $user = $this->getNew();

            $user->email = $data['email'];
            $user->nama = $data['nama'];
            $user->password = bcrypt($data['password']);
            $user->is_active = $data['is_active'];
            $user->level = $data['level'];

            $user->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('UserRepository create action something wrong -' . $ex);
            return $this->errorInsertResponse();
        }
    }

    /**
     * Find User by Id
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update data User
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $user = $this->findById($id);

            $user->email = $data['email'];
            $user->nama = $data['nama'];
            $user->is_active = $data['is_active'];
            $user->level = $data['level'];

            $user->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('UserRepository update action something wrong -' . $ex);
            return $this->errorUpdateResponse();
        }
    }

    /**
     * Delete data User
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $user = $this->findById($id);

            $user->delete();

            // Return result success
            return $this->successDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('UserRepository create action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
} 