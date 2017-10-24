<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-type"
        content="text/html; charset=utf-8" >
        <link rel="stylesheet" href="style.css">
<title>Edit client record</title>
</head>
<body>

<?php

  $user_id = htmlspecialchars($_GET['user_id']);
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
$sql = "SELECT * FROM clients where user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

 ?>


 <form method="post" action="update_db.php">

    <div class="main">

      <div class="field">
       <label for="UID">User ID</label>
       <input type="text" name="user_id_disabled" value=<?php echo $user_id; ?> id="UID" disabled>
      <input type="hidden" name="user_id" value=<?php echo $user_id; ?>>
      </div>

      <div class="field">
        <label for="ref">Referral ID</label>
        <input type="text" name="referral_id" value=<?php echo $row["referral_id"] ?> id="ref" disabled>
      </div>

      <div class="field">
       <label for="reg_date">Registered at</label>
       <input type="text" name="reg_date" value=<?php echo $row["reg_date"] ?> id="reg_date" disabled>
      </div>

      <div class="field">
       <label for="last_update">Last update at</label>
       <input type="text" name="last_update" value=<?php echo $row["last_update"] ?> id="last_update" disabled>
      </div>


      <div class="field">
       <label for="fn">Имя</label>
       <input type="text" name="first_name" id="fn" value=<?php echo $row["first_name"] ?>>
      </div>

      <div class="field">
       <label for="ln">Фамилия</label>
       <input type="text" name="last_name" id="ln" value=<?php echo $row["last_name"] ?> autofocus required>
      </div>

      <div class="field">

       <?php
       $referral_id=$row["referral_id"];
       $sql = "SELECT user_id, first_name, last_name
              FROM `clients`
              WHERE user_id = '$referral_id'";
       $referrer_query = mysqli_query($conn, $sql);
       $row_referrer_query = mysqli_fetch_assoc($referrer_query);
       $referrer_full_name = $row_referrer_query["first_name"] ." ". $row_referrer_query["last_name"];
       ?>

       <label for="Referrer">Referrer: </label> <?php echo "<a href=\""."edit.php?user_id=".$row_referrer_query["user_id"]."\">".$referrer_full_name."</a>";?>

      </div>

      <div class="field">

       <?php
       $user_id_ref=$row["user_id"];
       $sql = "SELECT user_id, first_name, last_name
              FROM `clients`
              WHERE referral_id = '$user_id_ref'";
       $referral_query = mysqli_query($conn, $sql);
       ?>

       <label for="Referrals">Referrals: </label>
       <?php
// var_dump ($referral_query);
echo "<br>";
while($row_referral_query = mysqli_fetch_assoc($referral_query)) {
         echo "<a href=\""."edit.php?user_id=".$row_referral_query["user_id"]."\">".$row_referral_query["first_name"]." ".$row_referral_query["last_name"]."</a><br>";
}


       ?>

      </div>

      <div class="field">
        <label for="tel">Телефон</label>
        <input type="text" name="telephone" id="tel" value=<?php echo $row["telephone"] ?>>
      </div>

      <div class="field">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value=<?php echo $row["email"] ?>>
      </div>

      <div class="field">
        <label for="amount">Сумма платежа</label>
        <input type="text" name="client_paid" id="amount" value=<?php echo $row["client_paid"] ?>>
      </div>

      <div class="field">
        <label for="bonus">Bonus points</label>
        <input type="text" name="bonus_points" id="bonus" value=<?php echo $row["bonus_points"] ?>>
      </div>

      <div class="field">
        <label for="comms">Комментарии</label>
        <textarea name="comments" rows="5" cols="30" id ="comms"><?php echo $row["comments"] ?></textarea>
      </div>

      <div class="field">
        <label for="su"></label>
        <input type="submit" name="submit" value="Сохранить" id="su">
      </div>

      <a href="index.php" class="button">Home</a>
      <br><br>
      <a href="search.php" class="button">Search</a>

  </div>

  </form>

</body>
