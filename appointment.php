<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <title>ДетГрад: запись на прием</title>

</head>

<body>
    <?php
        require('inc/header.inc');
        //запрос категорий
        $categoriesStmt=$connect->prepare("SELECT * FROM services");
        $categoriesStmt->execute();
        $categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);
        /////////////////////////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__enter-container">
            <h2 class="h2 h2--center">Запись на прием</h2>
            <div class="main__enter">
                <?php
                if(isset($_SESSION['user'])){
                    echo'<form method="post" action="vendor/appoint.php">
                    <div class="form-item float-label">
                    <input type="hidden" name="id_user" value="'. $_SESSION['user']['id_user'] .'">
                        <label class="float-label__label" for="float-label-name">Имя ребенка*</label>
                        <input class="float-label__input" type="text" id="float-label-name" value=""
                            placeholder="" name="name" required>
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-surname">Фамилия ребенка*</label>
                        <input class="float-label__input" type="text" id="float-label-surname" value="" placeholder=""
                            name="surname" required>
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-patronymic">Отчество ребенка</label>
                        <input class="float-label__input" type="text" id="float-label-patronymic" value=""
                            placeholder="" name="patronymic">
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-phone">Номер телефона*</label>
                        <input class="float-label__input" type="text" id="float-label-phone" value=""
                            placeholder="" name="phone" required>
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-email">Почта</label>
                        <input class="float-label__input" type="email" id="float-label-email" value="" placeholder=""
                            name="email">
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-doctor">Категория услуги*</label>
                        <select class="float-label__input float-label__input-select" id="float-label-doctor" required
                            name="doctor">
                            <option value="" disabled selected>Не выбрано</option>';
                            foreach($categories as $category){
                                echo'<option value="'. $category['id_service'] .'">'. $category['service_name'] .'</option>';
                            }
                        echo '</select>
                    </div>
                    <button class="main__enter-button button" type="submit">Записаться</button>
                </form>';
                }
                else{
                    echo'<p>Запись доступна после авторизации</p>';
                }
                ?>
            </div>
        </section>
    </main>
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>