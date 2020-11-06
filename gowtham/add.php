<?php 
include('db_conn.php');


$errors = array("email"=>"","name"=>"","ingredients"=>"");
$email = $name = $ingredients = "";

if(isset($_POST['submit'])){
	//check email
	if(empty($_POST['email'])){
		$errors['email'] = 'An email is required';
	}else{
		$email = $_POST['email'];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "enter a valid email";
		}
	}
	if(empty($_POST['name'])){
		$errors['name'] = 'A name is required ';
	}else{
		$name = $_POST['name'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
			$errors['name'] = "enter a valid title";
		}
		
	}
	if(empty($_POST['ingredients'])){
		$errors['ingredients'] = 'An  is required';
	}else{
		$ingredients = $_POST['ingredients'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
			$errors['ingredients'] = "enter valid ingridienrs";
		}
	}
	if(array_filter($errors)){
		echo "there are errors";
	}else{
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$title = mysqli_real_escape_string($conn,$_POST['name']);
		$ings = mysqli_real_escape_string($conn,$_POST['ingredients']);
		$sql = "INSERT INTO pizzas(email,title,ingredients) VALUES ('$email','$title','$ings')";

		if(mysqli_query($conn,$sql)){
		header('Location: index.php');
		}else{
			echo "problem";
		}	 
	}
}

 ?>
 <!DOCTYPE html>
 <html>
 	<?php include('header.php'); ?>

<section class="container grey-text">
	<h4 class="center">Add a Pizza</h4>
	<form class="white" action="add.php" method="POST">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $email; ?>">
		<div class="red-text"><?php echo $errors['email']; ?></div>
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
		<div class="red-text"><?php echo $errors['name']; ?></div>
		<label>Ingredients</label>
		<input type="text" name="ingredients" value="<?php echo $ingredients; ?>">
		<div class="red-text"><?php echo $errors['ingredients']; ?></div>
		<div class="center">
		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>
	</form>
</section>



 	<?php include('footer.php'); ?>

 </html>