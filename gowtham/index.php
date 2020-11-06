<?php
 include('db_conn.php'); 
$sql = 'SELECT title,ingredients,id FROM pizzas';

$result = mysqli_query($conn,$sql);

$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

// print_r($pizzas);

mysqli_free_result($result);

mysqli_close($conn);

 ?>
 <!DOCTYPE html>
 <html>
  <?php include('header.php'); ?>
  <h4 class="center grey-text">Pizzas</h4>
  <div class="container">
  	<div class="row">
  		<?php foreach($pizzas as $pizza){ ?>
  		<div class="col s6 md3">
  			<div class="card z-depth-0" >
  				<div class="card-content center">
  					<h4><?php echo $pizza['title']; ?></h4>
  					<ul>
  						<?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
  						<li><?php echo $ing; ?></li>
  					<?php } ?>
  					</ul>
  				</div>
  				<div class="card-action right-align">
  					<a class="brand-text" href="details.php?id=<?php echo $pizza['id']; ?>">More Info</a>
  				</div>
  			</div>
  		</div>
  	<?php } ?>
  	</div>
  </div>
  <?php include('footer.php'); ?>
 </html>