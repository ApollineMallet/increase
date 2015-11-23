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
{% if user == null %}
<a class="btn btn-warning" href="{{url.get("Connexion")}}" data-ajax="Connexion">Connexion</a>&nbsp;
{% else %}
<a class="btn btn-warning" href="{{url.get("index")}}" data-ajax="Connexion/deconnexion">Déconnexion</a>&nbsp;
{% endif %}

{{ script_foot }}