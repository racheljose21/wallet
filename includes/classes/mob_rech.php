<?php
class mob_rech {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

    public function recharge($phone,$amount,$operator,$type,$error_array){
        $date_added = date("Y-m-d H:i:s");
        $added_by = $this->user_obj->getId();
        if(!is_numeric($amount))
	    {
		    array_push($error_array,'Enter a valid amount<br>');
        }
        else if(  strlen((string)$phone)!=10 || !is_numeric($phone)  )
        {
            array_push($error_array,'Enter a valid Phone number<br>');
        }
        else if(!strcmp($type ,""))
        {
            array_push($error_array,'Select an if prepaid or postpaid<br>');
        }
        else{
            if($this->user_obj->getBalance()>$amount)
            {
                $query = mysqli_query($this->con, "INSERT INTO mrecharge VALUES('', $added_by, '$phone', $amount,'$operator','$type','$date_added')");
                $last_id = mysqli_insert_id($this->con);
                $balance=$this->user_obj->getBalance();
                $balance=$balance-$amount;
                $update_query = mysqli_query($this->con, "UPDATE users SET balance='$balance' WHERE id='$added_by'");
                $query_trans=mysqli_query($this->con,"INSERT INTO transactions VALUES($added_by,'mrecharge',$last_id,$amount,'$date_added')");
                
                array_push($error_array,'Recharge Successful!<br>');
    
            }
            else{
                array_push($error_array,'Insufficient balance<br>');
            }
        }
        return $error_array;
        
    }

    public function dthrecharge($phone,$amount,$operator,$error_array){
        $date_added = date("Y-m-d H:i:s");
        $added_by = $this->user_obj->getId();
        if(!is_numeric($amount))
	    {
		    array_push($error_array,'Enter a valid amount<br>');
        }
        else if(  strlen((string)$phone)!=10 || !is_numeric($phone)  )
        {
            array_push($error_array,'Enter a valid Phone number<br>');
        }
        else{
            if($this->user_obj->getBalance()>$amount)
            {
                $query = mysqli_query($this->con, "INSERT INTO dthrecharge VALUES('', $added_by, '$phone', $amount,'$operator','$date_added')");
                $last_id = mysqli_insert_id($this->con);
                $balance=$this->user_obj->getBalance();
                $balance=$balance-$amount;
                $update_query = mysqli_query($this->con, "UPDATE users SET balance='$balance' WHERE id='$added_by'");
                
               // 
                $query_trans=mysqli_query($this->con,"INSERT INTO transactions VALUES($added_by,'dthrecharge',$last_id,$amount,'$date_added')");
                
                array_push($error_array,'Recharge Successful!<br>');
    
            }
            else{
                array_push($error_array,'Insufficient balance. Please add money into your wallet to continue<br>');
            }
        }
        
        return $error_array;
    }

	



}

?>