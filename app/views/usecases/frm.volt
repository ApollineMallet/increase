	{{ form("UseCases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>

<legend>Modifiez une Usecase</legend>
{% for a in usecase %}
<div class="alert alert-info">Modification de la Usecase : {{a.getCode()}}</div>
<div class="alert alert-info">Modification de la Usecase : {{avancementUC}}</div>

<div class="form-group">
	<label></label><input type="hidden" name="code" id="code" value="{{a.getCode()}}">
	<label>Changez le nom :</label><input type="text" name="nom" id="nom" value="{{a.getNom()}}" placeholder="Entrez le nom" class="form-control"><br>
	<label>Changez les utilisateurs : </label>
	<div class="form-group">
	
  	<select class="form-control" value="" id="identite" name="identite">
  
    <option value="{{a.getUser().getIdentite()}}">{{a.getUser().getIdentite()}}</option>
	
  </select>
</div>
<div class="form-group">
<label>Changez le poids :</label><input type="text" name="poids" id="poids" value="{{a.getPoids()}}" placeholder="Entrez le poids" class="form-control"><br>

</div>
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
{% endfor %}

</fieldset>
</form>
{{ script_foot }}