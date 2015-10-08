<?php
  
   include_once('resources\init.php');
   
   if(isset($_POST['title'], $_POST['contents'], $_POST['category']))
   { 
       $errors = array();
	   
	   $title     =  trim($_POST['title']);
	   $contents  =  trim($_POST['contents']);
	   
	   if(empty($title)) 
	   {
		   $errors[] = "You need to supply a title.";
	   }
	   else if(strlen($title) >255)
	   {
		   $errors[] = "The title cannot be longer than 255 characters.";
	   }
	   
	   if(empty($contents))
	   {
		   $errors[] = "You need to supply some text.";
	   }
	   
	   if(!category_exits('id', $_POST['category']))
	   {
		   $errors[] = "The category does not exit.";
	   }
	   
	   if(empty($errors))
	   {
		   add_post($title, $contents, $_POST['category']);
		   
		   $id = mysql_insert_id();
		   Header("Location: index.php?id={$id}");
		   die();
	   }
	   
	   
   }
?>

<html>
        <head>
           <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="bootstrap.min.css">
                <style>
                   label{display : block; }
                </style>

                <title>Add a post</title>
        </head>
	
		<body>
		  
		  <div class="container-fluid">
		    <div class="row">
			

				
				<div class="col-md-12">
				   <div class="well">
			  
					<h1 align = "center">Add a post</h1>
					
					<?php
					   
					   if(isset($errors) && !empty($errors))
					   {
						   echo "<ul><li>", implode('</li><li>', $errors), "</li></ul>";
					   }
					?>
					
						<form action="" method="post" align = "center">
							<div>
								<label for="title">Title</label>
								<input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>">
							</div>
							
							<div>
								<label for="contents">Contents</label>
								<textarea name="contents" rows="15" cols="50"><?php if(isset($_POST['contents'])) echo $_POST['contents']; ?></textarea>
							</div>
							
							<div>
								<label for="category">Category</label>
								<select name="category">
								   <?php
									   foreach(get_categories() as $category)
									   {
									?>
									
									<option value="<?php echo $category['id']; ?> "> <?php echo $category['name']; ?> </option>
									<?php							
									   }
								   ?>
								</select>
							</div>
							
							<div>
								<input type="submit" value="Add Post">
							</div>
						</form>	
					</div>
				 </div>
				 

				 
			</div> 
				 
			</div>		
		</body>
</html>