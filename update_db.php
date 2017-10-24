<?php

  $user_id = htmlspecialchars($_POST['user_id']);
  // MySQL credentials
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hayk";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
     die("&#9888; Connection failed: " . mysqli_connect_error());
  }
  echo "&#9775; Connected successfully " . "<br><br>";
  // DB request for current user_id
// $sql = "SELECT * FROM clients where user_id = '$user_id'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

//  Update DB row for current user_id
if(isset($_POST['submit'])) {
  $user_id = htmlspecialchars($_POST['user_id']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);
  $telephone =  htmlspecialchars($_POST['telephone']);
  $email =  htmlspecialchars($_POST['email']);
  $client_paid =  htmlspecialchars($_POST['client_paid']);
  $bonus_points =  htmlspecialchars($_POST['bonus_points']);
  $comments =  htmlspecialchars($_POST['comments']);

  $sql = "UPDATE clients
          SET first_name ='$first_name', last_name='$last_name', telephone='$telephone', email='$email', client_paid='$client_paid', bonus_points='$bonus_points', comments='$comments', last_update=NOW()
          WHERE user_id='$user_id'";

  if (mysqli_query($conn, $sql)) {
     echo "Record updated successfully<br><br>";
  } else {
     echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($conn);

}


 ?>

<br>
<form action="search.php" method="post" >
	<input type="hidden" value="search" name="search">
	<input type="submit" value="Search">
</form>
<form action="index.php" method="post" >
	<input type="hidden" value="all" name="all">
	<input type="submit" value="Home">
</form>

 </form>
