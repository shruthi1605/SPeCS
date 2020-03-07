<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once("../Others/formvalidator.php");

/*	$link=mysqli_connect("localhost","root","")or die("not connected");
    $con= mysqli_select_db($link,"specs")or die("no db found");
     if($link)
     		echo "WELCOME "; 
     if($con)
     	echo "Specs found ";

     if(isset($_POST['submit']))
     {
     	$fname=$_POST['fname'];
     	$lname=$_POST['lname'];
     	$email=$_POST['email'];
     	$pw=$_POST['pw'];
     	$cname=$_POST['cname'];
     	$mno=$_POST['mno'];

     	$fname=mysqli_real_escape_string($link,$fname);
     	$lname=mysqli_real_escape_string($link,$lname);
     	$email=mysqli_real_escape_string($link,$email);
     	$pw=mysqli_real_escape_string($link,$pw);
     	$cname=mysqli_real_escape_string($link,$cname);
     	$mno=mysqli_real_escape_string($link,$mno);

     	$query="INSERT INTO .`stud-profile`(`first_name`,`last_name`,`email_id`,`password`,`colg_name`,`mob_no`) VALUES('$fname','$lname','$email','$pw','$cname','$mno');";
     	$res=mysqli_query($link,$query) or die(" Error occurred ".mysqli_error($link));

     	if($res)
     		echo "<h3>Registered successfully </h3>";

     	else
     		echo "Error!"; 
     } */


/*--------------------MAIN functions---------------------  */


     class member
{
     	var $error_message;
     	var $db_host;
     	var $username;
     	var $pwd;           var $row;
     	var $tablename;    var $qry;
     	var $database;
        var $connection;

     	function InitDB($host,$uname,$pwd,$database,$tablename)
     	{
     		$this->db_host=$host;
     		$this->username=$uname;
     		$this->pwd=$pwd;

     		$this->database=$database;
     		$this->tablename=$tablename;
     	}

     	function RegisterUser()
     	{
     		if(!isset($_POST['submit']))
     			return false;

     		$formvars=array();

     		if(!$this->ValidateRegistrationSubmission())
     			return false;

     		if(!$this->CollectRegistrationSubmission($formvars)) return false;

     		if(!$this->SaveToDatabase($formvars))
     			return false;

     		return true;
     	}

/*----------------------LOGIN--------------------*/
     	function Login()
     	{
            $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {   
            echo "Database Login failed! ";
            return false;
        }
        if(!mysqli_select_db( $this->connection,$this->database))
        {
            echo 'Failed to select database: ';
            return false;
        }

     		if(empty($_POST['email']))
        {
            echo "Email is empty!";
            return false;
        }
        
        if(empty($_POST['pw']))
        {
            echo "Password is empty!";
            return false;
        }
        
        $email = mysqli_real_escape_string($this->connection,$_POST['email']);
        var_dump($email);

        $pw = trim($_POST['pw']);
        
        if(!isset($_SESSION))
        	{ session_start(); }

       /* if(!$this->CheckLoginInDB($email,$pw))
        {
            return false;
        }*/

        $qry = "SELECT * FROM student_prof WHERE email_id='$email' ";

       /* var_dump($qry);

        $result = mysqli_query($this->connection,$qry) or die(" Error occurred ".mysqli_error($this->connection)); 
        var_dump($result);
        var_dump(mysqli_num_rows($result));
        if( mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            echo "YES!";

            if(password_verify($pw,$row['pw']))
               { $_SESSION['email_id'] = $row['email_id'];
                    return true;}
            


        }

        else 
                return false;*/
            $data=array();
            $result = mysqli_query($this->connection,$qry);
            if(mysqli_num_rows($result)>0)
                while($row=mysqli_fetch_assoc($result))
                    $data[]=$row;

                else 
                    echo "No login!";

        
        
    }
     	

/*-----------------secondary functions-------------------*/


     	function ValidateRegistrationSubmission()
     	{
     	
     		$validator=new FormValidator();
     		$validator->addValidation("fname","req","Please fill in the name field");
     		$validator->addValidation("lname","req","Please fill in the name field");
     		$validator->addValidation("email","req","Please fill in the email field");
     		$validator->addValidation("pw","req","Please fill in the  password field");
     		$validator->addValidation("cname","req","Please fill in the college name field");
     		$validator->addValidation("mno","req","Please fill in the  mobile number field");
     		
     		if(!$validator->ValidateForm())
     		{
     			$error='';
     			$error_hash=$validator->GetErrors();
     			foreach($error_hash as $inpname=>$inp_err)
     				$error=$inpname.':'.$inp_err."\n";
     			$this->HandleError($error);
     			return false;
     		}
     		return true;
     	}

     	function CollectRegistrationSubmission(&$formvars)
     	{
            $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {   
            echo "Database Login failed! ";
            return false;
        }
        if(!mysqli_select_db( $this->connection,$this->database))
        {
            echo 'Failed to select database: ';
            return false;
        }

     		$formvars['fname']=mysqli_real_escape_string($this->connection,$_POST['fname']);
     		$formvars['lname']=mysqli_real_escape_string($this->connection,$_POST['lname']);
     		$formvars['email']=mysqli_real_escape_string($this->connection,$_POST['email']);
     		$formvars['pw']=mysqli_real_escape_string($this->connection,$_POST['pw']);
            $formvars['pw']=password_hash($formvars['pw'],PASSWORD_DEFAULT);
     		$formvars['cname']=mysqli_real_escape_string($this->connection,($_POST['cname']));
     		$formvars['mno']=mysqli_real_escape_string($this->connection,$_POST['mno']);

            return true;
     	}

     	function SaveToDatabase(&$formvars)
    {
        
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            echo "This email is already registered";
            return false;
        }
        
        
        if(!$this->InsertIntoDB($formvars))
        {
            echo "Inserting to Database failed!";
            return false;
        }
        return true;
    }

    

    function Ensuretable()
    {
        $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $this->tablename");   
       
        return true;
    }

	
     
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val =mysqli_real_escape_string($this->connection,$formvars[$fieldname]);
        $qry = "SELECT email_id FROM `student_prof` WHERE email_id=$field_val";
        $result = mysqli_query($this->connection,$qry); 
        #echo var_dump($result);   
        if($result && mysqli_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }

    function InsertIntoDB(&$formvars)
    {
    
        
        $formvars['email'] = trim($formvars['email']);
        var_dump($formvars['email']);

        $insert_query = "INSERT into `student_prof`(
                `first_name`, `last_name`,
                `email_id`, `password`,
                `colg_name`, 
                mob_no)
                values(
                '$formvars[fname]',
                '$formvars[lname]',
                '$formvars[email]',
                '$formvars[pw]',
                '$formvars[cname]',
                '$formvars[mno]');";      
/*mysqli_query( $this->connection,$insert_query) or die("Error inserting".mysqli_error($this->connection));*/

        if(!mysqli_query( $this->connection,$insert_query))
        {
           echo "Error inserting data to the table\nquery:$insert_query";
            return false;
        }        
        return true;
    }

 


/*---------------------------Helper - functions ----------------------*/


	function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }

    

    

     
     

     

}
?>