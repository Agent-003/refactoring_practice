<?php

//Hint - use Single Responsibility Principle Violation
// Принцип единственной ответственности
class Report
{
    protected $title='Report Title';
    protected $data='2016-04-21' ;

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->data;
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

class Format
{
    public $content;

    public function formatJson(Report $content)
    {
        return json_encode($this->content->getContents());
    }
}