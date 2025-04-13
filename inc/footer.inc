    <footer class="footer">
        <div class="footer__container">
            <nav>
                <ul class="footer__nav nav">
                    <li class="footer__nav-link"><a href="index.php">Главная</a></li>
                    <li class="footer__nav-link"><a href="specialists.php">Специалисты</a></li>
                    <li class="footer__nav-link"><a href="about_us.php">О клинике</a></li>
                    <li class="footer__nav-link"><a href="price.php">Прайс-лист</a></li>
                    <li class="footer__nav-link"><a href="appointment.php">Записаться на прием</a></li>
                    <?php
                    if(isset($_SESSION['user'])){
                        echo '<li class="footer__nav-link"><a href="profile.php">Профиль</a></li>';
                        if($_SESSION['user']['id_role'] === 2){
                            echo '<li class="footer__nav-link"><a href="admin.php">Функции администратора</a></li>';
                        }
                    }
                    else{
                        echo '<li class="footer__nav-link"><a href="enter.php">Войти</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <div class="footer__schedule-item">
                <h2 class="footer__h2 h2">&#169; Поликлиника «ДетГрад», 2025</h2>
                <p>О возможных противопоказаниях проконсультируйтесь со специалистом. Данный сайт носит исключительно
                    информационный характер.</p>
                <p>Цены, размещенные на сайте, не являются публичной офертой, определяемой положениями статьи 437
                    Гражданского кодекса Российской Федерации. Перед получением услуги необходимо уточнять цены у
                    ответственных сотрудников клиники.</p>
            </div>
        </div>
    </footer>