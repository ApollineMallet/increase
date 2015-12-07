 {{ form("UsesCases/insert", "method": "post", "name":"frmObject",
"id":"frmObject") }}
<fieldset>

	<legend>Ajoutez une Usecase</legend>

	<div class="alert alert-info">Ajout d'une Usecase</div>



	<input type="hidden" name="id" id="id"> <label>Nom</label><input
		type="text" required="required" name="libelle" id="libelle"
		placeholder="Saisissez un nom" class="form-control"><br>
	<label>Poids de la Usecase :</label><input type="text"
		required="required" name="poids" id="poids"
		placeholder="Saisissez un poids" class="form-control">

	<form class="form-inline">
		<div class="form-group disabled	">
			<br> <label class="sr-only" for="avancement"></label>
			<div class="input-group">
				<div disabled class="input-group-addon">Avancement :</div>
				<input type="text" class="form-control" id="avancement"
					name="avancement" value="0" placeholder="0% d'avancement">

			</div>
		</div>

	</form>

	<div class="form-group">
		<label for="sel1">Attribution de l'utilisateur :</label> <select
			class="form-control" id="idDev" name="idDev"> {% for u in
			users %}
			<option>{{u.getIdentite()}}</option> {% endfor%}
		</select>
	</div>

	</div>
	<div class="form-group">
		<input type="submit" value="Valider" class="btn btn-primary validate">
		<a class="btn btn-default cancel" href="{{url.get("
			Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
	</div>


</fieldset>
</form>
{{ script_foot }}
