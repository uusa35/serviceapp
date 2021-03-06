<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/13/2015
 * Time: 9:38 AM
 */

namespace App\Acme\Types;

use App\Acme\AbstractRepository;
use App\Acme\InterfaceRepository;
use App\Type;

class TypeRepository extends AbstractRepository implements InterfaceRepository{

    public $model;
    public function __construct(Type $model) {
        $this->model = $model;
    }

}