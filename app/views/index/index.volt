<div class="container">

<link rel="icon" type="image/png" href="assets/img/favicon.ico" />

    <div class="row boutons">
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-3">
          
        
            <div class="box">
            
                <div class="icon">  
                    <div class="image"> <a class="tool" href="{{url.get("Taches")}}" data-ajax="Taches">
                    <span class="glyphicon glyphicon-list-alt btn-lg white"></span>
                    </a></div>
                    <div class="info">
                        <h3 class="title">Tâches</h3>
                        <p>
                           Tâches correspondant aux Usecases des projets.
                        </p>
                        <div class="more">
                        <a class="btn btn-default tool" href="{{url.get("Taches")}}" data-ajax="Taches">Tâches</a>&nbsp;
                           
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><a class="tool" href="{{url.get("projects")}}" data-ajax="projects"><span class="glyphicon glyphicon-play-circle btn-lg white"></span></a></div>
                    <div class="info">
                        <h3 class="title">Projets</h3>
                        <p>
                        Tous vos projets Increase ainsi que leur messages.
                        </p>
                        <div class="more">
                           <a class="btn btn-default tool" href="{{url.get("projects")}}" data-ajax="projects">Projets</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><a class="tool" href="{{url.get("UseCases")}}" data-ajax="UseCases"><span class="glyphicon glyphicon-pencil btn-lg white"></span></a></div>
                    <div class="info">
                        <h3 class="title">Usecases</h3>
                        <p>
                         Les différentes usescases et leur progression.   
                        </p>
                        <div class="more">
                           <a class="btn btn-default tool" href="{{url.get("UseCases")}}" data-ajax="UseCases">UseCases</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
     </div>
    
     <div class="row boutons">

      <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
      </div>
       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><a class="tool" href="{{url.get("users")}}" data-ajax="users"><span class="glyphicon glyphicon-user btn-lg white"></span></a></div>
                    <div class="info">
                        <h3 class="title">Utilisateurs</h3>
                        <p>
                        Les différents utilisateurs. 
                        </p>
                        <div class="more">
                          <a class="btn btn-default tool" href="{{url.get("users")}}" data-ajax="users">Utilisateurs</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        
       
         
        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-">
      </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="box">
                <div class="icon">
                    <div class="image"><a class="tool" href="{{url.get("Acl")}}" data-ajax="Acl"><span class="glyphicon glyphicon-cog btn-lg white"></span></a></div>
                    <div class="info">
                        <h3 class="title">Gestion des droits</h3>
                        <p>
                        Gérer les droits. 
                        </p>
                        <div class="more">
                          <a class="btn btn-default tool" href="{{url.get("Acl")}}" data-ajax="Acl">Gestion des droits</a>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> 
        </div>

        
      </div>
        
      
     
     



<br>
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

