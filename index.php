<?php ob_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <style type="text/css">
            form{
                display: inline-block;
                padding: 20px;
                border: 1px solid silver;
                border-radius: 3px;
                background-color: beige;
            }
            input[type="reset"]{
                background-color: white;
                border: 1px solid silver;
                border-radius: 3px;
                padding: 3px 10px 3px 10px;
                cursor: pointer;
                font-weight: bold;
            }
            input[type="reset"]:hover{
                background-color: #343434;
                color: white;
            }
            input[type="submit"]{
                background-color: white;
                border: 1px solid silver;
                border-radius: 3px;
                padding: 3px 10px 3px 10px;
                cursor: pointer;
                font-weight: bold;
            }
            input[type="submit"]:hover{
                background-color: #343434;
                color: white;
            }
            .p{
                color: red;
                font-weight: bold;
            }
            span{
                color: red;
                font-weight: bold;
            }
            .error-box{
                border: 2px ridge maroon;
                width: 200px;
                height: 25px;
                border-radius: 3px;
                padding-left: 10px;
                margin-top: 5px;                
            }
            .success-box{
                border: 1px solid silver;
                width: 200px;
                height: 25px;
                border-radius: 3px;
                padding-left: 10px;
                margin-top: 5px;
            }
            label{
                background-color: #343434;
                padding: 2px 5px 2px 5px;
                color: white;
                border-radius: 3px;
                font-size: 13px;
                font-weight: bold;
                cursor: pointer;
            }
            input{
                outline: none;
            }
            
            a{
                color:#5959FF;
                text-decoration: none;
                font-family: Arial, sans-serif;
                font-size: 14px;
            }
        </style>        
    </head>
    <body>       
    <h2>ABV Login Form</h2>
        <form method="post" action="index.php" id="f1">
            <?php
            $class = null;
            $error_text = null;
            $value = null;
            if (isset($_POST['user']) and $_POST['user'] === ''): $class = 'error-box';
                $error_text = "Please, fill in your User Name!";
                $value = '';
                ?>           
                <?php elseif ((isset($_POST['user']) and $_POST['user'] !== '') and (isset($_POST['pass']) and $_POST['pass'] === "")): $error_text = null;  $value = $_POST['user']; $class = 'success-box'; ?>
                <?php else: $class = 'success-box'; ?>
                <?php endif ?>
            <p>
                <label for="user">User Name</label>
                <br/>
                <input id="user" type="text" name="user" class="<?php echo $class; ?>" value="<?php echo $value; ?>"/>
                <br/>
                <span><?php echo $error_text; ?></span>
            </p>
            <?php
            if (isset($_POST['pass']) and $_POST['pass'] === ''): $class = 'error-box';
                $error_text = "Please, fill in your Password!"; $value = '';
                ?>
                <?php elseif ((isset($_POST['pass']) and $_POST['pass'] !== "") and (isset($_POST['user']) and $_POST['user'] === '')): $error_text = null;  $value = $_POST['pass']; $class = 'success-box'; ?>
                <?php else: $class = 'success-box'; ?>
                <?php endif ?>
            <p>
                <label for="pass">Password</label>
                <br/>
                <input type="password" id="pass" name="pass" class="<?php echo $class; ?>" value="<?php echo $value; ?>"/>
                <br/>
                <span><?php echo $error_text; ?></span>
            </p>
            <p>
                <input type="submit" value="Login" id="log-btn"/>   
                <input type="reset" value="Reset" onclick="window.location = 'index.php' "/>
            </p>
        </form>
        <?php              
        $user = null;
        $pass = null;              
        if((isset($_POST['user']) and $_POST['user'] !== '') and (isset($_POST['pass']) and $_POST['pass'] !== '')){
            $user = htmlspecialchars($_POST['user']);
            $pass = htmlspecialchars($_POST['pass']);                 
            if($pass == "pass" and $user == "user"){
                header("Location: http://www.abv.bg");
            }else{
                echo "<p class=\"p\">";
                echo "Invalid Login credentials! Please, verify you rights to Login!";
                echo "</p>";
            }               
        }            
        ?>
        <br/>
        <a href="forgot.php">Forgot Password</a>
        <p>User name: user</p>
        <p>Password: pass</p>
        <script type="text/javascript">
        window.onload = function () {
            var user = document.getElementById("user");
            if(user.value === ""){
                user.focus();
            }            
            var pass = document.getElementById("pass");
            if(pass.value === "" && user.value !== ""){
                pass.focus();
            }
        }
        </script>
    </body>
</html>
