<?php

function checkForm($fileName)
{
    if (isset($_POST['subButton'])) {
        if (!empty(trim($_POST['userName'])) && !empty(trim($_POST['textarea']))) {
            $_SESSION['statusFieldOne'] = true;
            header('Location: index.php');
            readMessage($fileName);
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

function readMessage($fileName){
    $tempMesage = $_POST['userName'] . "===" . $_POST['textarea'] . "===" . date("d.m.Y H:i") . "\n" . "***" . "\n";
   //перед тем как записать файл нужно будет написать проверку на вредоносный код
    file_put_contents($fileName, "$tempMesage", FILE_APPEND);
}

function readData(){

}

?>