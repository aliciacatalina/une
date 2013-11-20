 <div>
    <?php
        if(loggedin()==true){
            $user_id=$_SESSION['user_id'];
            $log=$con->prepare("SELECT idUsuario, tipoUsuario FROM Usuarios WHERE idUsuario='$user_id'");
            $log->execute(); // missing ()
            $log->store_result();
            $log->bind_result($user_id, $user_level);
            if($log->fetch()) //fetching the contents of the row
            {
                if($user_level=='superadmin'){?>
                    <a href = 'index.php'>Home</a>
                    <a href = 'logout.php'>Log Out</a>


                <?php
                }if($user_level=='admin'){?>
                    <a href = 'index.php'>Home</a>
                    <a href = 'logout.php'>Log Out</a>
                <?php
                }
            }?>
        <?php
             } else { ?><a href = 'index.php'>Not Logged in</a>
               ^^^^^^
                            <a href = 'login.php'>Login</a>
                            <a href = 'register.php'>Register</a>
             <?php }    ?>

</div>
