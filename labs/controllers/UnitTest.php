<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends CI_Controller {

	public function AddsOnePlusOne()
	{
      $this->load->library('unit_test');
      
      $test = 1 + 1;

      $expected_result = 2;

      $test_name = 'This test adds one plus one.';

      echo $this->unit->run($test, $expected_result, $test_name);
      //echo $this->unit->report();
    }
  
	private function IfTheVariableIsInteger()
	{
      $this->load->library('unit_test');
      
      $test = 1;

      $expected_result = 'is_int';

      $test_name = 'Verify if is integer';

      return $this->unit->run($test, $expected_result, $test_name);
    }
  
    private function EvaluateIfIsTrue(){
      $this->load->library('unit_test');
      $this->unit->use_strict(TRUE);
      $var = 1;
      $expected = TRUE;
      $test_name = 'Verify if is true';
      return $this->unit->run($var, $expected, $test_name);
    }
  
    public function runTests(){
      $this->IfTheVariableIsInteger();
      $this->EvaluateIfIsTrue();
      echo $this->unit->report();
    }
    
}