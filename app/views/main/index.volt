{{msg}}
<table class='table table-striped'>
	<thead><tr><th colspan='3'>{{model}}</th></tr></thead>
		<tbody>
		{% for object in objects %}
			<tr>
			
			<td>{{object.toString()}}</td>
			<td class='td-center'><a class='btn btn-primary btn-xs update' href='{{url.get(baseHref~"/frm/"~object.getId())}}' data-ajax="{{ baseHref ~ "/frm/" ~ object.getId() }}"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
			<td {{show}} class='td-center'><a href='{{url.get(baseHref~"/show/"~object.getId())}}' data-ajax="{{ baseHref ~ "/show/" ~ object.getId() }}" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-eye-open"></span></a></td>
			<td class='td-center'><a class='btn btn-warning btn-xs delete' href='{{url.get(baseHref~"/delete/"~object.getId())}}' data-ajax="{{ baseHref ~ "/delete/" ~ object.getId() }}"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
			
			</tr>
		{% endfor %}
		</tbody>
</table>
<a class='btn btn-primary add' href='{{url.get(baseHref~"/add")}}' data-ajax="{{ baseHref ~ "/add/"}}">Ajouter...</a>
<a class='btn btn-default cancel' href='{{url.get("index")}}' data-ajax="{{ baseHref ~ "/index"}}">Retour</a>
{% if script_foot is defined %}
    {{ script_foot }}
{% endif %}