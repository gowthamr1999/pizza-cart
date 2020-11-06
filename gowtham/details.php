<?php 
include('db_conn.php');

if(isset($_POST['delete'])){
	$id_to_deleted = $_POST['id_to_deleted'];

	$sql = "DELETE FROM pizzas WHERE id = $id_to_deleted";
	if(mysqli_query($conn,$sql)){
		header('Location: index.php');
	}else{
		echo "error". mysqli_error($conn);
	}
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$sql = "SELECT * FROM pizzas WHERE id=$id";

$result = mysqli_query($conn,$sql);

$pizza = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);





 ?>
 <html>
<?php include('header.php'); ?>
<?php if($pizza) {?>
	<h3 class="center">Details</h3>
	<hr>
	<div class="container">
		<div class="center">
			<p>Name of the pizza is :<?php echo $pizza['title']; ?></p>
			<p>The ingridentes are </br><?php echo $pizza['ingredients'];?></p>
			<p>It was created by : <?php echo $pizza['email']; ?></p>
			<p>It was created on : <?php echo date($pizza['created_at']); ?></p>
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_deleted" value="<?php echo $pizza['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand-text">
			</form>
		</div>
	</div>
<?php } ?>
<?php include('footer.php'); ?>

 </html>