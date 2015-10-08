<?php
  
    include_once('resources\init.php');
	
	if(isset($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['repass']))
	{
	  $errors = array();
	   
	   $name     =  trim($_POST['name']);
	   $email  =    trim($_POST['email']);
	   $pass     =  trim($_POST['pass']);
	   $repass  =  trim($_POST['repass']);
	   
	   if(empty($name))
	   {
		   $errors[] = "You need to enter a username.";
	   }
	   else if(!ctype_alpha($name))
	   {
		   $errors[] = "Username should be alpha characters only";
	   }
	   else if(strlen($name) >24)
	   {
		   $errors[] = "The username cannot be longer than 24 characters.";
	   }
	   else if(name_exit("username", $name))
	  {
		  $errors[] = "Thats name already exits.";
	  }
	   
	   if(empty($email))
	   {
		   $errors[] = "You need to enter a email.";
	   }
	 
	   else if(strlen($email) >24)
	   {
		   $errors[] = "The email cannot be longer than 24 characters.";
	   }
	   else if(email_exit("email", $email))
	  {
		  $errors[] = "Thats email already exits.";
	  }
	   
	   if(empty($pass))
	   {
		   $errors[] = "Password is required.";
	   }
	  
	   
	   if(empty($repass))
	   {
		   $errors[] = "Confirm password is required.";
	   }
	   
	   if(empty($errors))
	   {
		   add_user($name, $email, $pass);
		   
		   $id = mysql_insert_id();
		   Header("Location: home.php");
		  die();
	   }
	   
	   
	   
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <script>
        function validate(){
            var a = document.getElementById("pwd").value;
            var b = document.getElementById("confirm_password").value;
            if(a!=b)
            {
                alert("Password do not match");
                return false;
            }
        }
    </script>
</head>

<body>
<div class="container-fluid">
    <div class="well">
    <div class ="row">
        <div class="col-md-12">

                <h2 align="center">Register Here</h2><br><br>
				
				<?php
			   
			   if(isset($errors) && !empty($errors))
			   {
				   echo "<ul><li>", implode('</li><li>', $errors), "</li></ul>";
			   }
			?>
                
                <form action="register.php" method="post" onSubmit="return validate();"  class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="confirm_password">Re-enter Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="repass" class="form-control" id="confirm_password" placeholder="Re-enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <label align="center"><input type="submit" name="submit" value="Create account" class="btn btn-primary"></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
	</div>
	
</div>
</body>
</html>
