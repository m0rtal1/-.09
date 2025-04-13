<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>ДетГрад: о клинике</title>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        require('inc/header.inc');
    ?>

    <main class="main">
        <section class="main__about">
            <div class="main__about-container">
                <h2 class="main__about-h2 h2">О Клинике</h2>
                <p>Эта страница содержит информацию о детской поликлинике ДетГрад.</p>
            </div>
        </section>
        <section class="main__about main__about--white">
            <div class="main__about-container">
                <p>ДетГрад - это детский медицинский центр, принадлижащий ООО СтомГрад, также ООО СтомГрад принадлежит медицинский центр МедГрад и стоматологическая поликлиника СтомГрад.</p>
            </div>
        </section>
        <section class="main__carousel">
            <div id="carouselIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/detgrad_main_enter.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/detgrad.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="main__map">
            <a class="dg-widget-link" href="http://2gis.ru/barnaul/firm/70000001064621760/center/83.930345,53.40976/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Барнаула</a>
            <div class="dg-widget-link">
                <a href="http://2gis.ru/barnaul/firm/70000001064621760/photos/70000001064621760/center/83.930345,53.40976/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a>
            </div>
            <div class="dg-widget-link">
                <a href="http://2gis.ru/barnaul/center/83.930345,53.40976/zoom/16/routeTab/rsType/bus/to/83.930345,53.40976╎Детград, медицинский педиатрический центр?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Детград, медицинский педиатрический центр</a>
            </div>
            <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
            <script charset="utf-8">new DGWidgetLoader({"width":"100%","height":500,"borderColor":"#a3a3a3","pos":{"lat":53.40976,"lon":83.930345,"zoom":16},"opt":{"city":"barnaul"},"org":[{"id":"70000001064621760"}]});</script>
            <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
        </section>

        <section class="main__schedule-about-us">
            <div class="main__schedule-item">
                <h2 class="main__schedule-h2 h2">Адрес</h2>
                <p>658080, Российская Федерация, Алтайский край, г. Новоалтайск, ул. ​Деповская 12</p>
            </div>
            <div class="main__schedule-item">
                <h2 class="main__schedule-h2 h2">Режим работы</h2>
                <p>Пн-Пт: 8:00 – 20:00</p>
                <p>Сб-Вс: 8:00 - 19:00</p>
            </div>
            <div class="main__schedule-item">
                <h2 class="main__schedule-h2 h2">Телефон</h2>
                <p><a class="link" href="tel:+73852551414">+7 (3852) 55-14-14</a></p>
            </div>
        </section>
    </main>
    
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>