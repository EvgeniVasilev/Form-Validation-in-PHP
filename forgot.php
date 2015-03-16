<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Forgot Password</title>
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
                /*margin-top: 20px;*/
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
<h2>Forgotten Password</h2>
<form method="post" action="forgot.php">
<?php
    $class = 'success-box';
    $error_text = null;
    if(isset($_POST['email']) and $_POST['email'] === ""):
    $class = "error-box";
    $error_text = " Please, fill in your e-mail!";
?>
<?php
    endif;
?>

<?php
    if(isset($_POST['email']) and $_POST['email'] !== "" and !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
    $error_text = "It is not a valid e-mail!";
?>
<?php
    elseif (isset($_POST['email']) and $_POST['email'] !== "" and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)): $error_text = '';
?>
<?php
    endif;
?>
<p>
<label for="email">E-mail:</label>
<br/>
<input type="text" name="email" class="<?php echo  $class; ?>"/>
<br/>
<span><?php echo $error_text; ?></span>
</p>
<input type="Submit" value="Submit"/>
</form>
<br/>
<a href="index.php">Login Page</a>
<?php
    $email = null;
    if(isset($_POST['email']) and $_POST['email'] !== "" and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
    }
    $body = "<div style=\"width: 416px;background-color: rgb(34,34,34);color: white;padding: 7px;
border-radius: 3px; margin-bottom: 20px; font-size: 20px;\">Be-web Password Reminder</div>Your User Name is: user"."<br/>"."Your Password is: pass". "<br/>" . "You can now follow <a href='http://www.be-web.bg/web-forms/index.php'>www.be-web.bg/web-forms/index.php</a>  to Login <div style=\"margin-top: 10px;\ color: rgb(34,34,34)\">&copy;<a href=\"http://www.be-web.bg\"> www.be-web.bg</a></div>";
    $header = "Content-type:text/html";
   if(mail($email , "Password Reminder", $body, $header)){
       echo "<br/><span>";
       echo "The e-mail was send to you!";
       echo "</span>";
   }
?>
</body>
</html> 