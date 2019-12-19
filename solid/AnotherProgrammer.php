<?php

// Hint - Open Closed Principle
// Принцип открытости/закрытости

class Worker
{
    protected $work;

    protected function working(){
        return $this->work;
    }
}

class AnotherProgrammer extends Worker
{
    protected $work='coding';
}

class Tester extends Worker
{
    protected $work='testing';
}

/** Что если добавить еще класс Designer с методом draw() **/
class Designer extends Worker
{
    protected $work='draw';

    public function draw()
    {
        return "some kind of picture";
    }
}

class ProjectManager extends Worker
{

    public function process($member)
    {
        if (!$member instanceof Worker) {
            throw new Exception('Invalid input member');
        }
        return $member->working();
    }
}