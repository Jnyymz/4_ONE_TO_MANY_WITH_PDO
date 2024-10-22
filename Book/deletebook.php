<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
	$getBookByID = getBookByID($pdo, $_GET['bookID']); 
	if ($getBookByID): // Check if a valid book is returned
	?>
	<h1>Are you sure you want to delete this Book?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Book Title: <?php echo $getBookByID['title'] ?></h2>
		<h2>Book Genre: <?php echo $getBookByID['genre'] ?></h2>
		<h2>Book Author: <?php echo $getBookByID['book_Author'] ?></h2>
        <h2>Price: <?php echo $getBookByID['price'] ?></h2>
		<h2>Date Added: <?php echo $getBookByID['dateAdded'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?bookID=<?php echo $_GET['bookID']; ?>&authorID=<?php echo $_GET['authorID']; ?>" method="POST">
				<input type="submit" name="deleteBookBtn" value="Delete">
			</form>			
		</div>	
	</div>
	<?php else: ?>
		<h1>Book not found or query failed.</h1>
	<?php endif; ?>
</body>
</html>
