<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
        require('inc/head.inc');
    ?>
    <title>ДетГрад: специалисты</title>

</head>

<body>
    <?php
        require('inc/header.inc');
        //Запрос специалистов
        $specialistsStmt = $connect->prepare("SELECT d.*, s.speciality_name FROM doctors d JOIN speciality s ON d.id_speciality = s.id_speciality");
        $specialistsStmt->execute();
        $specialists = $specialistsStmt->fetchAll(PDO::FETCH_ASSOC);
        ////////////////////////////////////////////////
    ?>

    <main class="main">
        <section class="main__about">
            <div class="main__about-container">
                <h2 class="main__about-h2 h2">Сотрудники детской поликлиники ДетГрад</h2>
                <p>Эта страница содержит информацию о сотрудниках детской поликлиники ДетГрад</p>
            </div>
        </section>
        <section class="main__specialists">
            <div class="main__specialists-container">
                <?php
                foreach($specialists as $specialist){
                    echo'
                <article class="main__specialists-article">
                    <div>
                        <img class="main__specialists-article-img" src="'. $specialist['photo'] .'" alt="Думасова И. В.">
                    </div>
                    <div class="main__specialists-article-description">
                        <h2 class="main__specialists-h2 h2">'. $specialist['lname'] .' '. $specialist['fname'] .' '. $specialist['sname'] .'</h2>
                        <p>'. $specialist['speciality_name'] .'</p>
                    </div>
                </article>';
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