<table class='table table-striped'>
	<thead><tr><th colspan='3'><h3 style='margin-top:0px;'>Mes projects [{{user.getIdentite()}}]</h3></th></tr></thead>
		<tbody>

		
		{% for object in objects %}
			<tr>

			<td style="vertical-align:middle; padding-left:2%; width:13%;">
					{{object.getnom()}}
			</td>

			<td title="{{pourcentprogressbar[object.getId()]}}" style="vertical-align:middle; width:56%;">
					{{progressbar[object.getId()]}}
			</td>

			<td title="Jours restants avant la fin du projet." style="vertical-align:middle; text-align:center; width:13%;">
					{{NbJourAvantFinProjet[object.getId()]}}
			</td>

			<td title="Ouvrir le projet." style="vertical-align:middle; text-align:center; width:18%;">
				<a class='btn btn-success' href="{{url.get("users/project/") ~ object.getId()}}">
					Ouvrir...
				</a>
			</td>
			
			</tr>
		{% endfor %}

		</tbody>
</table>