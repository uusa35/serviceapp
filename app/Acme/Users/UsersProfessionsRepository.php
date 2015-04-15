<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/15/2015
 * Time: 1:37 PM
 */
namespace App\Acme\Users;

use App\Acme\AbstractRepository;
use App\UserProfession;

class UsersProfessionsRepository extends AbstractRepository {

    protected $model;
    public function __construct(UserProfession $model) {

        $this->model = $model;

    }

}