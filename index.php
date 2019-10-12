<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest book</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<header>
    <div class="head">
        <img class="logo" src="img/logo.png" alt="book">
        <h1 class="name">Guest book</h1>
        <a class="logIn" href="#">Log in</a>
    </div>
</header>

<div class="formSection">
    <form class="form" action="" method="post">
        <h2>Name:</h2>
        <div class="inputContainer">
            <input name="userName" type="text" max="30" title="обязательное поле"
                   value=<?php if (isset($_SESSION['tempFieldOne'])) echo $_SESSION['tempFieldOne'];
                   unset($_SESSION['tempFieldOne']) ?>>
            <?php
            if (isset($_SESSION['statusFieldOne']))
                if (!$_SESSION['statusFieldOne']): unset($_SESSION['statusFieldOne']) ?>
                    <img class="requireImgName" src="img/required%20field.png" alt="required">
                <?php endif ?>
        </div>
        <h2 >Email:</h2>
        <input class="email" type="text" maxlength="30" title="обязательное поле">
        <div class="inputContainer">
            <textarea name="textarea" maxlength="1000" cols="30" rows="10"  ><?php  if (isset($_SESSION['tempFieldTwo'])) echo $_SESSION['tempFieldTwo'];   unset($_SESSION['tempFieldTwo'])?></textarea>
            <?php
            if (isset($_SESSION['statusFieldTwo']))
                if (!$_SESSION['statusFieldTwo']): unset($_SESSION['statusFieldTwo']) ?>
                    <img class="requireImgTextarea" src="img/required%20field.png" alt="required">
                <?php endif ?>
        </div>
        <p>
            <button name="subButton" class="submitButton" type="submit">Отправить</button>
        </p>
    </form>
</div>

<div class="comments">
    <div class="counter"><h2>Comments: 0</h2></div>

    <?php
    use php\classes\Form;
    use php\classes\Data;
    use php\classes\Messages;
    function autoload($class){
        $file = __DIR__ . "/{$class}.php";
        if (file_exists($file)) {
            require_once "$file";
        }
    }

    spl_autoload_register("autoload");

    require_once("php/functions.php");
    $form = new Form();
    $messages = new Messages( __DIR__ . "/data/data.txt");
    if ($form->checkForm()){
        $messages->addMessage($form->getMessage());
    }





    ?>
    <ul class="list">

        <?php
        $messages->displayMessages();
        ?>

    </ul>
</div>


</body>
</html>