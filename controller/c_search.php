<?php

    if(isset($_POST['ckeyword'])) {
        $keyword = $_POST['ckeyword'];
        if($keyword == '') {
            echo 'blank';
        }
        else {
            echo ''.$keyword.'';
        }
    }

?>