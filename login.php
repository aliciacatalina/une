<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
<link rel= "stylesheet" href="dist/css/bootstrap.css" >
</head>
<body>
<?php include 'connect.php';?>
<?php include 'functions.php';?>

<h3>LOGIN HERE:</h3>
<form action ="" method="post">

User Name:<br/>
<input type='text' name='username' />
<br/><br/>
Password:<br/>
<input type='password' name='password' />
<br/><br/>
<input type='submit' name='submit' value='login'>
</form>

<div class="status">
    <?php echo $error; ?>
</div>

</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $con->prepare("SELECT idUsuario, password FROM usuarios WHERE idUsuario=? AND password=? LIMIT 1");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
                   $_SESSION['loggedin'] = 1;
                   $_SESSION['user_id'] = $username;
                   $_SESSION['username'] = $username;
                    header('Location: index.php');
                    exit();

           }

    }
    else {
        $error = "INVALID USERNAME/PASSWORD Combination!".$username.$user_id.$password;
    }
    $stmt->close();
}
else
{

}
$con->close();
?>