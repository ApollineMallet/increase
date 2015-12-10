{{msg}}
<!DOCTYPE html>
<html>
{{ form("Connexion/connexion", "method": "post", "name":"frmObject",
"id":"frmObject") }}
<h1>
	<center>Connexion</center>
</h1>
</br>
<label for="mail" style='margin-left: 425px; width: 30px'> Email
</label>
<br />
<center>
	<input type='text' id='mail' name='mail' required='required'
		style='width: 225px; border: 1px solid rgb(129, 181, 221); text-align: center; border-radius: 1px; height: 30px;'>
</center>
</br>

<label for="mail" style='margin-left: 425px;'> Password </label>
<br />
<center>
	<input type='password' id='mdp' name='mdp' required='required'
		style='width: 225px; border: 1px solid rgb(129, 181, 221); text-align: center; border-radius: 1px; height: 30px;'>
</center>
</br>
</br>

<center>
	<button class='btn btn-primary add' data-ajax="{{url.get("
		index")}}" style='width: 225px;'>Me connecter</button>
</center>
</form>
</html>
