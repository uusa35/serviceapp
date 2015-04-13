<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 2/16/2015
 * Time: 2:43 PM
 */

namespace App\Acme;


Interface InterfaceRepository {

    public function getAll();
    public function findById($id);

}