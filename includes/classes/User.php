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

	/*public function getFirstAndLastName() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}*/
	public function carddeets($amount,$cardno,$name,$expiry,$cvv)
	{
		$otp = rand(100000,999999);
		$_SESSION['otp']=$otp;
		echo $otp;
		return $otp;

	}
	public function addMoney($amount)
	{
        $balance=$this->user['balance'];
        $balance=$balance+$amount;
        $id=$this->user['id'];
		$query = mysqli_query($this->con, "UPDATE users SET balance=$balance where id=$id ");
		echo 'sucsess';
	}
	public function getTransactions(){
		$userid = $this->user['id'];
		$str="";
		$query = mysqli_query($this->con, "SELECT * FROM transactions WHERE added_by='$userid'");
		while($row = mysqli_fetch_array($query))
		{
			$amount=$row['amount'];
			$date=$row['date_added'];
			$table_name=$row['table_name'];
			/*$str .= "<div class='status_post'>

								<div class='posted_by' style='color:#ACACAC;'>
									<h6>$table_name</h6>
									<p>Amount: $amount</p>
									<p>$date</p>
									</div>

							</div>
							<hr>";*/
			$str .= "<div class='container' style='border:2px solid'>
						<div class='row'>
						  <div class='col-sm' style='align-self:center;padding: 1rem;'>
						  <h6>$table_name</h6>
						  </div>
						  <div class='col-sm' style='align-self:center;padding: 1rem;'>
						  <p>Amount: $amount</p>
						  <p>$date</p>
						  </div>
						  	</div>
						  </div>";
		}
		
		//echo $str;
		return $str;
	}



}

?>