<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/16/15
 * Time: 5:55 PM
 */

namespace App\Acme\Users;

use App\Acme\AbstractRepository;
use App\Acme\InterfaceRepository;
use App\User;


class UserRepository extends  AbstractRepository implements InterfaceRepository {

    protected $model;
    public function __construct(User $model) {
        $this->model = $model;
    }


    public function getProviderById($id) {

        return $this->model->find($id);

    }

}