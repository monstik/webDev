<?php

namespace php\classes;

class Form
{
    private $message;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
    function checkForm()
    {
        if (isset($_POST['subButton'])) {
            if (!empty(trim($_POST['userName'])) && !empty(trim($_POST['textarea']))) {
                $_SESSION['statusFieldOne'] = true;
                $this->readMessage();
                header('Location: index.php');
                return true;
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
                header('Location: index.php');
                return false;
            }

        }
    }
        function readMessage(){
            $this->message = $_POST['userName'] . "===" . $_POST['textarea'] . "===" . date("d.m.Y") . "\n" . "***" . "\n";
        }


}