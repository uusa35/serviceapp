<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/15/2015
 * Time: 1:37 PM
 */
namespace App\Acme\Users;

use App\Acme;
use App\UserType;

class UsersTypesRepository extends AbstractRepository {

    protected $model;
    public function __construct(UserType $model) {

        $this->model = $model;

    }

}