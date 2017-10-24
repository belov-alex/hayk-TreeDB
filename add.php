<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-type"
        content="text/html; charset=utf-8" >
        <link rel="stylesheet" href="style.css">
<title>Add client record</title>
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

  $sql = "SELECT user_id, last_name, first_name, reg_date
          FROM `clients`
          ORDER by user_id
          desc";
  $result = mysqli_query($conn, $sql);

   ?>

<!-- Add client form -->
  <form action="index.php" method="post">

    <div class="main">
      <div class="field">
       <label for="fn">Имя</label>
       <input type="text" name="first_name" id="fn">
      </div>

      <div class="field">
       <label for="ln">Фамилия</label>
       <input type="text" name="last_name" placeholder="обязательное поле" autofocus required id="ln">
      </div>

      <div class="field">
        <label for="tel">Телефон</label>
        <input type="text" name="telephone" id="tel">
      </div>

      <div class="field">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">
      </div>

      <div class="field">
        <label for="amount">Сумма платежа</label>
        <input type="text" name="client_paid" id="amount">
      </div>

      <div class="field">
        <label for="ref">Referral</label>
        <select name=referral_id>
          <?php
          //drop-down referrals menu fetched from DB
            echo "<option value=\"\">без никто</option>";
          while($row = mysqli_fetch_assoc($result)) {
            echo "<option value=\"".$row["user_id"]."\">".$row["user_id"]." - ".$row["last_name"]. ", ". $row["first_name"]." -- ". mb_substr($row["reg_date"], 0, 10)."</option>";
          }
           ?>
        </select>

      </div>

      <div class="field">
        <label for="comms">Комментарии</label>
        <textarea name="comments" rows="5" cols="30" id ="comms"></textarea>
      </div>

      <div class="field">
        <label for="su"></label>
        <input type="submit" value="Сохранить" id="su">
      </div>

<a href="index.php" class="button">Home</a>
<br><br>
<a href="search.php" class="button">Search</a>

  </div>

  </form>

</body>
