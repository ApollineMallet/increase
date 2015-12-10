<link rel="icon" type="image/png" href="assets/img/favicon.ico" />
<h1>Congratulations!</h1>
{{user}}
<p>You're now flying with Phalcon. Great things are about to happen!</p>
<p>You can now install <a href="http://phalcon-jquery.kobject.net" target="new">phalcon-jQuery</a> for flying even faster.</p>
<a class="btn btn-default" href="{{url.get("Users")}}" data-ajax="Users">Utilisateurs</a>&nbsp;
<a class="btn btn-primary" href="{{url.get("Projects")}}" data-ajax="Projects">Projets</a>&nbsp;
<a class="btn btn-success" href="{{url.get("UseCases")}}" data-ajax="UseCases">UseCases</a>&nbsp;
<a class="btn btn-info" href="{{url.get("Taches")}}" data-ajax="Taches">Tâches</a>&nbsp;
<a class="btn btn-warning" href="{{url.get("Messages")}}" data-ajax="Messages">Messages</a>&nbsp;
<a class="btn btn-warning" href="{{url.get("Acl")}}" data-ajax="Acl">Gestion des droits</a>&nbsp;


<div class="btn-group">
	<button type="button" class="btn btn-'.$style.' dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Connexion en tant que... <span class="caret"></span></button>
	<ul class="dropdown-menu" role="menu">
		<li><a href={{url.get("Default/asAdmin")}} data-ajax="Default"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Administrateur</a></li>
		<li><a href={{url.get("Default/asUser")}} data-ajax="Default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Utilisateur</a></li>
		<li><a href={{url.get("Default/asAuthor")}} data-ajax="Default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Auteur</a></li>
	</ul>
</div>

{% if user == null %}
<a class="btn btn-warning" href="{{url.get("Connexion")}}" data-ajax="Connexion">Connexion</a>&nbsp;
{% else %}
<a class="btn btn-warning" href="{{url.get("Connexion")}}" data-ajax="Connexion/deconnexion">Déconnexion</a>&nbsp;
{% endif %}


{{ script_foot }}