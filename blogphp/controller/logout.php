    <?php
        session_start();
        session_destroy();
        header('Location:/php%20test/blogphp/index.php/controller/index_controller');
    ?>