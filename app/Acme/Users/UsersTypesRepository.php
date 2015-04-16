<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/15/2015
 * Time: 1:37 PM
 */
namespace App\Acme\Users;

use App\Acme\AbstractRepository;
use App\UserType;

class UsersTypesRepository extends AbstractRepository {

    protected $model;
    public function __construct(UserType $model) {

        $this->model = $model;

    }

    public function postTypeId ($type_id,$user_id) {
         $this->model->create([
            'type_id' =>  $type_id,
            'user_id' => $user_id
        ]);
    }
}