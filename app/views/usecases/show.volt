
<fieldset>

	<legend>Visualisation d'une tâche</legend>
	{% for a in usecase %}
	<div class="alert alert-info">Visualisation de la Usecase :
		{{a.getNom()}} | {{a.getCode()}}</div>
	<div class="form-inline">
		<label>Avancement :</label>{{pb}}
	</div>
	<br>
	<div class="form-group">
		<label>Poids de la Usecase :</label> {{a.getPoids()}}
	</div>

	<div class="form-group">
		<label>Utilisateurs attribués :</label> {{a.getUser().getIdentite()}}
	</div>
	<div class="form-group">
		<input type="hidden" name="id" id="id">

		<td style="vertical-align: middle; width: 56%;"></td>

		<div class="form-group">

			<a class="btn btn-default cancel" href="{{url.get("
				Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Retour</a>
		</div>
		{% endfor %}
</fieldset>
</form>
{{ script_foot }}
