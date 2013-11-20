<?php include 'titlebar.php';?>
<?php
if(loggedin()==true)
{
	$user_id=$_SESSION['user_id'];
	$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM usuarios WHERE idUsuario='$user_id'");
	$log->execute(); // missing ()
	$log->store_result();
	$log->bind_result($user_id, $user_level);
	if($log->fetch()) //fetching the contents of the row
	{
		if($user_level=='superadmin')
		{
			echo '<div class="users">';
			$query = mysql_query("SELECT idUsuario FROM usuarios");
			$rowtwo = mysql_fetch_array($query) or die();
			echo '<table>';
			while($rowtwo = mysql_fetch_array($query)){
	  			echo '<tr>
	       		<td><font size="2" face="Lucida Sans Unicode" color=#EBEBEB>' .$rowtwo['idUsuario'].'</td>
	       		</tr>';
	       	}
			echo '</table>';
			echo '</div>';
		}
	}
}
?>