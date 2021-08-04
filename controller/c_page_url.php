<?php

    if(isset($_POST['cpage'])) {
        $page = $_POST['cpage'];
        echo ('&page='.$page);
    }

?>