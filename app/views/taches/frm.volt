	{{ form("Taches/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Modifiez les taches</legend>
{% for a in tache %}
<div class="alert alert-info">Modification de la tache : {{a.getLibelle()}}</div>

<div class="form-group">
	<label></label><input type="hidden" name="id" id="id" value="{{a.getId()}}">
	<label>Changez le libelle :</label><input type="text" name="libelle" id="libelle" value="{{a.getLibelle()}}" placeholder="Entrez le libelle" class="form-control"><br>
	<label>Changez la date :</label><input type="date" name="date" id="date" value="{{a.getDate()}}" placeholder="Entrez le libelle" class="form-control"><br>
	<label>Changez l'avancement (en %) :</label><input type="text" name="avancement" id="avancement" value="{{a.getAvancement()}}" placeholder="Changez l'avancement" class="form-control"><br>
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}