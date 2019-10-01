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
        // Suppose we have 100 gumballs...
        //to do
        $this->gumballMachineInstance->InsertP("Mohammed","Amin","29/04/1991","Mons");
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
