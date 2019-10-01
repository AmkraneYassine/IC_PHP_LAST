<?php

/* hello */
require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;

    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testInsertP()
    {
        $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"yassine","Amakrane","1994-04-22","Zagoura");
       
    }
    public function testInsertC()
    {
        $this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),"IOT","12",$this->gumballMachineInstance->GetIdP("yassine","Amakrane"));
        
    }

    /*public function testIfWheelWorks(){
    	// Suppose we have 100 gumballs...
    	$this->gumballMachineInstance->setGumballs(100);

    	// ... And we turn the wheel once...
    	$this->gumballMachineInstance->turnWheel();

    	// ... we should now have 99 gumballs remaining in the machine right?
    	$this->assertEquals(99, $this->gumballMachineInstance->getGumballs()); 
    }*/
}
