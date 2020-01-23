<style>

</style>  <!-- Оформление навигацонного меню !-->
<nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4"  id="navigationBar">
  <a class="navbar-brand" href="#">AppleShop.RU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
      class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <!-- Переход на главную страницу по адресу localhost!-->
        <a class="nav-link" href="/">О компании</a>
      </li>
      <li class="nav-item">
      <!-- Переход в раздел товаров !-->
        <a class="nav-link" href="/market">Техника 🍏</a>
      </li>
      <!-- Проверка авторизации пользователя !-->
      <?php if(isset($_SESSION['authed'])){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Аккаунт</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <!-- Админка !-->
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){ ?><a class="dropdown-item" href="/manage">Управление</a> <?php } ?>
          <!--Переход в корзину !-->
            <a class="dropdown-item" href="/cart">Корзина</a>
            <!-- Логаут пользователя !-->
            <a class="dropdown-item" href="/logout.php">Выход</a>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
  <?php if(!isset($_SESSION['authed'])) {?>
  <ul class="nav navbar-nav navbar-right">
        <li>
            <div class="btn-nav"><a class="nav-link" href="/login">Регистрация/Авторизация</a></div>
        </li>
  </ul>
  <?php }?>
</nav>