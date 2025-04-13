<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    require('inc/head.inc');
    if (!isset($_SESSION['user'])){
        header('location:index.php');
        exit();
    }
    ?>
    <title>ДетГрад: личный кабинет</title>

</head>

<body>
    <?php
    require('inc/header.inc');
    //запрос записей
    $appointStmt = $connect -> prepare("SELECT a.*, se.service_name, st.status_name 
                                                FROM appoints a 
                                                JOIN services se ON a.id_service = se.id_service 
                                                JOIN appoint_statuses st ON a.id_appoint_status = st.id_appoint_status 
                                                WHERE id_user = :id_user ORDER BY id_appoint DESC");
    $appointStmt->bindParam(':id_user', $_SESSION['user']['id_user']);
    $appointStmt->execute();
    $appoints = $appointStmt->fetchAll(PDO::FETCH_ASSOC);
    /////////////////////////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__profile">
            <h2 class="h2 h2--center">Профиль</h2>
            <div class="main__profile-data">
                <p><b>Почта:</b> <?= $_SESSION['user']['login'] ?></p>
            </div>
            <section>
                <details class="main__profile-details">
                    <summary class="h2">Изменить данные</summary>
                    <form class="main__profile-form" method="post" action="vendor/change_account_data.php">
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-email">Изменить почту</label>
                            <input class="float-label__input" type="email" id="float-label-email" value=""
                                placeholder="example@mail.com" name="email">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-password">Изменить пароль</label>
                            <input class="float-label__input" type="password" id="float-label-password" value=""
                                placeholder="" name="password">
                        </div>
                        <div class="form-item float-label">
                            <label class="float-label__label" for="float-label-password-repeat">Повторите пароль</label>
                            <input class="float-label__input" type="password" id="float-label-password-repeat" value=""
                                placeholder="" name="password-repeat">
                        </div>
                        <button class="main__enter-button button" type="submit">Подтвердить изменения</button>
                    </form>
                </details>
            </section>
            <section class="main__profile-history">
                <details class="main__profile-details">
                    <summary class="h2">Истроия записей</summary>
                    <?php
                        foreach($appoints as $appoint){
                            echo'
                    <article class="main__history-item">
                        <div class="main__history-item-id">
                            <p><b>ID записи: </b>'. $appoint['id_appoint'] .'</p>
                        </div>
                        <div class="main__history-item-container">
                            <p>Ребенок: '. $appoint['child_lname'] .' '. $appoint['child_fname'] .' '. $appoint['child_pname'] .'</p>
                            <p>Категория услуги: '. $appoint['service_name'] .'</p>
                            <p>Почта: '. $appoint['email'] .'</p>
                            <p>Телефон: '. $appoint['phone_number'] .'</p>
                            <p>Время: '. date('d-m-Y H:i', strtotime($appoint['appoint_date'])) .'</p>
                            <p>Статус: '. $appoint['status_name'] .'</p>
                        </div>
                    </article>';
                        }
                    ?>
                </details>
            </section>
            <p class="main__profile-exit-link-container"><a href="vendor/exit.php" class="link link--exit">Выйти</a></p>
        </section>
    </main>
    <?php
    require('inc/footer.inc');
    ?>
</body>

</html>