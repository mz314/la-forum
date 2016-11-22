<?php

namespace LaForum\Repositories;

abstract class SearchableRepository extends Repository
{

    abstract protected  function getSearchableFields();

    public function searchPhrase($phrase, $exact)
    {
        $model = $this->model;

        $fields = $this->getSearchableFields();



        if($exact) {
            $op = '=';
            $searchPhrase = $phrase;
        } else {
            $op = 'like';
            $searchPhrase = '%'.$phrase.'%';
        }

        $q = $model::getQuery();
        
        
        foreach($fields as $field) {
            $q->orWhere($field, $op, $searchPhrase);
        }


        return $q->get();


        
    }
}