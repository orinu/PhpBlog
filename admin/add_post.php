<?php include 'includes/header.php' ;?>



<?php

  //Create DB Object
  $db = new Database();

    if(isset($_POST['submit'])){
  	  //Assign Vars
    	$title = mysqli_real_escape_string($db->link,$_POST['title']);
    	$body = mysqli_real_escape_string($db->link,$_POST['body']);
    	$category = mysqli_real_escape_string($db->link,$_POST['categories']);
    	$author = mysqli_real_escape_string($db->link,$_POST['author']);
    	$tage = mysqli_real_escape_string($db->link,$_POST['tage']);

    	//Simple Validation
    	if($title == '' || $body == '' || $author == '' ){
    		//Set Error
    		$error = 'Please fill out all required fields';
    	} else{

    		$query = "INSERT INTO posts
    					(title, body, category,author, tags)
    					VALUES ('$title','$body','$category','$author', '$tags')";

    		$insert_row = $db->insert($query);
    	}
    	
  }

?>


<?php


  

  
  //Create Query
  $query = "SELECT * FROM categories";
  //Run Query
  $categories = $db->select($query);
?>


<form role= "form" method= "post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name= "title" type="text" class="form-control" placeholder="Enter Title">
  </div>

  <div class="form-group">
    <label>Post Body</label>
    <textarea name = "body"  class="form-control" placeholder="Enter Post Body"></textarea>
  </div>

  <div class="form-group">
    <label>Category Select</label>
 <select name= "categories" class="form-control">
  <?php while($row = $categories->fetch_assoc()) :?>
    <?php if($row['id']==$post['category']){
      $selected ='selected';
    }else{

      $selected = '';
    }?>

  <option <?php echo $selected; ?> value=<?php echo $row['id'] ?>  ;?> <?php echo $row['name'] ;?></option>
<?php endwhile; ?>
  </select>
    </div>

  <div class="form-group">
    <label>Author</label>
    <input name= "author" type="text" class="form-control" placeholder="Enter Author Name">
    </div>

  <div class="form-group">
    <label>Tags</label>
    <input name= "tage" type="text" class="form-control" placeholder="Enter Tags">
    </div>
  
  
  <div>
  <input name="submit" type="submit" class="btn btn-default" value = "Submit" />
  <a href="index.php" = "index.php" class="btn btn-default">Cancel</a>
  </div>
</form>


<?php include 'includes/footer.php' ;?>