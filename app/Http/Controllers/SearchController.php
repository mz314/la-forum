<?php

namespace LaForum\Http\Controllers;

use LaForum\Http\Requests\SearchRequest;
use LaForum\Facades\Search;
use LaForum\Classes\SearchHelper;

class SearchController extends Controller
{

    protected $searchHelper;
    
    public function __construct(SearchHelper $searchHelper)
    {
        $this->searchHelper = $searchHelper;
    }
    
    public function index()
    {
        return View('search.index', [
            'term'=>'',
        ]);
    }

    public function search(SearchRequest $request)
    {
        $term = $request->get('query');
        $this->searchHelper->searchPhrase($term);
        return View('search.results', [
            'term' => $term,
        ]);
    }
}
