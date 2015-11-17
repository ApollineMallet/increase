<!DOCTYPE html>
<html>

	<h1><center> Connexion </center></h1> </br>
	<label for="mail" style='margin-left:425px; width:30px'> Email </label> <br />
	<center><input type='text' id='mail' name='mail' required='required' style='width:225px; border:1px solid rgb(129,181,221); text-align:center; border-radius:1px; height:30px;'></center> </br>
	
	<label for="mail" style='margin-left:425px;'> Password </label> <br />
	<center><input type='text' id='mdp' name='mdp' required='required' style='width:225px; border:1px solid rgb(129,181,221); text-align:center; border-radius:1px; height:30px;'></center> </br></br>
	
	<center> <a class='btn btn-primary add' href='{{url.get("connexion")}}' data-ajax="{{"connexion"}}" style='width:225px;'> Me connecter </a> </center>
	
</html>