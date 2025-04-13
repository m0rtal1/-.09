<header class="header">
    <div class="header__inner">
        <div class="header__logo-container">
            <a href="index.php"><img src="img/logo.svg" alt="logo" class="header__logo logo"></a>
        </div>

        <button type="button" class="header__menu-button">
        </button>
    </div>
    <nav class="header__nav nav">
        <div class="header__nav-container">
            <ul class="header__nav-list">
                <li class="header__nav-link"><a href="index.php">Главная</a></li>
                <li class="header__nav-link"><a href="specialists.php">Специалисты</a></li>
                <li class="header__nav-link"><a href="about_us.php">О клинике</a></li>
                <li class="header__nav-link"><a href="price.php">Прайс-лист</a></li>
                <li class="header__nav-link"><a href="appointment.php">Записаться на прием</a></li>
                <?php
                if(isset($_SESSION['user'])){
                    echo '<li class="header__nav-link"><a href="profile.php">Профиль</a></li>';
                    if($_SESSION['user']['id_role'] === 2){
                        echo '<li class="header__nav-link"><a href="admin.php">Функции администратора</a></li>';
                    }
                }
                else{
                    echo '<li class="header__nav-link"><a href="enter.php">Войти</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <nav class="menu">
        <div class="menu__nav-container">
            <ul class="menu__nav-list">
                <li class="menu__nav-link"><a href="index.php">Главная</a></li>
                <li class="menu__nav-link"><a href="specialists.php">Специалисты</a></li>
                <li class="menu__nav-link"><a href="about_us.php">О клинике</a></li>
                <li class="menu__nav-link"><a href="price.php">Прайс-лист</a></li>
                <li class="menu__nav-link"><a href="appointment.php">Записаться на прием</a></li>
                <?php
                if(isset($_SESSION['user'])){
                    echo '<li class="menu__nav-link"><a href="profile.php">Профиль</a></li>';
                    if($_SESSION['user']['id_role'] === 2){
                        echo '<li class="menu__nav-link"><a href="admin.php">Функции администратора</a></li>';
                    }
                }
                else{
                    echo'<li class="menu__nav-link"><a href="enter.php">Войти</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="menu__shadow">
        </div>
    </nav>
</header>