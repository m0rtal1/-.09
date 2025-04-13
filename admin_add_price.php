<!DOCTYPE html>
<html lang="ru">

<head>
    <?php

    require('inc/head.inc');
    if (!isset($_SESSION['user'])) {
        header('location:index.php');
        exit();
    }
    if ($_SESSION['user']['id_role'] !== 2) {
        header('location:index.php');
        exit();
    }
    ?>
    <title>ДетГрад: добавить/редактировать услуги в прайс-листе</title>

</head>

<body>
    <?php
    require('inc/header.inc');
    //запрос категорий
    $categoriesStmt=$connect->prepare("SELECT * FROM services");
    $categoriesStmt->execute();
    $categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);
    /////////////////////////////////////////////////////////////////////
    //запрос прайс-листа
    $priceStmt=$connect->prepare("SELECT DISTINCT p.id_service, s.service_name FROM price p JOIN services s ON p.id_service = s.id_service");
    $priceStmt->execute();
    $prices = $priceStmt->fetchAll(PDO::FETCH_ASSOC)
    /////////////////////////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__profile">
            <h2 class="h2 h2--center">Добавление/редактирование услуг в прайс-листе</h2>
            <details class="main__price-list">
                <summary class="main__price-summary summary">Добавить услуги в прайс-лист</summary>
                <form method="post" action="vendor/add_price.php">
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-category">Категория</label>
                        <select class="float-label__input float-label__input-select" type="text" id="float-label-category" placeholder=""
                            name="category">
                            <option value="" disabled selected>Не выбрано</option>
                            <?php
                            foreach($categories as $category){
                                echo'<option value="'. $category['id_service'] .'">'. $category['service_name'] .'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-name">Название</label>
                        <input class="float-label__input" type="text" id="float-label-name" value="" placeholder=""
                            name="name">
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-price">Цена (руб.)</label>
                        <input class="float-label__input" type="number" id="float-label-price" value=""
                            placeholder="" name="price">
                    </div>
                    <button class="main__enter-button button" type="submit">Добавить</button>
                </form>
            </details>
            <details class="main__price-list">
                <summary class="main__price-summary summary" summary>Редактирование прайс-листа</summary>
                <?php
                foreach($prices as $price){
                    $id_service = $price['id_service'];
                    echo'
                        <details class="main__price-list--inner">
                            <summary class="main__price-summary summary">'. $price['service_name'] .'</summary>
                            <div class="main__price-description-container main__price-description-container--edit">
                                <p class="main__price-description main__price-description--head">Наименование услуги</p>
                                <p class="main__price-description main__price-description-right main__price-description--head">
                                    Цена,
                                    руб</p>
                            </div>';
                                $infoStmt=$connect->prepare("SELECT id_price, action, price FROM price WHERE id_service = $id_service");
                                $infoStmt->execute();
                                $info = $infoStmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($info as $row){
                                    echo '
                            <form action="vendor/change_price.php" method="post">
                                <input type="hidden" value="'. $row['id_price'] .'" name="id_price">
                                <div class="main__price-description-container main__price-description-container--edit">
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-action">Название</label>
                                        <textarea class="float-label__input" type="text" id="float-label-action" placeholder=""
                                            name="action">'. $row['action'] .'</textarea>
                                    </div>
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-price">Цена (руб.)</label>
                                        <input class="float-label__input" type="number" id="float-label-price" value="'. $row['price'] .'"
                                            placeholder="" name="price">
                                    </div>
                                    <div class="form-item form-item--edit">
                                        <button class="main__enter-button button" type="submit">Изменить</button>
                                        <a class="main__enter-button link-button link-button--danger" href="vendor/delete_price.php?id='. $row['id_price'] .'">Удалить</a>
                                    </div>
                                </div>
                            </form>';
                                }
                    echo'
                        </details>';
                }
                ?>
            </details>
            <details class="main__price-list">
                <summary class="main__price-summary summary">Добавить категории услуг</summary>
                <form method="post" action="vendor/add_service.php">
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-name">Название категории услуг</label>
                        <input class="float-label__input" type="text" id="float-label-name" value="" placeholder=""
                            name="service_category">
                    </div>
                    <button class="main__enter-button button" type="submit">Добавить</button>
                </form>
            </details>
            <details class="main__price-list">
                <summary class="main__price-summary summary">Редактировать категории услуг</summary>
                <div class="main__services-price-container">

                    <?php
                        foreach($categories as $category){
                            echo'<article class="main__services-price-item">
                                    <form method="post" action="vendor/change_service.php">
                                        <input type="hidden" value="'. $category['id_service'] .'" name="service_id">
                                        <div class="form-item float-label">
                                            <label class="float-label__label" for="float-label-service_name">Название</label>
                                            <input class="float-label__input" type="text" id="float-label-service_name" value="'. $category['service_name'] .'"
                                                placeholder="" name="service_name">
                                        </div>
                                        <button class="main__enter-button button" type="submit">Изменить</button>
                                    </form>
                                    <form class="main__services-price-item-del-form" method="post" action="vendor/delete_service.php">
                                        <input type="hidden" value="'. $category['id_service'] .'" name="service_id">
                                        <button class="main__enter-button button button--danger" type="submit">Удалить</button>
                                    </form>
                                </article>';
                        }
                    ?>

                </div>
            </details>
        </section>

    </main>
    <?php
    require('inc/footer.inc');
    ?>
</body>

</html>