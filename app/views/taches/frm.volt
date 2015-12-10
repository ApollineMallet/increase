<script type="text/javascript">
$('#myForm').validator()
</script>

 {{ form("Taches/update", "method": "post", "name":"frmObject",
"id":"frmObject") }}
<fieldset>
<form id="myForm" role="form" data-toggle="validator">
	<legend>Modifiez les taches</legend>
	{% for a in tache %}
	<div class="alert alert-info">Modification de la tache :
		{{a.getLibelle()}}</div>

	<div class="form-group has-feedback">
		<label></label><input type="hidden" name="id" id="id"
			value="{{a.getId()}}"> <label>Changez le libelle :</label><input
			type="text" required name="libelle" id="libelle" value="{{a.getLibelle()}}"
			placeholder="Entrez le libelle" class="form-control"><br>
		<label>Changez la date :</label><input type="date" required name="date"
			id="date" value="{{a.getDate()}}" 
			class="form-control"><br> <label>Changez
			l'avancement (en %) :</label><input type="number" name="avancement"
			id="avancement" pattern="[0-9]{1,}" maxlength="3" max="100" value="{{a.getAvancement()}}"
			placeholder="Changez l'avancement" class="form-control"><br>
			
	</div>
	<div class="form-group">
		<input type="submit" value="Valider" class="btn btn-default validate">
		<a class="btn btn-default cancel" href="{{url.get("
			Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
	</div>
	{% endfor %}
</form>
</fieldset>
</form>
{{ script_foot }}
