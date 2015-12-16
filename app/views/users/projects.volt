<div class="card">
<div id="mainContent">
<table class='table table-striped'>
	<thead>
		<tr>
			<th colspan='3'><h3 class="sansmarge">Mes projects
					[{{user.getIdentite()}}]</h3></th>
		</tr>

		

	</thead>
	<tbody>
		

		{% for object in objects %}
		<tr>

			<td class="affinom">
				{{object.getnom()}}</td>

			<td class="affipb">

				{{progressbar[object.getId()]}}</td>

			<td title="Jours restants avant la fin du projet." class="affinbj">
				{{NbJourAvantFinProjet[object.getId()]}}</td>

			<td title="Ouvrir le projet." class="affiopen">
				<a class='btn blue open' href='{{url.get("users/project/") ~ object.getId()}}' data-ajax='{{baseHref ~ "/project/" ~ object.getId()}}'>
					Ouvrir... </a>
			</td>

		</tr>
		{% endfor %}

	</tbody>
</table>
<h1>{{joke}}</h1>
</div>
<div id="details"></div>
</div>
{{script_foot}}
