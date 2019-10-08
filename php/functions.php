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
    $tempMesage = $_POST['userName'] . "===" . $_POST['textarea'] . "===" . date("d.m.Y") . "\n" . "***" . "\n";
   //перед тем как записать файл нужно будет написать проверку на вредоносный код
    file_put_contents($fileName, "$tempMesage", FILE_APPEND);
}

function readData($fileName){
    $tempData = file_get_contents($fileName);
    $tempData = str_replace("\n", "", $tempData);
    $tempData =  explode("***", $tempData);
    array_pop($tempData);
    $messages = array();
    foreach ($tempData as $datum) {
       $messages[] = mb_split("===", $datum);
    }
   return $messages;
}

function displayMessages($messages){
    $messages = array_reverse($messages);
    foreach ($messages as $message) {
        printf(" <li>
            <div class=\"comment\">
                <h2>$message[0]:</h2>
                <p>$message[1]</p>
                <p class=\"data\">$message[2]</p>

            </div>
        </li> ") ;
    }



}
?>