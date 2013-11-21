 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container">
 <a class="navbar-brand" href="index.php">UNE</a>
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <?php
        if(loggedin()==true){
            $user_id=$_SESSION['user_id'];
            $log=$con->prepare("SELECT idUsuario, tipoUsuario FROM usuarios WHERE idUsuario='$user_id'");
            $log->execute(); // missing ()
            $log->store_result();
            $log->bind_result($user_id, $user_level);
            if($log->fetch()) //fetching the contents of the row
            {
                if($user_level=='superadmin'){?>
                    <li> <a href = 'index.php'>Home</a></li>
                    
                    <li><a href = 'logout.php'>Log Out</a></li>


                <?php
                }if($user_level=='admin'){?>
                    <li><a href = 'index.php'>Home</a></li>
                    <li><a href = 'logout.php'>Log Out</a></li>
                <?php
                }
            }?>
        <?php
             } else { ?><li><a href = 'index.php'>Not Logged in</a></li>
                            <li><a href = 'login.php'>Login</a></li>
                            <li><a href = 'register.php'>Register</a></li>
             <?php }    ?>
    </ul>
</div>
</div>
 </div>

 
