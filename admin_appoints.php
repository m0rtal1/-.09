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
    <title>ДетГрад: добавить/редактировать записи</title>

    <link rel="stylesheet" href="node_modules/air-datepicker/air-datepicker.css">
    <script src="node_modules/air-datepicker/air-datepicker.js"></script>
</head>

<body>
    <?php
    require('inc/header.inc');

    //запрос категорий
    $categoriesStmt = $connect->prepare("SELECT * FROM services");
    $categoriesStmt->execute();
    $categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);
    /////////////////////////////////////////////////////////////////////
    //запрос статусов записи
    $statusesStmt = $connect->prepare("SELECT * FROM appoint_statuses");
    $statusesStmt->execute();
    $statuses = $statusesStmt->fetchAll(PDO::FETCH_ASSOC);
    /////////////////////////////////////////////////////////////////////
    //запрос записей
    $appointStmt = $connect -> prepare("SELECT * FROM appoints ORDER BY id_appoint DESC");
    $appointStmt->execute();
    $appoints = $appointStmt->fetchAll(PDO::FETCH_ASSOC);
    /////////////////////////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__profile">
            <h2 class="h2 h2--center">Добавить/редактировать записи</h2>
            <section>
                <details class="main__profile-details">
                    <summary class="summary">Добавить запись</summary>
                    <form method="post" action="vendor/admin_appoint.php">
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-name">Имя ребенка</label>
                            <input class="float-label__input" type="text" id="float-label-name" value="" placeholder=""
                                name="name">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-surname">Фамилия ребенка</label>
                            <input class="float-label__input" type="text" id="float-label-surname" value=""
                                placeholder="" name="surname">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-patronymic">Отчество ребенка</label>
                            <input class="float-label__input" type="text" id="float-label-patronymic" value=""
                                placeholder="" name="patronymic">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-email">Почта</label>
                            <input class="float-label__input" type="email" id="float-label-email" value=""
                                placeholder="" name="email">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-phone">Номер телефона</label>
                            <input class="float-label__input" type="text" id="float-label-phone" value=""
                                placeholder="" name="phone">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-doctor">Категория услуги</label>
                            <select class="float-label__input float-label__input-select" type="text" id="float-label-category" placeholder=""
                                name="doctor">
                                <option value="" disabled selected>Не выбрано</option>
                                <?php
                                foreach ($categories as $category) {
                                    echo '<option value="' . $category['id_service'] . '">' . $category['service_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-date">Дата и время</label>
                            <input class="float-label__input" type="text" id="float-label-date" value=""
                                placeholder="" name="date" autocomplete="off">
                        </div>
                        <button class="main__enter-button button" type="submit">Записать</button>
                    </form>
                </details>
            </section>
            <section class="main__profile-history">
                <details class="main__profile-details">
                    <summary class="summary">Записи</summary>
                    <?php
                    foreach($appoints as $appoint){
                        echo'
                    <article class="main__history-item">
                        <div class="main__history-item-id">
                            <p><b>ID записи: </b>'. $appoint['id_appoint'] .'</p>
                        </div>
                        <form method="post" action="vendor/change_appoint.php">
                            <input type="hidden" value="'. $appoint['id_appoint'] .'" name="id_appoint">
                            <div class="main__history-item-container">
                                <p>
                                    <label for="float-label-child-name">Имя ребенка:</label>
                                    <input class="label__input" type="text" id="float-label-child-name" value="'. $appoint['child_fname'] .'" placeholder="" name="child-name">
                                </p>
                                <p>
                                    <label for="float-label-child-surname">Фамилия ребенка:</label>
                                    <input class="label__input" type="text" id="float-label-child-surname" value="'. $appoint['child_lname'] .'" placeholder="" name="child-surname">
                                </p>
                                <p>
                                    <label for="float-label-child-patronymic">Отчество ребенка:</label>
                                    <input class="label__input" type="text" id="float-label-child-patronymic" value="'. $appoint['child_pname'] .'" placeholder="" name="child-patronymic">
                                </p>
                                <p>
                                    <label for="float-label-email">Почта:</label>
                                    <input class="label__input" type="email" id="float-label-email" value="'. $appoint['email'] .'" placeholder="" name="email">
                                </p>
                                <p>
                                    <label for="float-label-phone">Номер телефона:</label>
                                    <input class="label__input" type="text" id="float-label-phone" value="'. $appoint['phone_number'] .'" placeholder="" name="phone">
                                </p>
                                <p>
                                    <label for="float-label-doctor">Категория услуги:</label>
                                    <select class="label__input" id="float-label-doctor" name="doctor">
                                        <option value="" disabled selected>Не выбрано</option>';
                                        foreach ($categories as $category) {
                                            if($appoint['id_service'] === $category['id_service']){
                                                echo '<option selected value="' . $category['id_service'] . '">' . $category['service_name'] . '</option>';
                                            }
                                            else{
                                                echo '<option value="' . $category['id_service'] . '">' . $category['service_name'] . '</option>';
                                            }
                                        }
                                    echo'</select>
                                </p>
                                <p>
                                    <label for="label-date-edit">Время:</label>
                                    <input class="label__input label-date-edit" type="text" value="'. date('d-m-Y H:i', strtotime($appoint['appoint_date'])) .'"
                                        placeholder="" name="date" autocomplete="off">
                                </p>
                                <p>
                                    <label for="float-label-status">Статус:</label>
                                    <select class="label__input" id="float-label-status" name="status">
                                        <option value="" disabled selected>Не выбрано</option>';
                                        foreach ($statuses as $status) {
                                            if($appoint['id_appoint_status'] === $status['id_appoint_status']){
                                                echo '<option selected value="' . $status['id_appoint_status'] . '">' . $status['status_name'] . '</option>';
                                            }
                                            else{
                                                echo '<option value="' . $status['id_appoint_status'] . '">' . $status['status_name'] . '</option>';
                                            }
                                        }
                                    echo'
                                    </select>
                                </p>
                            </div>
                            <button class="main__enter-button button" type="submit">Подтвердить изменения</button>
                        </form>
                        <form method="post" action="vendor/delete_appoint.php">
                            <input type="hidden" value="'. $appoint['id_appoint'] .'" name="id_appoint">
                            <button class="main__enter-button button button--danger" type="submit">Удалить</button>
                        </form>
                    </article>';
                    }
                    ?>
                </details>
            </section>
        </section>
    </main>
    <?php
    require('inc/footer.inc');
    ?>

    <script>
        function initDatepicker(selector) {
            document.querySelectorAll(selector).forEach((el) => {
                new AirDatepicker(el, {
                    autoClose: true,
                    timepicker: true,
                    dateFormat: 'dd-MM-yyyy',
                });
            });
        }

        // Исправляем селектор с id на класс
        initDatepicker('.label-date-edit');
        initDatepicker('#float-label-date');
    </script>

</body>

</html>