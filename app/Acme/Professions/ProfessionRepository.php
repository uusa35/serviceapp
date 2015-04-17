<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/16/2015
 * Time: 10:06 AM
 */

namespace App\Acme\Professions;


use App\Acme\AbstractRepository;
use App\Acme\InterfaceRepository;
use App\Profession;

class ProfessionRepository extends AbstractRepository implements InterfaceRepository{

    public $model;
    public function __construct(Profession $model) {
        $this->model = $model;
    }

}