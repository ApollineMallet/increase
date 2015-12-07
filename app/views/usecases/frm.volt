	{{ form("UseCases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Modifiez les Usecases</legend>
{% for a in usecase %}
<div class="alert alert-info">Modification de la Usecase : {{a.getNom()}}</div>

<div class="form-group">
	<label></label><input type="hidden" name="code" id="code" value="{{a.getCode()}}">
	<label></label><input type="hidden" name="idProjet" id="idProjet" value="{{a.getIdProjet()}}">
	<label>Changez le libelle :</label><input type="text" name="nom" id="nom" value="{{a.getNom()}}" placeholder="Entrez le nom" class="form-control"><br>
	<label>Changez le poids :</label><input type="text" name="poids" id="poids" value="{{a.getPoids()}}" placeholder="Entrez le poids" class="form-control">
	<label for="identite">Changez l'utilisateur</label>
	<select class="form-control" id="idDev" name="idDev">
		  {% for u in users %}
		    <option value="{{u.getId()}}">{{u.getIdentite()}} :  {{u.getId()}}</option>
		  {% endfor%}
	</select>


 	<div class="form-group">
		<input type="submit" value="Valider" class="btn btn-default validate">
		<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
	</div>
	
</div>

{% endfor %}

</fieldset>
</form>
{{ script_foot }}