<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-type"
        content="text/html; charset=utf-8" >
<title>Index</title>
</head>

<body>


<?php
// MySQL credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hayk";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "<br><br>";

//echo total client count
$sql = "SELECT user_id
        FROM `clients`
        WHERE 1 ";
$result = mysqli_query($conn, $sql);
echo "Записей в базе данных: ". mysqli_num_rows($result)."<br>";

//echo referred client count
$sql = "SELECT `referral_id`
        FROM `clients`
        WHERE `referral_id` != '0' ";
$result = mysqli_query($conn, $sql);
echo "Всего рефералов: ". mysqli_num_rows($result)."<br><br><br><br>";


//add client record handler
if(isset($_POST['last_name']))
  {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email =  htmlspecialchars($_POST['email']);
    $telephone =  htmlspecialchars($_POST['telephone']);
    $client_paid =  htmlspecialchars($_POST['client_paid']);
    $referral_id =  htmlspecialchars($_POST['referral_id']);
    $comments =  htmlspecialchars($_POST['comments']);


    $sql = "INSERT INTO clients (first_name, last_name, email, telephone, client_paid, referral_id, comments, last_update, reg_date)
            VALUES ('$first_name', '$last_name', '$email', '$telephone', '$client_paid', '$referral_id', '$comments', NOW(), NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //update referred_clients counter if referrer specified
    while (strlen($referral_id) > 0)
      {
        $sql = "UPDATE clients
                SET referred_clients = referred_clients + 1
                WHERE user_id = '$referral_id'";

        if (mysqli_query($conn, $sql)) {
                   echo "<br>Referred_clients field updated successfully. referral_id = ".$referral_id;
                } else {
                   echo "Error updating record: " . mysqli_error($conn);
                }


        $sql = "SELECT user_id, referral_id
                FROM clients
                WHERE user_id='$referral_id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
              {
                    $referral_id = $row["referral_id"];
              }

      if ('0' == $referral_id)      //testing Yoda conditions
          {
            $referral_id = ""; echo "<br>Referrals chain end reached.";
          }
      }
  }

mysqli_close($conn);
 ?>


<br>


<footer>
<br>


        <form action="add.php">
            <input type="submit" value="Add client record"/>
        </form>
        <br>
        <form action="search.php">
            <input type="submit" value="Search client record"/>
        </form>
        <br>
        <form action="show.php" method="post">
            <input type="submit" name=show_recent value="Recent client records"/>
        </form>

<br>
<br>
<script>
document.write(Date(),);
</script>
<!-- testing js link-->
<br>
<a href="test.html" class="button">JS Test</a>

</footer>


</body>
</html>
