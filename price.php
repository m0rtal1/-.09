<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <title>ДетГрад: прайс-лист</title>
</head>

<body>
    <?php
        require('inc/header.inc');
        //Запрос специализаций
        $specialityStmt = $connect->prepare("SELECT * FROM speciality");
        $specialityStmt->execute();
        $specialities = $specialityStmt->fetchAll(PDO::FETCH_ASSOC);
        ////////////////////////////////////////////////
        //запрос прайс-листа
        $priceStmt=$connect->prepare("SELECT DISTINCT p.id_service, s.service_name FROM price p JOIN services s ON p.id_service = s.id_service");
        $priceStmt->execute();
        $prices = $priceStmt->fetchAll(PDO::FETCH_ASSOC)
        /////////////////////////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__about">
            <div class="main__about-container">
                <h2 class="main__about-h2 h2">Прайс-лист</h2>
                <p class="main__about-p--center">Эта страница содержит информацию предоставляемых о услугах и прайс-лист.</p>
                <p>Цены, размещенные на сайте, не являются публичной офертой, определяемой положениями статьи 437 Гражданского кодекса Российской Федерации. Перед получением услуги необходимо уточнять цены у ответственных сотрудников клиники: ООО Медицинский центр «СтомГрад». Тел.: <a href="tel:+73852551414">+7 (3852) 55-14-14</a></p>
            </div>
        </section>
        <section class="main__services-price">
            <details>
                <summary class="main__services-price-summary summary">Описание специализаций специалистов</summary>
                <div class="main__services-price-container">
                    <?php
                    foreach($specialities as $speciality){
                        echo'
                        <article class="main__services-price-item">
                            <h2 class="h2--center h2">'. $speciality['speciality_name'] .'</h2>
                            <p>'. $speciality['speciality_description'] .'</p>
                        </article>';
                    }
                    ?>
                </div>
            </details>
        </section>
        <section class="main__price">
            <h2 class="h2">Прайс-лист</h2>
            <?php
                foreach($prices as $price){
                    $id_service = $price['id_service'];
                    echo'
                    <details class="main__price-list">
                        <summary class="main__price-summary summary">'. $price['service_name'] .'</summary>
                        <div class="main__price-description-container">
                            <p class="main__price-description main__price-description--head">Наименование услуги</p>
                            <p class="main__price-description main__price-description-right main__price-description--head">Цена, руб</p>';
                            $infoStmt=$connect->prepare("SELECT id_price, action, price FROM price WHERE id_service = $id_service");
                                $infoStmt->execute();
                                $info = $infoStmt->fetchAll(PDO::FETCH_ASSOC);
                                $lastElement = end($info);
                                foreach($info as $row){
                                    $isLast = ($row === $lastElement);
                                    if ($isLast) {
                                        echo '
                                        <p class="main__price-description main__price-description--last-element">'. $row['action'] .'</p>
                                        <p class="main__price-description main__price-description-right main__price-description--last-element">'. $row['price'] .'</p>';
                                    }
                                    else{
                                        echo'
                                        <p class="main__price-description">'. $row['action'] .'</p>
                                        <p class="main__price-description main__price-description-right">'. $row['price'] .'</p>';
                                    }
                                }
                        echo'</div>
                    </details>';
                }
            ?>
        </section>
    </main>
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>