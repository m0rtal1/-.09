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
    <title>ДетГрад: добавить/редактировать специалистов</title>
</head>

<body>
    <?php
    require('inc/header.inc');
    //Запрос специализаций
    $specialityStmt = $connect->prepare("SELECT * FROM speciality");
    $specialityStmt->execute();
    $specialities = $specialityStmt->fetchAll(PDO::FETCH_ASSOC);
    ////////////////////////////////////////////////
    //Запрос специалистов
    $specialistsStmt = $connect->prepare("SELECT d.*, s.speciality_name FROM doctors d JOIN speciality s ON d.id_speciality = s.id_speciality");
    $specialistsStmt->execute();
    $specialists = $specialistsStmt->fetchAll(PDO::FETCH_ASSOC);
    ////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__profile">
            <h2 class="h2 h2--center">Добавление/редактирование специалистов</h2>
            <section>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo'<p class="msg">'. $_SESSION['msg'] .'</p>';
                        unset($_SESSION['msg']);
                    }
                ?>
                <details class="main__profile-details">
                    <summary class="summary">Добавить специалиста</summary>
                    <form method="post" action="vendor/add_specialist.php" enctype="multipart/form-data">
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-name">Имя*</label>
                            <input class="float-label__input" type="text" id="float-label-name" value="" placeholder=""
                                name="name" required>
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-surname">Фамилия*</label>
                            <input class="float-label__input" type="text" id="float-label-surname" value="" 
                                placeholder="" name="surname" required>
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-patronymic">Отчество</label>
                            <input class="float-label__input" type="text" id="float-label-patronymic" value=""
                                placeholder="" name="patronymic">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-speciality">Специализация*</label>
                            <select class="float-label__input float-label__input-select" name="speciality" id="float-label-speciality" required>
                                <option value="" disabled selected>Не выбрано</option>
                                <?php
                                foreach ($specialities as $speciality) {
                                    echo '
                                    <option value="'. $speciality['id_speciality'] .'">'. $speciality['speciality_name'] .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-image">Фото</label>
                            <input class="float-label__input" type="file" id="float-label-image" value=""
                                placeholder="" name="image" accept="image/*">
                        </div>
                        <button class="main__enter-button button" type="submit">Добавить</button>
                    </form>
                </details>
            </section>
            <details class="main__profile-details">
                <summary class="summary">Редактировать специалистов</summary>
                <div class="main__specialists-container">
                    <?php
                    foreach($specialists as $specialist){
                        echo'
                        <article class="main__specialists-article">
                            <div>
                                <img class="main__specialists-article-img" src="'. $specialist['photo'] .'"
                                    alt="Фото специалиста">
                            </div>
                            <div class="main__specialists-article-description">
                                <form method="post" action="vendor/change_specialist.php" enctype="multipart/form-data">
                                    <input type="hidden" value="'. $specialist['id_doctor'] .'" name="id_doctor">
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-name">Имя</label>
                                        <input class="float-label__input" type="text" id="float-label-name" value="'. $specialist['fname'] .'"
                                            placeholder="" name="name">
                                    </div>
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-surname">Фамилия</label>
                                        <input class="float-label__input" type="text" id="float-label-surname" value="'. $specialist['lname'] .'"
                                            placeholder="" name="surname">
                                    </div>
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-patronymic">Отчество</label>
                                        <input class="float-label__input" type="text" id="float-label-patronymic" value="'. $specialist['sname'] .'"
                                            placeholder="" name="patronymic">
                                    </div>
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-speciality">Должность</label>
                                        <select class="float-label__input float-label__input-select" name="speciality" id="float-label-speciality">';
                                            foreach ($specialities as $speciality) {
                                                if($specialist['id_speciality'] === $speciality['id_speciality']){
                                                    echo'
                                                    <option selected value="'. $speciality['id_speciality'] .'">'. $speciality['speciality_name'] .'</option>';
                                                }
                                                else{
                                                    echo'
                                                    <option value="'. $speciality['id_speciality'] .'">'. $speciality['speciality_name'] .'</option>';
                                                }
                                            }
                                        echo'
                                        </select>
                                    </div>
                                    <div class="form-item float-label">
                                        <label class="float-label__label" for="float-label-photo">Фото</label>
                                        <input class="float-label__input" type="file" id="float-label-photo" name="photo" accept="image/*">
                                    </div>
                                    <button class="main__enter-button button" type="submit">Изменить</button>
                                </form>
                                <form method="post" action="vendor/delete_specialist.php">
                                    <input type="hidden" value="'. $specialist['id_doctor'] .'" name="id_doctor">
                                    <button class="main__enter-button button button--danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </article>';
                    }
                    ?>
                </div>
            </details>
            <details class="main__profile-details">
                <summary class="summary">Добавить специализацию</summary>
                <form method="post" action="vendor/add_specialisation.php">
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-name">Название специализация</label>
                        <input class="float-label__input" type="text" id="float-label-name" value="" placeholder=""
                            name="name">
                    </div>
                    <div class="form-item float-label">
                        <label class="float-label__label" for="float-label-description">Описание</label>
                        <input class="float-label__input" type="text" id="float-label-description" value="" placeholder=""
                            name="description">
                    </div>
                    <button class="main__enter-button button" type="submit">Добавить</button>
                </form>
            </details>
            <details class="main__profile-details">
                <summary class="summary">Редактировать специализацию</summary>
                <div class="main__services-price-container">
                    <?php
                    foreach ($specialities as $speciality) {
                        echo '
                    <article class="main__services-price-item">
                        <form method="post" action="vendor/change_speciality.php">
                            <input type="hidden" value="' . $speciality['id_speciality'] . '" name="id_speciality">
                            <div class="form-item float-label">
                                <label class="float-label__label" for="float-label-name">Название</label>
                                <input class="float-label__input" type="text" id="float-label-name" value="' . $speciality['speciality_name'] . '"
                                    placeholder="" name="name">
                            </div>
                            <div class="form-item float-label">
                                <label class="float-label__label" for="float-label-description">Описание</label>
                                <textarea class="float-label__input" type="text" id="float-label-description" placeholder=""
                                    name="description">' . $speciality['speciality_description'] . '</textarea>
                            </div>
                            <button class="main__enter-button button" type="submit">Изменить</button>
                        </form>
                        <form class="main__services-price-item-del-form" method="post" action="vendor/detete_speciality.php">
                            <input type="hidden" value="' . $speciality['id_speciality'] . '" name="id_speciality">
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