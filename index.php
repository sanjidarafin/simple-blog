<?php
       include_once('resources\init.php');

       session_start();
     if(!isset($_SESSION['username']) ){
        if(!isset($_COOKIE['username'])){
            header('Location: home.php') ;
        }
     }
     if(isset($_SESSION['cookie']) == 'enable'){

        setcookie('username', $_SESSION['username'], time()+86400);

     }

            //$posts = ( isset($_GET['id']) ) ? get_posts($_GET['id']) : get_posts();
            //$posts = get_posts();
            $posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap.min.css">
			<style>
			   ul{list-style-type: none;}
			   li{display: inline; margin-right: 20px;}
			</style>
			
			  <title>My Blog</title>
	</head>
	
		<body>
		
			<div class="container-fluid" style="background-color: burlywood;">
			
				<div class="row">
						<div class="col-md-12">
							<!--<img src="Image/wood.jpg" style="width:100%;height:200px;">   -->
						</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
					  <ul class="nav  nav-justified" style="background-color:burlywood;width:100%;height:60px;">
							<li class="active"><a href="index.php"> All Posts</a></li>
							<li class="active"><a href="add_post.php">Add a Post</a></li>
                           <li class="active"><a href="add_category.php">Add a Category</a></li>
                          <!--<li class="active"><a href="category_list.php">Category List</a></li> -->
							<li class="active"><a href="logout.php">Logout</a></li>
						</ul>
							
					</div>		
				</div>
				
				<div class="row">
					 
					
					<div class="col-md-12 col-sm-12">
					   <div class="well">
				
						<h1 align="center">My Blog</h1>
						
							<?php
							   
							  foreach($posts as $post)
							  {
								 // if( !category_exits('name', $post['name']) ){
									 // $post['name'] = "Uncategorized";
								 // }
								 ?>
							<h2 align="left"><a href="index.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h2><hr>
							<p align="left"> Posted on <?php echo date("d-m-Y h:i:s", strtotime($post['date_posted'])); ?> 
								 in <a href="category.php?id=<?php echo $post['category_id']; ?>"><?php echo $post['name'] ?></a>
							</p>
							
							<div align="left"><?php echo nl2br($post['contents']); ?></div>
							
							<menu>
								<ul align="left">
									<li><a href="delete_post.php?id=<?php echo $post['post_id']; ?>">Delete  post.</a></li><hr>
									<li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit  post.</a></li>
								</ul>
							</menu>
							
									 
						  <?php } ?>
					  </div>
					  
					</div> 
					 
				</div>
				
				<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="well" style="background-color: burlywood; color: navy;">
								<p align="center">Copyright@2015.All Rights Reserved</p>
								<p align="center"></p>
								<p align="right">Designed by sanjida</p>
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