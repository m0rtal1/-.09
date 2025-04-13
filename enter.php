<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <title>ДетГрад: вход в личный кабинет</title>
</head>

<body>
    <?php
        require('inc/header.inc');
    ?>
    <main class="main">
        <section class="main__enter-container">
            <h2 class="h2 h2--center">Вход</h2>
            <div class="main__enter">
                <form method="post" action="vendor/enter.php">
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-email">Почта</label>
                        <input class="float-label__input" type="email" id="float-label-email" value="" placeholder="example@mail.com" name="email">
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-password">Пароль</label>
                        <input class="float-label__input" type="password" id="float-label-password" value="" placeholder="" name="password">
                    </div>
                    <button  class="main__enter-button button" type="submit">Войти</button>
                </form>
                <p>Нет аккаунта? <a href="registration.php">Зарегистрироваться</a></p>
            </div>
        </section>
    </main>
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>