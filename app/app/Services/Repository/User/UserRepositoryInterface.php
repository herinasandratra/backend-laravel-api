<?php
namespace App\Services\Repository\User;

interface UserRepositoryInterface
{    
    /**
     * register
     *
     * @param  array $params
     * @return mixed
     */
    public function createOrUpdate(array $params);
}
