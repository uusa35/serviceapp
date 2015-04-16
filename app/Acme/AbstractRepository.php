<?php namespace App\Acme;
use Illuminate\Support\Facades\Response;

/**
 * Created by PhpStorm.
 * User: usama
 * Date: 2/16/2015
 * Time: 2:42 PM
 */




abstract class AbstractRepository {

    protected $model;

    public function setModel ($model) {

        $this->model = $model;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function findById($id) {

        return $this->model->findOrFail($id);

    }

    public function getAllJson() {
        return Response::json([
            'items' => $this->model->all()->toArray()
        ],200);
    }

}