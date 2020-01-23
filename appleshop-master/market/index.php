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
include_once '../navbar.php';
?>
<div class="card-body">
        <div class="d-flex justify-content-center">
        <!-- Форма поиска GET /market/index.php !-->
            <form class="searchForm" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Iphone 11" name="name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="sumbit">Найти</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row d-flex justify-content-center">
        <?php 
              require_once '../Api/database.php';
              $query = '';
              if(isset($_GET['name'])){
                $query = $_GET['name'];
              }
              $conn->set_charset("utf8");
              // sql запрос на поиск в базе данных
              $sql = "SELECT * FROM `technika` where name like '%$query%'";
              $res = $conn->query($sql);
              //Если товаров > 0
              if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {
        ?>
            <!-- Выводим все товары карточками !-->
            <div class="col-md-6 col-lg-3 mx-2 my-2 hoverable card overlay zoom" style="min-width: 350px;">
                <div class="card-body">
                    <img class="card-img-top cardImage" src="<?php echo $row['imgurl']?>" alt="Card image cap">
                    <div class="card-body" >
                        <div class="row"><h4 class="card-title"><?php echo $row['name']?> &nbsp;</h4></div>
                        <p class="card-text" class="text-muted"><?php echo $row['description']?></p>
                  <?php if(isset($_SESSION['authed'])) {?><a class="btn btn-success" href="/cart/addToCart.php?id=<?php echo $row['id']?>"><?php echo $row['price']?> ₽ | Купить</a> <?php } else{ ?>
                    <a class="btn btn-warning" href="/login">Авторизоваться</a> 
                  <?php }?>
                    </div>
                </div>
            </div>
            <?php }
        } else {?>
            <h4>Нам очень жаль, но мы ничего не нашли по вашему запросу 😪</h3>
        <?php }?>
</div>
