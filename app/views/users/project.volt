{% for o in pro %}

	<h3 class="nomprojet">
		{{o.getNom()}} [{{user.getIdentite()}}]
	</h3>
	
	<h4 class="detailsprojet">
		Details du projet
	</h4>

	<div class="detailsprojet">
		<h4 class="descri">
			Description
		</h4>

		<p class="descri">
			{{o.getDescription()}}
		</p>

		<h4 class="date">
			Date de lancement :	{{o.getDateLancement()}}
		</h4>			
	
		<h4 class="date">
			Date de fin prevue : {{o.getDateFinPrevue()}}
		</h4>
	
	</div>
	
	<a id='equipe' class="btn detailsprojet" data-ajax='{{"/projects/equipe/" ~ o.getId()}}'>
		<h4 class="rien">
			Team
		</h4>
	</a>

	<div id='detailProject'></div>
	

	<a id='btnMessages' class="btn detailsprojet" data-ajax='{{"/projects/messages/" ~ o.getId()}}'>
		<h4 class="rien">
			<span class="glyphicon glyphicon-envelope"></span> {{nbmsg}} Messages...
		</h4>
	</a>
	<div id='divMessages'></div>


{% endfor %}

{{script_foot}}