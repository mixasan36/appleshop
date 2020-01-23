<?php session_start(); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AppleShop.RU</title>
    <!-- скрипт оформления !-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</head>
<body>
<?php include_once "./navbar.php" ?>  <!-- подключение меню, проверка на подключение ранее !-->
<div class="card-body">
<h4>О нас</h4>
    <hr>
<div class="row">
  <div class="col-md-4">
    <p class="text-justify">
    <h5>15 лет успеха</h5>
    История компании началась в 2005 году, когда розничное подразделение компании Apple IMC Russia открыло в Москве первый магазин Apple Center в «Атриуме». Сейчас у нас более 85 розничных магазинов в крупнейших городах нашей страны. В ассортименте представлена вся линейка продукции компании Apple, а также широкий выбор дополнительных устройств и аксессуаров. Всё это время мы руководствовались главным принципом — максимально удовлетворять потребности наших клиентов. Мы предлагаем удобные программы кредитования и рассрочки, услуги страхования техники, бонусные программы и другие интересные предложения. Пользователи всегда имели возможность познакомиться с любым продуктом «вживую». Наши консультанты, прошедшие обучение по программе Apple, готовы прийти на помощь и ответить на все вопросы. Желание максимально соответствовать требованиям самых взыскательных клиентов и выстраивать долгосрочные отношения с ними за счёт уровня обслуживания принесло свои плоды. За прошедшие годы нашими клиентами стали сотни тысяч людей и десятки тысяч компаний. Мы гордимся тем, что они выбрали нас
    </p>
  </div>
  <div class="col-md-6 text-center">
      <!-- вывод изображения, предварительно загруженного в папку image, полный путь указан в scr !-->
    <img class="ac-img-iphone" src="/assets/images/iphone.jpg" width="240" alt="">
  </div>
</div>
</body>
</html>