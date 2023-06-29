<?php

namespace App\Services\Application\UserMain;

use App\Services\Application\UserMain\UserMainInterface;
use App\Services\Repository\User\UserRepositoryInterface;

/**
 * Summary of UserMain
 */
class UserMain  implements UserMainInterface
{

    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
   /**
    * Summary of register
    * @param array $params
    * @return mixed
    */
   public function register(array $params)
   {
        if(!empty($params['password'])) $params['password'] =  bcrypt($params['password']);
        return $this->userRepository->createOrUpdate($params);
   }
   
}
