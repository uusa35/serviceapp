<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/13/2015
 * Time: 11:54 AM
 */
namespace App\Acme\Orders;


use App\Acme\InterfaceRepository;
use App\Order;
use App\Acme\AbstractRepository;

class OrderRepository extends AbstractRepository implements InterfaceRepository {

    public $model;
    public function __construct(Order $model) {
        $this->model = $model;
    }
}