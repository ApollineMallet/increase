{{msg}}
<!DOCTYPE html>
<html>
	
{{ form("Connexion/connexion", "method": "post", "name":"frmObject",
"id":"frmObject") }}


    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="mail" name="mail" class="form-control" placeholder="Email" required autofocus>
                <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required>
                <div id="remember" class="checkbox">
                  
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin tool" data-ajax="{{url.get("
		index")}}" type="submit">Sign in</button>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
    </div><!-- /container -->




</html>








