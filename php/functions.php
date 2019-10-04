<?php

        function getCommit(){
            if(isset($_POST['subButton']) ){

                if (!empty($_POST['userName'])){
                    $_SESSION['status'] = true;
                }
                else{
                    $_SESSION['status'] = false;
                }
                header('Location: index.php');
                exit;
            }
        }

?>