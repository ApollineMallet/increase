	{{ form("UseCases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Modifiez une Usecase</legend>
{% for a in usecase %}
<div class="alert alert-info">Modification de la Usecase : {{a.getCode()}}</div>

<div class="form-group">
	<label></label><input type="hidden" name="id" id="id" value="{{a.getId()}}">
	<label>Changez le nom :</label><input type="text" name="nom" id="nom" value="{{a.getNom()}}" placeholder="Entrez le nom" class="form-control"><br>
	<label>Changez les utilisateurs : </label>

	<div class="form-group">
  	<select class="form-control" id="identite" name="identite" value="">
  	{% for u in users %}
    <option>{{u.getIdentite()}}</option>
	{% endfor %}
  	</select>
	</div>

	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}