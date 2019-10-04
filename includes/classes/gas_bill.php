<?php
class gas_bill{
    private $user_obj;
    private $con;
    public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
    }
    public function searchgasbill($gas_id){
        $check_database_query = mysqli_query($con, "SELECT * FROM gas_bils_pending WHERE gasbill_id=$gas_id");
        if(!($check_database_query))
        {
        echo 'Invalid gas id';
        }
        else{
        $row = mysqli_fetch_array($check_database_query);
        $gname=$row['name'];
        $gprovider=$row['provider'];
        $gamount=$row['amount'];
        $gpending=$row['pending'];
        $gid=$row['gasbill_id'];

        }

    }
    public function paygasbill($gas_id,$amount,$error_array){
        $date_added = date("Y-m-d H:i:s");
        $added_by = $this->user_obj->getId();
        if($this->user_obj->getBalance()>$amount)
        {
            $query = mysqli_query($this->con, "UPDATE gas_bils_pending SET pending=0 where gasbill_id=$gas_id");
            $balance=$this->user_obj->getBalance();
            $balance=$balance-$amount;
            $update_query = mysqli_query($this->con, "UPDATE users SET balance='$balance' WHERE id='$added_by'");
            $query_trans=mysqli_query($this->con,"INSERT INTO transactions VALUES($added_by,'gas_bils_pending',$gas_id,$amount,'$date_added')");
            array_push($error_array, "Bill payment successful<br>");


        }
        else{
            array_push($error_array, "Insufficient balance<br>");
        }
        return $error_array;
        
    }
}
?>