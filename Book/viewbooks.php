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
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByAuthorID = getAllInfoByAuthorID($pdo, $_GET['authorID']); ?>
	<h1>Author: <?php $getAllInfoByAuthorID = getAllInfoByAuthorID($pdo, $_GET['authorID']);
    if ($getAllInfoByAuthorID) {
         echo $getAllInfoByAuthorID['book_Author'];
    } else {
        echo "No author found or query failed.";}?>
</h1>
	<h1>Add New Book</h1>
	<form action="core/handleForms.php?authorID=<?php echo $_GET['authorID']; ?>" method="POST">

		<p>
			<label for="title">Book Title: </label> 
			<input type="text" name="title">
		</p>
        <p>
			<label for="genre">Book Genre: </label> 
			<input type="text" name="genre">
		</p>
        <p>
			<label for="price">Price: </label> 
			<input type="number" name="price">
		</p>
		<p>
			<label for="dateAdded">Date: </label> 
			<input type="date" name="dateAdded">
			<input type="submit" name="insertNewBookBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Book ID</th>
	    <th>Book Title</th>
	    <th>Book Genre</th>
	    <th>Book Author</th>
        <th>Price</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getBooksByAuthor = getBooksByAuthor($pdo, $_GET['authorID']); ?>
      <?php 
	    if (empty($getBooksByAuthor)) {
    	    echo "<tr><td colspan='8'>No Books found for this Author.</td></tr>";
    	} 
		?>
	  <?php foreach ($getBooksByAuthor as $row) { ?>
	  <tr>
	  	<td><?php echo $row['bookID']; ?></td>	  	
	  	<td><?php echo $row['title']; ?></td>	  	
	  	<td><?php echo $row['genre']; ?></td>	  	
	  	<td><?php echo $row['Author']; ?></td>
        <td><?php echo $row['price']; ?></td>	  	
	  	<td><?php echo $row['dateAdded']; ?></td>
	  	<td>
	  		<a href="editbook.php?bookID=<?php echo $row['bookID']; ?>&authorID=<?php echo $_GET['authorID']; ?>">Edit</a>

	  		<a href="deletebook.php?bookID=<?php echo $row['bookID']; ?>&authorID=<?php echo $_GET['authorID']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>