<?php
class test_users_controller extends CodeIgniterUnitTestCase
{
	protected $regex = '';
	
	public function __construct()
	{
		$this->regex = "/[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@bc\.edu/";
	}

	public function test_should_be_invalid_if_missing_and()
	{
		$email = "linpdhaha.bc.edu";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 0);
	}
	
	public function test_should_be_invalid_if_missing_bc_dot_edu()
	{
		$email = "linpd@google.com";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 0);
	}
	
	public function test_should_be_invalid_if_contains_space()
	{
		$email = "linpd haha @bc.edu";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 0);
	}
	
	public function test_should_be_valid_if_contains_dot()
	{
		$email = "linp.dhaha@bc.edu";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 1);
	}
	
	public function test_should_be_invalid_if_invalid_email()
	{
		$email = "notanemail";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 0);
	}
	
	public function test_should_be_valid_if_valid_email()
	{
		$email = "goodbcemail@bc.edu";
		$matched = preg_match($this->regex, $email);
		$this->assertEqual($matched, 1);
	}
	
}

/* End of file test_users_model.php */
/* Location: ./tests/models/test_users_model.php */