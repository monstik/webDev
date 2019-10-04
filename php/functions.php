<?php

function getCommit()
{
    if (isset($_POST['subButton'])) {
        if (!empty(trim($_POST['userName'])) && !empty(trim($_POST['textarea']))) {
            $_SESSION['statusFieldOne'] = true;
        } else {

            if (!empty(trim($_POST['userName']))) {
                $_SESSION['statusFieldOne'] = true;
                $_SESSION['tempFieldOne'] = $_POST['userName'];
            } else {
                $_SESSION['statusFieldOne'] = false;

            }

            if (!empty(trim($_POST['textarea']))) {
                $_SESSION['statusFieldTwo'] = true;
                $_SESSION['tempFieldTwo'] = $_POST['textarea'];
            } else {
                $_SESSION['statusFieldTwo'] = false;
            }
        }


        header('Location: index.php');
        exit;
    }
}

?>