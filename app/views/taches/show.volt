	{{ form("Tache/insert", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Visualisation d'une tâche</legend>
{% for a in taches %}
<div class="alert alert-info">Visualisation de la tâche : {{a.getLibelle()}} | {{a.getCodeUseCase()}}</div>

<div class="form-group" required>
		<input type="hidden" name="id" id="id">
	<label>Libellé :</label><input type="text" required="required" name="libelle" id="libelle" placeholder="Saisissez le libellé" class="form-control"><br>
	<label>Date de début de tache :</label><input type="date" name="date" id="date" value="" placeholder="Entrez la date" class="form-control"><br>
	<label>Poids (en %) :</label><input type="text" name="poids" id="poids" value="" placeholder="Saisissez le poids" class="form-control">
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}