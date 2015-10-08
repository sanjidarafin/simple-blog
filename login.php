<?php
    
	session_start();
	
	if(isset($_SESSION['username'])|| isset($_COOKIE['username']))
    {
		header ("Location: index.php");	
	}
	
	  include_once('resources\init.php');
	
	error_reporting(0);
	
	if($_POST['submit'])
	{
		if(isset($_POST['remember']))
        {
           $_SESSION['cookie'] = 'enable';  
           setcookie('useremail', $_SESSION['username'], time()+3600);		   
        }
	 
        if(!in_array(null, $_POST))
        {
          $check = login_checker($_POST);
           if($check === 1)
           {
               $useremail = $_POST['email'];
               $_SESSION['username'] = $useremail;
               header('Location: index.php');
           }else
           {
               $message = $check;
           }
        }
	}
	
	
?>	

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class ="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="well" style="background-color: gray">
                        <h2 align="center">Login</h2><br><br>


                        <form action="login.php" method="post" class="form-horizontal" role="form" >
                        <h2 class="alert-warning"><?php if(isset($message)) echo $message ?></h2>

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
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label align="center"><input type="submit" name="submit" value="Login" class="btn btn-primary"></label>

                                    <label class="checkbox pull-center"><br>
                                    <input type="checkbox" value="rememberme" name="remember">
                                    Remember me
                                </label>
                                <a href="register.php" class="text-left new-account"><p align="left"><font size="5" color="black">Create an account</font></a></p>
                                </div>
                             </div>


                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>


        </div>
    </body>
</html>
