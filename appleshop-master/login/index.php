<?php session_start(); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AppleShop.RU</title>  <!-- Здесь прописывается название сайта-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <style>
        .authBtn {
            color: black;
            background-color: transparent;
            border: 1px solid black;
        }
        .authBtn:hover {
            color: white;
            background-color: black;
            border: 1px solid black;
        }
    </style>
</head>
<?php 
include_once '../navbar.php';
include_once '../api/database.php';
//Проверка, передаются ли параметры email и пароль
if(isset($_REQUEST["email"]) && isset($_REQUEST["password"])){
    $email = $_REQUEST["email"];
    //хешируем пароль
    $password = md5($_REQUEST["password"]);
    //Ищем совпадения пароля и логина в бд
    $sql = "SELECT * FROM `polzovateli` WHERE email = '$email' and password = '$password'";
    //Если строчек больше чем 0, записываем в сессию
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        if ($row = $res->fetch_assoc()) {
            //Записываем в сессию емейл, роль пользователя (админ, пользователь), его id и присваеваем переменной authed значение true
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['authed'] = true;
            //Если логин успешный то редиректим пользователя на главную
           ?>

    <?php
        }
    }
    else{
        //Если пользователь не найден, то перезагружаем страницу и передаем ей параметр error
?>
        <script>
            window.location.href = "/login/index.php?error=Неправильно введен логин/пароль."
        </script>
<?php
        //header("Location: http://127.0.0.1:3000/login/index.php?error=Неправильно введен логин/пароль.");
    }
}
//Проверка, авторизован ли пользователь, если авторизован то перекидываем на главную
if(isset($_SESSION['authed'])){
    ?>
    <script>
        window.location.href = "/"
    </script>
<?php
}
?>
<center>
        <div class="container login-container" id="loginForm">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Создание нового аккаунта</h3>
                    <!-- Форма создания аккаунта методом POST передаем в formdata email,password,phone,name!-->
                    <form method="POST" style="margin-top:20%" action="/login/register.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Почта" value="" name="email" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Пароль" name="password" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Номер телефона" value="" name="phone" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Имя" value="" name="name" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Регистрация" />
                        </div>
                    </form>    
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Войти в существующий аккаунт</h3>
                    <!-- POST запрос на авторизацию на текущей странице, передаем параметры email и password !-->
                    <form method="POST" style="margin-top:20%" action="/login/index.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Почта" value="" name="email" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Пароль" name="password" />
                        </div>
                        <!-- Если присутсвует параметр error, то его выводится нижу !-->
                        <?php if(isset($_GET['error'])){ ?>
                            <div class="alert alert-danger" role="alert">
                             <?php  echo $_GET['error'] ?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline authBtn" value="Авторизация" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
</html>
