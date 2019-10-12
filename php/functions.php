<?php



function readMessage($fileName){
    $tempMesage = $_POST['userName'] . "===" . $_POST['textarea'] . "===" . date("d.m.Y") . "\n" . "***" . "\n";
   //перед тем как записать файл нужно будет написать проверку на вредоносный код
    file_put_contents($fileName, "$tempMesage", FILE_APPEND);
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