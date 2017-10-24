<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-type"
        content="text/html; charset=utf-8" >
        <link rel="stylesheet" href="style.css">
<title>Search client record</title>
</head>
<body>

  <form action="show.php" method="post">

    <div class="main">

      <div class="field">
       <label for="UID">User ID</label>
       <input type="text" name="user_id" id="UID">
      </div>

      <div class="field">
       <label for="fn">Имя</label>
       <input type="text" name="first_name" id="fn">
      </div>

      <div class="field">
       <label for="ln">Фамилия</label>
       <input type="text" name="last_name" id="ln">
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
        <label for="ref_by">Кто его рекомендовал</label>
        <input type="text" name="referred_by" id="ref_by">
      </div>

      <div class="field">
        <label for="reg_date_min">Зарегистрирован между</label>
        <input type="date" name="reg_date_min" id="reg_date_min">
      </div>

      <div class="field">
        <label for="reg_date_max">и</label>
        <input type="date" name="reg_date_max" id="reg_date_max">
      </div>

      <div class="field">
        <label for="su"></label>
        <input type="submit" value="Поиск" name="submit" id="su">
      </div>

      <a href="index.php" class="button">Home</a>
      <br><br>
      <a href="add.php" class="button">Add client record</a>

  </div>
  </form>

</body>
