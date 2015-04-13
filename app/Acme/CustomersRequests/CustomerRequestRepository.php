<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 4/13/2015
 * Time: 9:35 AM
 */
namespace App\Acme\CustomersRequest;


use App\Acme\InterfaceRepository;
use App\CustomerRequest;
use App\Acme\AbstractRepository;

class CustomerRequestRepository extends AbstractRepository implements InterfaceRepository{

    public $model;

    public function __construct(CustomerRequest $model) {
        $this->model = $model;
    }


}