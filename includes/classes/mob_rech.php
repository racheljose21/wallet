<?php
class mob_rech {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

    public function recharge($phone,$amount,$operator,$type){
        $date_added = date("Y-m-d H:i:s");
        $added_by = $this->user_obj->getId();
        if($this->user_obj->getBalance()>$amount)
        {
            $query = mysqli_query($this->con, "INSERT INTO mrecharge VALUES('', $added_by, '$phone', $amount,'$operator','$type','$date_added')");
            $balance=$this->user_obj->getBalance();
            $balance=$balance-$amount;
            $update_query = mysqli_query($this->con, "UPDATE users SET balance='$balance' WHERE id='$added_by'");


        }
        else{
            echo 'Insufficient balance';
        }
        
    }

	



}

?>