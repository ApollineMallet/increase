 {{ form("Tache/insert", "method": "post", "name":"frmObject",
"id":"frmObject") }}
<fieldset>

	<legend>Ajoutez une tâche</legend>

	<div class="alert alert-info">Ajout d'une tâche</div>



	<input type="hidden" name="id" id="id"> <label>Libellé</label><input
		type="text" required="required" name="libelle" id="libelle"
		placeholder="Saisissez le libellé" class="form-control"><br>
	<label>Date de début de tâche</label><input type="date" name="date"
		id="date" value={{today}} class="form-control disabled"><br>

	<form class="form-inline">
		<div class="form-group disabled	">
			<label class="sr-only" for="poids"></label>
			<div class="input-group">
				<div disabled class="input-group-addon">Avancement :</div>

				<input type="text" class="form-control" id="avancement"
					name="avancement" value="0" placeholder="0% d'avancement">
				<div disabled class="input-group-addon">%</div>

			</div>
		</div>

	</form>

	<div class="form-group">
		<label for="sel1">D�finir le Usecase</label> <select
			class="form-control" id="codeUseCase" name="codeUseCase"> {%
			for u in usecases %}
			<option>{{u.getCode()}} : {{u.getNom()}}</option> {% endfor%}
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
