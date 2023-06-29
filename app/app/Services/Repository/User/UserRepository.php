<?php

namespace App\Services\Repository\User;
use App\Models\User;


/**
 * Summary of UserRepository
 */
class UserRepository  implements UserRepositoryInterface
{
   /**
    * Summary of createOrUpdate
    * @param array $params
    * @return mixed
    */
   public function createOrUpdate(array $params)
   {
        $user = User::query()->where(['email' => $params['email']])->first();
        if($user){
            $user->update($params);
        }else{
            $user = User::create($params);
        }
        return $user;
   }
   
}
