<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-type"
        content="text/html; charset=utf-8" >
        <link rel="stylesheet" href="style.css">
<title>Show client records</title>
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
   die("&#9888; Connection failed: " . mysqli_connect_error());
}
echo "&#9775; Connected successfully " . "<br><br>";

// $POST parameters handlers BEGIN
if (isset($_POST['user_id']))
      {
      $user_id = htmlspecialchars($_POST['user_id']);
      if (strlen($user_id) > 0)
          {
          $selected_users = array_map('intval', explode(',', $user_id));
          }
      }
if (isset($_POST['first_name']))     {  $first_name = htmlspecialchars($_POST['first_name']); }
if (isset($_POST['last_name']))     {  $last_name = htmlspecialchars($_POST['last_name']);   }
if (isset($_POST['telephone']))     { $telephone =  htmlspecialchars($_POST['telephone']); }
if (isset($_POST['email']))     { $email =  htmlspecialchars($_POST['email']); }                       // string(0) "" if is not set
if (isset($_POST['referred_by']))     { $referred_by =  htmlspecialchars($_POST['referred_by']); }
// if (isset($_POST['referred_to']))     { $referred_by =  htmlspecialchars($_POST['referred_to']); }
if ((isset($_POST['reg_date_min'])) || (isset($_POST['reg_date_max'])))                               // string(10) example "2017-10-03" if isset
      {
      $reg_date_min =  htmlspecialchars($_POST['reg_date_min']);
      $reg_date_max =  htmlspecialchars($_POST['reg_date_max']);
      if ((strlen($reg_date_min) > 0) && (strlen($reg_date_max) == 0))                                // handling partial date search
          {
          $reg_date_max=date("Y-m-d");
          }

      if ((strlen($reg_date_max) > 0) && (strlen($reg_date_min) == 0))
          {
          $reg_date_min="2017-10-01";                                                                // hardcoded DB min date
          }
      }
      // echo "====var_dump section====<br>";
      // echo "user_id=";       var_dump($user_id); echo "<br>";
      // echo "not empty selected_users_Str="; var_dump(!empty($selected_users_Str));
      // echo "first_name=";   var_dump($first_name); echo "<br>";
      // echo "last_name=";    var_dump($last_name); echo "<br>";
      // echo "telephone=";    var_dump($telephone); echo "<br>";
      // echo "email=";        var_dump($email); echo "<br>";
      // echo "referred_by=";  var_dump($referred_by); echo "<br>";
      // // echo "referred_to=";  var_dump($referred_to); echo "<br>";
      // echo "reg_date_min="; var_dump($reg_date_min); echo "<br>";
      // echo "reg_date_max="; var_dump($reg_date_max); echo "<br>";
      // echo "====var_dump section====<br>";


// $POST parameters handlers END



if (isset($_POST['show_recent']) || ((strlen($user_id) == 0) && (strlen($first_name) == 0)&& (strlen($last_name) == 0)&& (strlen($telephone) == 0)&& (strlen($email) == 0)&& (strlen($referred_by) == 0)&& (strlen($reg_date_min) == 0)&& (strlen($reg_date_max) == 0)))
    {
          $sql = "SELECT user_id, referral_id, first_name, last_name, telephone, email, reg_date
                  FROM clients
                  order by last_update
                  desc limit 10";
    }
  elseif (!empty($selected_users))
        {
          // If user array id not empty, search DB by IDs
          $selected_users_Str = implode(',', $selected_users); // returns 1,2,3,4,5
          $sql = "SELECT user_id, referral_id, first_name, last_name, telephone, email, reg_date
                  FROM clients
                  where user_id in ({$selected_users_Str})";
        }
  else
    {
    //If user id array is empty, search DB by other fields
    $sql = "SELECT user_id, referral_id, first_name, last_name, telephone, email, reg_date
            FROM clients
            where (first_name = '$first_name' or '$first_name' ='')
            and (last_name = '$last_name' or '$last_name' ='')
            and (telephone = '$telephone' or '$telephone' ='')
            and (email = '$email' or '$email' ='')
            and (referral_id = '$referred_by' or '$referred_by' ='')
            and ((reg_date BETWEEN '$reg_date_min' and '$reg_date_max') or '$reg_date_min' ='')";
    }

//special case emty search query
if ((isset($_POST['submit'])) && ((strlen($user_id) == 0) && (strlen($first_name) == 0)&& (strlen($last_name) == 0)&& (strlen($telephone) == 0)&& (strlen($email) == 0)&& (strlen($referred_by) == 0)&& (strlen($reg_date_min) == 0)&& (strlen($reg_date_max) == 0)))
        {
        echo "Критерии поиска не заданы ¯\(°_o)/¯ <br> Recent client records:<br>";
        }


//Main DB query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

//Draw table header
echo  "<table>
<tr>
<th>UID</th>
<th>RID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Telephone</th>
<th>Email</th>
<th>Reg Date</th>
</tr>";

// output data of each row
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" .
    $row["user_id"] .
    "</td><td>" .
    $row["referral_id"] .
    "</td><td>" .
    $row["first_name"] .
    "</td><td>" .
    "<a href=\"" . "edit.php?user_id=".$row["user_id"]."\">". $row["last_name"]."</a>".
    "</td><td>" .
    $row["telephone"].
    "</td><td>" . 
    $row["email"].
    "</td><td>" .
    $row["reg_date"].
    "</td></tr>";
          }
    echo "</table>";
} else {
    echo "0 results";
}

// DB connection close
mysqli_close($conn);

?>

      <br><br>
      <a href="index.php" class="button">Home</a>
      <br><br>
      <a href="search.php" class="button">Search</a>

</body>
