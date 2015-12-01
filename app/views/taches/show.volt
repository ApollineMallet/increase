	{{ form("Tache/insert", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Visualisation d'une tâche</legend>
{% for a in tache %}
<div class="alert alert-info">Visualisation de la tâche : {{a.getLibelle()}} | {{a.getCodeUseCase()}}</div>
<div class="form-inline">
<label>Avancement :</label>{{pb}}
</div>
<br>
<div class="form-group">
<label>Date de début de tâche :</label>
{{a.getDate()}}
</div>
<div class="form-group">
		<input type="hidden" name="id" id="id">

<td style="vertical-align:middle; width:56%;">	
			</td>
				
<div class="form-group">
	
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Retour</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}