<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <title>ДетГрад: Детская поликлиника</title>
    <script src="js/index-descriptions.js"></script>
</head>

<body>
    <?php
        require('inc/header.inc');
    ?>

    <main class="main">
        <section class="main__greetings">
            <div class="main__greetings-right-container">
                <span class="main__greetings-text"><mark>Добро пожаловать на сайт</mark></span>
            </div>
            <div class="main__greetings-left-container">
                <img src="img/logo.svg" alt="logo" class="main__greetings-logo logo">
                <span class="main__greetings-text"><mark><strong>ДетГрад</strong></mark><br>
                    <mark>Детская поликлиника</mark></span>
            </div>
        </section>
        <section class="main__about">
            <div class="main__about-container">
                <h2 class="main__about-h2 h2">Добро пожаловать на сайт детской поликлиники ДетГрад</h2>
                <p>Здесь вы можете найти информацию о поликлинике, её услугах,
                    прайс-лист, сведения о специалистах, а также записаться
                    (или записать своего ребенка) на приём. Это можно сделать по телефону или
                    через сайт после регистрации и авторизации.</p>
            </div>
        </section>
        <section class="main__services">
            <div class="main__services-grid">
                <div class="main__services-container">
                    <button type="button" class="main__services-item main__services-item--chosen">
                        Педиатрия
                    </button>
                    <button type="button" class="main__services-item">
                        Неврология
                    </button>
                    <button type="button" class="main__services-item">
                        Хирургия
                    </button>
                    <button type="button" class="main__services-item">
                        Эндокринология
                    </button>
                    <button type="button" class="main__services-item">
                        Кардиология
                    </button>
                    <button type="button" class="main__services-item">
                        Ортопедия
                    </button>
                </div>
                <div class="main__service-description-container">
                    <p class="main__service-description">Занимается диагностикой, лечением и профилактикой заболеваний у
                        детей от рождения до 18 лет. Педиатр контролирует развитие ребенка, назначает вакцинацию,
                        помогает при острых и хронических заболеваниях.</p>
                </div>
            </div>
            <p class="main__services-link"><a class="link" href="price.php">Перейти к полному перечню услуг</a></p>
        </section>

        <section class="main__schedule">
            <div class="main__schedule-container">
                <div class="main__schedule-item">
                    <h2 class="main__schedule-h2 h2">Адрес</h2>
                    <p>658080, Российская Федерация, Алтайский край, г. Новоалтайск, ул. ​Деповская 12</p>
                </div>
                <div class="main__schedule-item">
                    <h2 class="main__schedule-h2 h2">Режим работы</h2>
                    <p>Пн-Пт: 8:00 – 20:00</p>
                    <p>Сб: 8:00 - 16:00</p>
                    <p>Вс: 8:00 - 13:00</p>
                </div>
                <div class="main__schedule-item">
                    <h2 class="main__schedule-h2 h2">Телефон</h2>
                    <p><a class="link" href="tel:+73852551414">+7 (3852) 55-14-14</a></p>
                </div>
            </div>
            <div class="main__schedule-img">
            </div>
        </section>
    </main>
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>