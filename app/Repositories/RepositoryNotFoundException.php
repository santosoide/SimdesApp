<?php namespace SimdesApp\Repositories;

class RepositoryNotFoundException extends \Exception
{

    /**
     * Create new Exception instance
     */
    public function __construct()
    {
        parent::__construct([
            'success' => false,
            'message' => [
                'msg' => 'Data tidak ada atau telah terhapus',
            ],
        ], 404);
    }
}