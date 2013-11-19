 <div>
	<?php include 'functions.php';?>
    <?php
        if(loggedin()==true){
            $user_id=$_SESSION['user_id'];
            $log=$con->prepare("SELECT username,tipoUsuario FROM users WHERE user_id='$user_id'");
            $log->execute;
            $log->bind_result($username, $tipoUsuario,$user_id);
            $log->store_result;
            if($log->fetch()) //fetching the contents of the row
            {
                if($tipoUsuario=='superadmin'){?>
                    <a href = 'index.php'>Home</a>
                    <a href = 'profile.php'>Profile</a>
                    <a href = 'admin.php'>Admin</a>
                    <a href = 'index.php'>Log Out</a>
                <?php
                }if($tipoUsuario=='admin'){?>
                    <a href = 'index.php'>Home</a>
                    <a href = 'profile.php'>Profile</a>
                    <a href = 'index.php'>Log Out</a>
                <?php
                }
            }?>
        <?php
        }?><a href = 'index.php'>Home</a>
                    <a href = 'login.php'>Login</a>
                    <a href = 'register.php'>Register</a>
        <?php }
    ?>

</div>
