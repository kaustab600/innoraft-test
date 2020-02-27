    <?php
        session_start();
        session_destroy();
        header('Location:/blogssite/index_controller');
    ?>