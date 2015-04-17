<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/16/15
 * Time: 5:11 PM
 */
use App\Acme\AbstractRepository;
use App\Acme\InterfaceRepository;

class RequestsRepository extends AbstractRepository implements \InterfaceRepository{

    public $model;
    public function __construct(Request $model) {

        $this->model = $model;

    }
}