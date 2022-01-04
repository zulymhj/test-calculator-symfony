<?php
use src\Controller\CalculatorController;
class CalculatorOperationsTest extends \PHPUnit_Framework_TestCase
{
    $calculator = new Calculator();
    $result = $calculator->calculateAction("add",5, 6);
    $this->assertEquals(11, $result);
}