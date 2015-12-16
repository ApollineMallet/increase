<script type="text/javascript">
	$(document).ready(function () {
		
			(function ($) {
		
				$('#filter').keyup(function () {
		
					var rex = new RegExp($(this).val(), 'i');
					$('.searchable tr').hide();
					$('.searchable tr').filter(function () {
						return rex.test($(this).text());
					}).show();
		
				})
		
			}(jQuery));
		
		});

</script>


{{msg}}

<thead>
<td>
<h2 class="titreindex">{{model}}</h2>
<td>

</thead>
<div class="card">
<div class="input-group"> <span class="input-group-addon">Filtre</span>

    <input id="filter" type="text" class="form-control" placeholder="Le filtre c'est pas que dans les clopes">
</div>
<br>

<table class='table table-hover table-bordered '>

	
	<tbody class="searchable">
	
		{% for object in objects %}
		<tr>
		{% if model == "Tache" %}
			<td style="vertical-align: middle; width: 40px;">
				{% if time[object.getId()] > 1512000 %}
					{{oklm}}
				{% else %}
					{{oklm2}}
				{% endif %}
			</td>
		{% endif %}




		{% if model == "Tache" or model == "Usecase" or model == "Projet" %}
			<td style="vertical-align: middle; width: 16%;">
				{{pb[object.getId()]}}</td>
		{% endif %}
			<td>{{object.toString()}}</td>
			
			
			<td class='td-center'>
			
			<a class='btn btn-primary btn-xs update' href='{{url.get(baseHref~"/frm/"~object.getId())}}'
				data-ajax="{{ baseHref ~ "/frm/" ~ object.getId() }}">
				
				
				<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>

{% if model != "User" %}
			<td {{show}} class='td-center'><a

				{% if model == "Projet" %}
					href='{{url.get("users/project/"~object.getId())}}' data-ajax='{{url.get("users/project/"~object.getId())}}'
				{% else %} 
					href='{{url.get(baseHref~"/show/"~object.getId())}}' 
					data-ajax='{{ baseHref ~ "/show/" ~ object.getId() }}'
				{% endif%}

				class="btn btn-xs btn-default">
				<span class="glyphicon glyphicon-eye-open"></span></a></td>
{% endif%}


			<td class='td-center'><a class='btn btn-warning btn-xs delete'
				href='{{url.get(baseHref~"/delete/"~object.getId())}}'
				data-ajax="{{ baseHref ~ "/delete/" ~ object.getId() }}"><span
					class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>

		</tr>
		{% endfor %}
	</tbody>
</table>

{% if model != "User" %}
<a class='btn btn-primary add' href='{{url.get(baseHref~"/add")}}'
	data-ajax="{{ baseHref ~ "/add/"}}">Ajouter...</a>
	{% endif %}
<a class='btn btn-default cancel' href='{{url.get("index")}}'
	data-ajax="{{ baseHref ~ "/index"}}">Retour</a>
{% if script_foot is defined %} {{ script_foot }} {% endif %}
</div>