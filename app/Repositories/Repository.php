<?php
namespace LaForum\Repositories;

abstract class Repository {
    protected $model;
    
    public function all()
    {
        return $this->model->all();
    }
}