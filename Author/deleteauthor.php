<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this Author?</h1>
	<?php $getAuthorByID = getAuthorByID($pdo, $_GET['authorID']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
	    <h2>Author ID: <?php echo $getAuthorByID['authorID']; ?></h2>
		<h2>First Name: <?php echo $getAuthorByID['firstname']; ?></h2>
		<h2>Last Name: <?php echo $getAuthorByID['lastname']; ?></h2>
		<h2>Nationality: <?php echo $getAuthorByID['nationality']; ?></h2>
		<h2>Contact Info: <?php echo $getAuthorByID['contactInfo']; ?></h2>
		<h2>Date Added: <?php echo $getAuthorByID['dateAdded']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?authorID=<?php echo $_GET['authorID']; ?>" method="POST">
				<input type="submit" name="deleteAuthorBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
