<?php

// Hint - Interface Segregation Principle
// Принцип разделения интерфейса

interface CanСode
{
    public function code();
}

interface CanTest
{
    public function test();
}


class Programmer implements CanСode, CanTest
{
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

class Tester implements CanTest
{
    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement
{

    public function processCode(canСode $member)
    {
        $member->code();
    }

    public function processTest(CanTest $member){
        $member->test();
    }
}