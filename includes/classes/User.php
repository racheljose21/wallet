<?php
class User {
	private $user;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
	}

	/*public function getUsername() {
		return $this->user['username'];
    }*/

    public function getId() {
		return $this->user['id'];
	}

    public function getPhone() {
		return $this->user['phone'];
	}

	public function getBalance() {
		$userid = $this->user['id'];
		$query = mysqli_query($this->con, "SELECT balance FROM users WHERE id='$userid'");
		$row = mysqli_fetch_array($query);
		return $row['balance'];
	}

	public function getFirstAndLastName() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}




}

?>