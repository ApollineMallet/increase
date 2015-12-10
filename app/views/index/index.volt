<div class="container">

<link rel="icon" type="image/png" href="assets/img/favicon.ico" />





 <div class="row col-xs-12 col-sm-6 col-md-2 col-lg-11">
  		{% if user != null %}
         <div class="alert align-center  alert-info" role="alert">{{user}}</div>
         {% endif %}
        </div>
	
    <div class="row boutons">
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-3">
       		
        
            <div class="box">
            
                <div class="icon">
                
                    <div class="image"><span class="glyphicon glyphicon-list-alt btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Tâches</h3>
                        <p>
                           Tâches correspondant aux Usecases des projets.
                        </p>
                        <div class="more">
                        <a class="btn btn-default" href="{{url.get("Taches")}}" data-ajax="Taches">Tâches</a>&nbsp;
                           
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><span class="glyphicon glyphicon-envelope btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Messages</h3>
                        <p>
                          Les messages relatifs aux projets	
                        </p>
                        <div class="more">
                            <a class="btn btn-default" href="{{url.get("Messages")}}" data-ajax="Messages">Messages</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><span class="glyphicon glyphicon-pencil btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Usecases</h3>
                        <p>
                         Les différentes usescases et leur progression.   
                        </p>
                        <div class="more">
                           <a class="btn btn-default" href="{{url.get("UseCases")}}" data-ajax="UseCases">UseCases</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
     </div>
    
     <div class="row boutons">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><span class="glyphicon glyphicon-play-circle btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Projets</h3>
                        <p>
                        Tous vos projets Increase.   
                        </p>
                        <div class="more">
                           <a class="btn btn-default" href="{{url.get("Projects")}}" data-ajax="Projects">Projets</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        
       
         <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><span class="glyphicon glyphicon-user btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Utilisateurs</h3>
                        <p>
                        Les différents utilisateurs. 
                        </p>
                        <div class="more">
                          <a class="btn btn-default" href="{{url.get("Users")}}" data-ajax="Users">Utilisateurs</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><span class="glyphicon glyphicon-cog btn-lg white"></span></div>
                    <div class="info">
                        <h3 class="title">Gestion des droits</h3>
                        <p>
                        Gérer les droits. 
                        </p>
                        <div class="more">
                          <a class="btn btn-default" href="{{url.get("Acl")}}" data-ajax="Acl">Gestion des droits</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        </div>
        <div class ="row">
         <div class="col-md-4"></div>
         <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="imageCo"><span class="glyphicon glyphicon-off btn-lg white"></span></div>
                    {% if user == null %}
                    <div class="info">
                        <h3 class="title">Connexion</h3>
                        <p>
 
							 
						    Connectez-vous
                        </p>
                        <div class="more">
                          <a class="btn btn-default" href="{{url.get("Connexion")}}" data-ajax="Connexion">Connexion</a>&nbsp;
                        </div>
                    </div>
                    
                    {% else %}
                    
                    <div class="info">
                        <h3 class="title">Deconnexion</h3>
                        <p>
 
						
						    Deconnectez-vous.
                        </p>
                        <div class="more">
                          <a class="btn btn-default" href="{{url.get("Connexion")}}" data-ajax="Connexion/deconnexion">Déconnexion</a>
							&nbsp;
                        </div>
                    </div>
                    {% endif %}
                      
                    
                </div>
               
                <div class="space"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="btn-group">
	<button type="button" class="btn btn-'.$style.' dropdown-toggle"
		data-toggle="dropdown" aria-expanded="false">
		Connexion en tant que... <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a href={{url.get( "Default/asAdmin")}} data-ajax="Default"><span
				class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Administrateur</a></li>
		<li><a href={{url.get( "Default/asUser")}} data-ajax="Default"><span
				class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Utilisateur</a></li>
		<li><a href={{url.get( "Default/asAuthor")}} data-ajax="Default"><span
				class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Auteur</a></li>
	</ul>
</div>
    
    
    </div>



 {{ script_foot }}

