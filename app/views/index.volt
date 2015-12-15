<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="public/img/increase.png" />
<title>Increase</title> {{ stylesheet_link("css/bootstrap.min.css") }}
{{ stylesheet_link("css/styles.css") }} {{
javascript_include('js/jquery.min.js') }} {{
javascript_include('js/bootstrap.min.js') }}
</head>
<meta charset="UTF-8">
<body>
<!-- /.navbar-header -->
{% if user != null %}			
  <div class="container-fluid">
 
    <div class="navbar-header">
    
      
      <a class="navbar-brand" href="#">Bonjour, {{user}}</a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-right">
      
      <li><a class="tool" href="{{url.get("Deconnexion")}}" data-ajax="Connexion/deconnexion">Déconnexion</a></li>
     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

{% endif %}

	<div class="bs-docs-header">
		<div class="container">
			<div class="header">
				<h1>Increase - Triple a</h1>
				<p>Manage the progress of your projects, improve communication
					with customers.</p>
					
					
						
					
			</div>
		</div>
	</div>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="{{url.get("index")}}"><span
					class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Accueil</a></li>
		</ol>
		<div class="content">
			<div id="message"></div>
			<div id="content">{{ content() }}</div>
		</div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="col-md-4">
				<p>Mentions légales</p>
				<p>
					<span>Created with Phalcon</span>
				</p>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<input id="ig-5" name="ig-5" class="form-control" role="input"
						value="" type="text" aria-describedby="right-ig-5"
						placeholder="Rechercher...">
					<div id="right-ig-5" class="input-group-btn">
						<button id="ig-4-radio" class="btn btn-default" role="button">Go</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>