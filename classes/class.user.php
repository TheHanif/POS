<?php 
/**
* USER MAIN CLASS
*/
class user extends database
{	
	
	private $table_name;

	function __construct(){
		parent::__construct();

		$this->table_name = 'users';
	}


	/**
	 * Login user
	 * @param  array $info submited form data
	 * @return boolean
	 */
	public function do_login($info)
	{	
		// Filter password
		$password = md5($info['password']);

		// Prepare where statement
		$this->where('login', $info['username']);
		$this->where('password', $password);

		// Select user primary key
		$this->select(array('fname'=>'first_name', 'lname'=>'last_name', 'photo'=>'photo', 'designation'=>'designation', 'capabilities'=>'capabilities'));


		// From table
		$this->from($this->table_name);

		// If provided info is correct, login user
		if ($this->row_count() > 0) {
			
			$results = $this->result();

			$_SESSION['user'] = $results;

			return $results;
		}else{
			return false;
		}
	} // end of do_login()


}
 ?>