<?php

namespace LaForum\Classes;

class SearchResultEntry
{
    protected $type, $text, $title;

    public function __construct($type, $title, $text)
    {
        $this->type = $type;
        $this->text = $text;
        $this->title = $title;
    }

    public function getType() {
        return $this->type;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }
}