<table class='table table-striped'>
	<thead><tr><th colspan='3'><h3 style='margin-top:0px;'>Mes projects [{{user.getIdentite()}}]</h3></th></tr></thead>
		<tbody>
		{% for object in objects %}
			<tr>
			<td>{{object.getnom()}}</td>
			<td>{{object.getDateLancement()}}</td>
			<td><a class='btn btn-success add'>Ouvrir...</a></td>
			</tr>
		{% endfor %}
		</tbody>
</table>
