<?php

$error_array = array();
if(isset($_POST['findgasbill'])){
    
    $gas_id=$_POST['search'];
    $check_database_query = mysqli_query($con, "SELECT * FROM gas_bils_pending WHERE gasbill_id=$gas_id");
    $check_query = mysqli_num_rows($check_database_query);
    if($check_query==0)
    {
        array_push($error_array,'Invalid gas id<br>');
    }
    else{
        $row = mysqli_fetch_array($check_database_query);
        if($row['pending']==0){
            array_push($error_array,"No Bills Pending<br>");
         }
        else{
        $gname=$row['name'];
        $gprovider=$row['provider'];
        $gamount=$row['amount'];
        $gpending=$row['pending'];
        $gid=$row['gasbill_id'];
        $_SESSION['gid']=$gid;
        $_SESSION['gamount']=$gamount;
        $str = "
        <br>
        <div class='container' style='
        display: inline-flex;
    '>

								<div class='posted_by' style='color:#ACACAC;margin: auto;'>
									<h6>$gname</h6>
									<p>Amount: $gamount</p>
									</div>

                            
                            
                            <div class='paybill' id='paybill' style='margin: auto;'>
         <form action='gasbill1.php' method ='post'>
        <button  type='submit' name='paygasbill' value='Pay' >Pay</button>


					
    </form>
        
    </div>
    </div>
							<hr>";
        }
        
        

    }

}
if(isset($_POST['paygasbill']))
{
            
            $gaspay = new gas_bill($con,$userLoggedIn);
            $gid=$_SESSION['gid'];
            $gamount=$_SESSION['gamount'];
            $error_array=$gaspay->paygasbill($gid,$gamount,$error_array);
}

?>
