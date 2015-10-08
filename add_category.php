<?php
  
  include_once('resources\init.php');
  
  if(isset($_POST['name']))
  {
	  $name = trim($_POST['name']);
	  
	  if(empty($name))
	  {
		  $error = "You must submit a category name.";
	  }
	  else if(category_exits("name", $name))
	  {
		  $error = "Thats category already exits.";
	  }
	  else if(strlen($name) > 24)
	  {
		  $error = "Category names can only be upto 24 characters.";
	  }
	  else if(!ctype_alpha($name))
	  {
		  $error = "Category names should be characters only.";
	  }
	  
	  if(!isset($error))
	  {
		  add_category($name);
		  
		  Header("Location: add_post.php");
		  die();
  
  
	  }
  }
?>
<html>
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap.min.css">
	    <title>Add a category</title>
	</head>
	
		<body>
			<div class="container-fluid">
				<div class="row">
				    <div class="col-md-3"></div>
					
					<div class="col-md-6">
						<div class="well">
							<h1>Add a category</h1>
							 
							 <?php
								if(isset($error))
								{
									echo "<P> {$error} </p>\n";
								}					
							 ?>
								<form action="" method="post">
									<div>
										<label for="name">Name</label>
										<input type="text" name="name" value="">
									</div>
									
									<div>
										<input type="submit" value="Add Category">
									</div>
								</form>
						</div>		
					</div>
					
                    <div class="col-md-3"></div>
				</div>		
			</div>		
		</body>
</html>