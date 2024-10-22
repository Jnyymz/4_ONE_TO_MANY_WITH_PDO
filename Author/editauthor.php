<?php require_once 'core/handleForms.php'; ?>
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
	<?php $getAuthorByID = getAuthorByID($pdo, $_GET['authorID']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?authorID=<?php echo $_GET['authorID']; ?>" method="POST">
		<p>
			<label for="firstame">First Name: </label> 
			<input type="text" name="firstname" value="<?php echo $getAuthorByID['firstname']; ?>">
		</p>
		<p>
			<label for="lastname">Last Name: </label> 
			<input type="text" name="lastname" value="<?php echo $getAuthorByID['lastname']; ?>">
		</p>
		<p>
			<label for="nationality">Nationality: </label> 
			<input type="text" name="nationality" value="<?php echo $getAuthorByID['nationality']; ?>">
		</p>
        <p>
			<label for="contactInfo">Contact Info: </label> 
			<input type="text" name="contactInfo" value="<?php echo $getAuthorByID['contactInfo']; ?>">
		</p>
		<p>
			<label for="dateAdded">Date Added: </label> 
			<input type="date" name="dateAdded" value="<?php echo $getAuthorByID['dateAdded']; ?>">
			<input type="submit" name="editAuthorBtn">
		</p>
	</form>
</body>
</html>
