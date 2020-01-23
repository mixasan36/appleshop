<?php session_start(); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AppleShop.RU</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</head>
<?php 
include_once '../navbar.php'; // подключаем скрипт меню
?>
<div class="card-body">
        <h3>Корзина</h3>  
        <div> 
        <?php 
        // Если пользователь авторизован
        if(isset($_SESSION['authed'])){
              require_once '../api/database.php';
              $sum = 0;
              $id = $_SESSION['id'];
              // выборка данных корзины из бд для пользователя по его id
              $sql = "SELECT * FROM `cart` LEFT JOIN technika on cart.article = technika.id where userid = '$id'";
              $res = $conn->query($sql);
              // если товаров в корзине больше 0, формирует таблицу
              if ($res->num_rows > 0) {
                  ?>   <table class="table table-bordered">
                      <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Артикул</th>
                      <th scope="col">Наименование</th>
                      <th scope="col">Описание</th>
                      <th scope="col">Цена</th>
                    </tr>
                  </thead>
                  <tbody> 
                      <?php
                      //считает итоговую сумму товаров в корзине
                  while ($row = $res->fetch_assoc()) {
                    $sum += $row['price'];
                    ?>
                    <tr>
                    <!-- Удаление товара из корзины по id!-->
                      <th scope="row"><a href='/cart/remove.php?id=<?php echo "$row[cartid]" ?>'>🗑</a></th>
                      <td><?php echo $row['article'] ?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['description']?></td>
                      <td><?php echo $row['price']?> ₽</td>
                    </tr>
            <?php } ?>
                </tbody>
                </table>
            <p><b>Итого к оплате:</b> <?php echo $sum?> ₽</p>
            <a class="btn btn-success" href="/cart/success.php">Оплатить заказ</a>
            <?php } else {?>
            <h4>Корзина пуста 😪</h4>
        <?php }?>
             
        <?php }?>
       
</div>
