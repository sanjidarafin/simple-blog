<?php

  function add_user($name,$email,$pass)
  {
	  $name = mysql_real_escape_string($name);
      $email = mysql_real_escape_string($email);
	  $pass = mysql_real_escape_string($pass);
	  $pass = md5($pass);
	  
	   mysql_query("INSERT INTO user SET 
	                        username  =  '{$name}',
							email     =  '{$email}',
							password  =  '{$pass}'");	
   
  }
  
  function name_exit($field,$value)
  {
	  $field = mysql_real_escape_string($field);
	  $value = mysql_real_escape_string($value);
	  
      $query = mysql_query("SELECT COUNT(1) FROM user WHERE {$field} = '{$value}'");
	  
	  return(mysql_result($query, 0) == '0' ? false : true);
  }
  
  function email_exit($field,$value)
  {
	  $field = mysql_real_escape_string($field);
	  $value = mysql_real_escape_string($value);
	  
      $query = mysql_query("SELECT COUNT(1) FROM user WHERE {$field} = '{$value}'");
	  
	  return(mysql_result($query, 0) == '0' ? false : true);
  }
 
 function login_checker($array)
 {
	    $email = $array['email'];
        $pass = $array['password'];
        $sql = "SELECT email, password FROM user WHERE email = '$email'";
        $result = mysql_query($sql);
		$user = mysql_fetch_array($result);
        if($user > 0)
		{
            $row = mysql_fetch_assoc($user);
            $db_password = $row['password'];
            if($db_password == $pass)
			{
                return 1;
            }
			else
			{
                return 'your password is wrong';
            }
        } 
		else
		{
            return 'Email is not exist';
        }
    
 }
  
  function add_post($title,$contents,$category)
  {
	$title = mysql_real_escape_string($title);
    $contents = mysql_real_escape_string($contents);
    $category = (int) $category;

    mysql_query("INSERT INTO posts SET 
	                        cat_id      =  '{$category}',
							title       =  '{$title}',
							contents    =  '{$contents}',
							date_posted =  NOW()");	
  }
  
  function edit_post($id,$title,$contents,$category)
  {
	    $id = (int)$id; 
	    $title = mysql_real_escape_string($title);
		$contents = mysql_real_escape_string($contents);
		$category = (int) $category;
		
		mysql_query("UPDATE posts SET 
	                        cat_id      =  '{$category}',
							title       =  '{$title}',
							contents    =  '{$contents}'
					WHERE id= {$id}");	
  }
  
  function add_category($name)
  {
	   $name = mysql_real_escape_string($name);
	  
       mysql_query("INSERT INTO categories SET name = '{$name}'");
	  
  }
  
  function del($table,$id)
  {
	  $table = mysql_real_escape_string($table);
	  $id    = (int) $id;
	  
	  mysql_query("DELETE FROM {$table} WHERE id= {$id}");
  }
  
  
  
  function get_posts($id = null, $cat_id = null)
	{
	
		$posts = array();
		
		$query = "SELECT `posts`.`id` AS `post_id`,`categories`.`id` AS`category_id`,
								`title`, `contents`, `date_posted`, `categories`.`name`
								 From `posts`
								 INNER JOIN `categories` ON `categories`.`id` = `posts`.`cat_id`";
								 
		if(isset($id))
		{
			$id = (int)$id;
			$query.= "WHERE `posts`.`id` = {$id} ";
		}
		
		if(isset($cat_id))
		{
			$cat_id = (int)$cat_id;
			$query.= "WHERE `cat_id` = {$cat_id}";
		
		}
	 
	    $query.="ORDER BY `posts`.`id` DESC";
								 
		$query = mysql_query($query);
		
		while($row = mysql_fetch_assoc($query))
		{
			$posts[] = $row;
		}
		
		return $posts;
								 
	}
  
  function get_categories($id = null)
  {
	  $categories = array();
	  
	  $query = mysql_query("SELECT id,name FROM categories");
	  while($row = mysql_fetch_assoc($query))
	  {
		  $categories[] = $row;
	  }
	  
	  return $categories;
  }
  
  function category_exits($field,$value)
  {
	  $field = mysql_real_escape_string($field);
	  $value = mysql_real_escape_string($value);
	  
      $query = mysql_query("SELECT COUNT(1) FROM categories WHERE {$field} = '{$value}'");
	  
	  return(mysql_result($query, 0) == '0' ? false : true);
  }
?>