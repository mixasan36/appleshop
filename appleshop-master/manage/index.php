<?php session_start(); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AppleShop.RU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<?php 
include_once '../navbar.php';
// Проверка роли пользователя
$admin = $_SESSION['role'];
if($admin != 'admin'){
  ?>
    <script>
        window.location.href = "/login"
    </script>
<?php
}
?>
<div class="card-body">
  <h4>Панель администратора</h4>
  <div id="exTab1">	
    <div class="card">
        <div class="tab-content clearfix card-body">
        <!-- Форма создания товара POST запросом (name, description, url, price) !-->
        <form method="POST" action='/manage/addproduct.php'>
          <div class="form-group">
            <label for="exampleFormControlInput1">Наименование товара</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Iphone XS" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Новый айфон"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на изображение товара</label>
            <input type="text" name="url" class="form-control" id="exampleFormControlInput1" placeholder="http://image.com/i11.png" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Стоимость</label>
            <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="49999" required>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Добавить товар" />
          </div>
        </form>
        <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Артикул</th>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              require_once '../Api/database.php';
              // Выборка товаров из БД
              $sql = 'SELECT * FROM `technika`';
              $res = $conn->query($sql);
              if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['description']?></td>
                      <td><a class="btn btn-danger" href="/manage/remove.php?id=<?php echo $row['id']?>">Удалить</a></td>
                    </tr>
                  <?php }}?>
            </tbody>
        </table>
          </div>
      </div>
  </div>

</div>
