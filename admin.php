<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
        if (!isset($_SESSION['user'])){
            header('location:index.php');
            exit();
        }
        if ($_SESSION['user']['id_role'] !== 2){
            header('location:index.php');
            exit();
        }
    ?>
    <title>ДетГрад: панель администратора</title>
</head>

<body>
    <?php
        require('inc/header.inc');
    ?>

    <main class="main">
        <section class="main__admin-panel">
            <h2 class="h2 h2--center">Панель администратора</h2>
            <div class="main__admin-panel-container">
                <a class="main__admin-panel-item" href="admin_add_specialists.php">
                    <div>
                        <h2 class="h2 h2--center">Добавить/редактировать специалистов</h2>
                        <p>Добавить/редактировать специалистов на странице со специалистами</p>
                    </div>
                </a>
                <a class="main__admin-panel-item" href="admin_add_price.php">
                    <div>
                        <h2 class="h2 h2--center">Добавить/редактировать услуги в прайс-листе</h2>
                        <p>Добавить/редактировать услуги в прайс-листе на странице с услугами</p>
                    </div>
                </a>
                <a class="main__admin-panel-item" href="admin_appoints.php">
                    <div>
                        <h2 class="h2 h2--center">Добавить/редактировать записи</h2>
                        <p>Добавить/редактировать записи на прием к врачам</p>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <?php
        require('inc/footer.inc');
    ?>
</body>

</html>