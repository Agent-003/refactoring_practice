<?php

// Hint - Liskov Substitution Principle
// Принцип подстановки Барбары Лисков

class Rectangle
{
    protected $width;
    protected $height;

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function area()
    {
        return $this->height * $this->width;
    }
}

class Square extends Rectangle
{
    public function setHeight($value)
    {
        parent::setHeight();
        $this->width = $value;
    }

    public function setWidth($value)
    {
        parent::setWidth();
        $this->height = $value;
    }
}

class RectangleTest
{
    private $rectangle;

    public function __construct(Rectangle $rectangle)
    {
        $this->rectangle = $rectangle;
    }

    public function testArea()
    {
        if ($this->rectangle->area() !== 6) {
            return "Bad area \n";
        } else {
            return "Test passed! \n";
        }
    }
}

$rectangle = new Rectangle();
$rectangle->setHeight(2);
$rectangle->setWidth(3);


echo "Calc area for rectangle \n";
$rectangleTest = new RectangleTest($rectangle);
echo $rectangleTest->testArea();


$square = new Square();
echo "Calc area for square \n";
$rectangleTest = new RectangleTest($square);
echo $rectangleTest->testArea();
