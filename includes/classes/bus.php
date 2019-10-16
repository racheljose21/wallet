<?php

class bus {
	private $user_obj;
  private $con;
  private $bus;

    public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
  }
  
    public function load_available_buses($date,$from,$to,$error_array,$str)
    {
        $str="<div class='card'>
        <div class='card-header'>
          $from to $to
        </div>";
        $str1="";
        $query=mysqli_query($this->con,"SELECT * from buses where jdate='$date' and loc_from='$from' and loc_to='$to'");
        if(mysqli_num_rows($query)==0)
        {
            array_push($error_array,"No buses available");
        }
        else{
            while($row = mysqli_fetch_array($query))
            {
                $amount=$row['charge'];
                $date=$row['jdate'];
                $time=$row['time'];
                $journey=$row['journey'];
                $bus_id=$row['id'];
                $str.="
                <div class='card-body'>
                  <h5 class='card-title'>$amount</h5>
                  <p class='card-text'>$date</p>
                  <form action='busbook.php' method ='post'>
                  <input type='hidden' name='amount' value=$amount >
                  <input type='hidden' name='date' value=$date >
                  <input type='hidden' name='time' value=$time >
                  <input type='hidden' name='from' value=$from >
                  <input type='hidden' name='to' value=$to >
                  
                  <input type='hidden' name='journey' value=$journey >

                  <button class='btn btn-primary' type='submit' name='book' value=$bus_id >Book</button>
                  </form>
                </div>
              </div>
              ";
              $str1.="
              <div class='w3-top'>
              <h1><center><u>Available Buses</u></center></h1>
            </div>
          
          <style type='text/css'>
              body{
                color:#000000; background-color:#ffffff;
                font-family:Arial, Helvetica, sans-serif, verdana, sans-serif; font-size:20pt;}
              
              fieldset {
                font-size:20px;
                padding:15px;
                width:100%
                line-height:0.5;}
              
              
              </style>  
              <center>
          <div class='w3-main w3-content w3-padding' style='max-width:1200px;margin-top:100px'>
            <fieldset>
            <div class='w3-row-padding w3-padding-16 w3-center' id='food'>
              <div class='w3-quarter'>
                
                <h2>$bus_id</h2>
                <h4>Cost:$amount</h4>
                <p>Travel time:$journey</p> <p>Departure Time:$time</p> 
                <form action='busbook.php' method ='post'>
                  <input type='hidden' name='amount' value=$amount >
                  <input type='hidden' name='from' value=$from >
                  <input type='hidden' name='to' value=$to >
                  <input type='hidden' name='date' value=$date >
                  <input type='hidden' name='time' value=$time >
                  <input type='hidden' name='journey' value=$journey >

                  <button class='btn btn-primary' type='submit' name='book' value=$bus_id >Book</button>
                  </form>
                  </div>
          </fieldset>
          </center>
              ";
            }
        }
      
        return $str;
    }

    public function bookbusticket($bus_id,$amount,$error_array,$from,$to){
      $date_added = date("Y-m-d H:i:s");
      $added_by = $this->user_obj->getId();
      if($this->user_obj->getBalance()>$amount)
      {
          $balance=$this->user_obj->getBalance();
          $balance=$balance-$amount;
          $update_query = mysqli_query($this->con, "UPDATE users SET balance='$balance' WHERE id='$added_by'");
          $bustickets='Bus Ticket from '.$from .' to '.$to;
          $query_trans=mysqli_query($this->con,"INSERT INTO transactions VALUES($added_by,'$bustickets',$bus_id,$amount,'$date_added')");
          array_push($error_array, "Bill payment successful<br>");


      }
      else{
          array_push($error_array, "Insufficient balance<br>");
      }
      return $error_array;
      
  }

}

?>