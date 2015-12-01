	{{ form("Tache/insert", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Visualisation d'une tâche</legend>
{% for a in taches %}
<div class="alert alert-info">Visualisation de la tâche : {{a.getLibelle()}} | {{a.getCodeUseCase()}}</div>

<div class="form-group">
		<input type="hidden" name="id" id="id">
	
<td style="vertical-align:middle; width:56%;">
					{{progressbar[a.getId()]}}
			</td>

<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}