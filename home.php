<?php
    
	session_start();
	
	if(isset($_SESSION['username'])|| isset($_COOKIE['username'])){
		header ("Location: index.php");	
	}
	
	  include_once('resources\init.php');
	
	error_reporting(0);
	
	if($_POST['submit'])
	{
		
		if(isset($_POST['remember'])){
           $_SESSION['cookie'] = 'enable';  
        // setcookie('useremail', $_SESSION['username'], time()+3600);	
         	
     }
		
	 if(!in_array(null, $_POST)){
      $check = login_checker($_POST);
       if($check === 1){
           $useremail = $_POST['email'];
           $_SESSION['username'] = $useremail;           
           header('Location: index.php');
       }else{
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
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                          <!--  <img src="Image/header.jpg" style="width:100%;height:200px;"> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav  nav-justified" style="background-color:  burlywood; width:100%;height:60px;">
                                <li class="active"><a href="home.php">Home</a></li>
                                <li class="active"><a href="#">Contacts</a></li>
                                <li class="active"><a href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-8" >
                            <div class = "well">
                            <h1> PHP Framework</h1> <br>
                            <h4> Posted on 29-09-2015 08:53:10 in framework </h4> <br>
                            <p> There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.</p>

                                <h1> Information Technology</h1> <br>
                                <h4> Posted on 29-09-2015 09:53:10 in technology </h4> <br>
                                <p> There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                    There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                    There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.
                                    There are several framework in PHP.Such as,codeIgniter, zend, Symfony,Phalcon, Laravel etc.</p>

                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well" >
                                <h2 align="center">Login</h2><br><br>

                                    <form action="login.php" method="post" class="form-horizontal" role="form" >
                                      <h2 class="alert-warning"><?php if(isset($message)) echo $message ?></h2>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="email">Email:</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="pwd">Password:</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <label align="left"><input type="submit" name="submit" value="Login" class="btn btn-success"></label>

                                                <label class="checkbox pull-center"><br>
                                                    <input type="checkbox" value="rememberme" name="remember">
                                                        Remember me
                                                </label>
                                                <a href="register.php" class="text-left new-account"><p align="left"><font color="black">Create an account</font></a></p>
                                            </div>
                                         </div>

                                    </form>
                            </div>
                        </div>


                    </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="well" style="background-color:  burlywood; color: navy;">
                                    <p align="center">Copyright@2015.All Rights Reserved</p>
                                    <p align="center"></p>
                                    <p align="right"> Designed by sanjida .</p>
                                    <h4 align="right">
                                        <span class="label label-primary">f</span>
                                        <span class="label label-info">t</span>
                                        <span class="label label-danger">g+</span>
                                        <span class="label label-primary">in</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                </div>
        </body>
</html>