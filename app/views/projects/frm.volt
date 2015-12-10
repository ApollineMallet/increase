 {{ form("Projects/update", "method": "post", "name":"frmObject",
"id":"frmObject") }}
<fieldset>

	<legend>Modifiez les projets</legend>
	{% for p in projet %}
	<div class="alert alert-info">Modification du projet :
		{{p.getNom()}}</div>

	<div class="form-group">
		<label></label><input type="hidden" name="id" id="id"
			value="{{p.getId()}}"> <label>Changez le nom :</label><input
			type="text" name="nom" id="nom" value="{{p.getNom()}}"
			placeholder="Entrez le nom" class="form-control"><br>
		<label>Changez la date finale :</label><input type="date" name="dateFinPrevue"
			id="dateFinPrevue" value="{{p.getDateFinPrevue()}}" 
			class="form-control"><br> 
			
			<label>Changez la description :</label><input
			type="text" name="description" id="description" value="{{p.getDescription()}}"
			placeholder="Entrez une description" class="form-control"><br>	
			
			
			
			
			<label for="identite">Changez l'utilisateur</label>
	<select class="form-control" id="idClient" name="idClient">
		  {% for u in users %}
		    <option value="{{u.getId()}}">{{u.getIdentite()}} :  {{u.getId()}}</option>
		  {% endfor%}
	</select>
			
	</div>
	<div class="form-group">
		<input type="submit" value="Valider" class="btn btn-default validate">
		<a class="btn btn-default cancel" href="{{url.get("
			Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
	</div>
	{% endfor %}

</fieldset>
</form>
{{ script_foot }}
