	{{ form("Taches/insert", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Ajouter une tache</legend>
{% for a in tache %}
<div class="alert alert-info">Modification de la tache : {{a.getLibelle()}}</div>

<div class="form-group">
	<input type="text" name="libelle" id="libelle" value="{{a.getLibelle()}}" placeholder="Entrez le libelle" class="form-control">
	<input type="date" name="date" id="date" value="{{a.getDate()}}" placeholder="Entrez le libelle" class="form-control">
	<input type="text" name="poids" id="poids" value="{{a.getAvancement()}}" placeholder="" class="form-control">




</div>

<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
