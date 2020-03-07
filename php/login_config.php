<?PHP 
require_once("../Others/member_config.php");

	if(isset($_POST['submit']))
	{
		if(empty($_POST['email']))
        {
            echo "Email is empty!";
            
        }
        
        if(empty($_POST['pw']))
        {
            echo "Password is empty!";
            
        }
        
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $pw=trim($_POST['pw']);

        if(!isset($_SESSION))
        	{ session_start(); }

        $qry = "SELECT * FROM student_prof WHERE email_id='$email' ";

        $result = mysqli_query($link,$qry) or die(" Error occurred ".mysqli_error($link)); 
        
        
        if( mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            

            if(password_verify($pw,$row['password']))
            {
               $_SESSION['email_id'] = $row['email_id'];
           		$_SESSION['first_name']=$row['first_name'];
           		$_SESSION['last_name']=$row['last_name'];
              $_SESSION['colg_name']=$row['colg_name'];
              $_SESSION['mob_no']=$row['mob_no'];
              $_SESSION['stud_id']=$row['stud_id'];
                   $_SESSION['logged']=true;
                  header("Location:../specs-after-login.php"); 
                  exit;
                }
            else
            	{echo "<span>Invalid email-id or password!</span>";
             $_SESSION['logged']=false;
            header("Location:invalid_login.html");
       			 }


        }
        else 
        	{echo "<span>The email-id or password does not match</span>";
        		header("Location:invalid_login.html");}
	}

?>