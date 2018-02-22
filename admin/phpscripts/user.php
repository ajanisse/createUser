<?php 
  

	function createUser($fname, $username, $password, $email, $userlvl){
		include('connect.php');

		$userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', DEFAULT, '{$userlvl}', 'no')";
		$userQuery = mysqli_query($link, $userString);
	 
        if($userQuery) {
           
         
            //Mail Variables
            $to = $email;
            $subject = "Login Credentials";
            $mailMsg = "Your username is: ".$username."\n Your password is:".$password."\n Your login link: http://localhost/MMED_3014_18/admin/admin_login.php";
            //This is where the *send email* script goes 
                
            //Original code from:      http://php.net/manual/en/function.mail.php 
            // bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )       
            mail($to, $subject, $mailMsg);
           
			redirect_to("admin_index.php");
		}else{
            //error message
			$message = "There was an error setting up this user. Contact Admin for more help!";
			return $message;
		}


		mysqli_close($link);
	}



	
?>
