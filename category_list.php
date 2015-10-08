<?php

   include_once('resources\init.php');
?>
<html>
	<head>
	     <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap.min.css">
	    <title>Category list</title>
	</head>
	
		<body>
			<div class="container">
				<div class="row">
				
				    <div class="col-md-4"></div>
					
					<div class="col-md-4">
						<div class="well">
							<?php
							   
							   foreach(get_categories() as $category){
							   ?>
							   
							   <p><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> - <a href="delete_category.php?id=<?php echo
							   $category['id']; ?>">Delete</a></p>
										
							<?php
							
							   }
							?>
						</div>	
					</div>	
					
					<div class="col-md-4"></div>
					
				</div>
			</div>
		</body>
</html>