<script type="text/javascript">
$('#myForm').validator()
</script>
{{ form("UseCases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>
	<div class="card">
	 	
		<legend>Ajoutez une Usecase</legend>
	
		<div class="alert alert-info">Ajout d'une Usecase</div>

<form id="myForm" role="form" data-toggle="validator">
		<label>Code Usecase</label><input type="text" required="required" name="code" id="code" placeholder="X-UC-Y" class="form-control" value=""/><br>
	 
		<label>Nom</label><input type="text" required="required" name="nom" id="nom" placeholder="Saisissez un nom" class="form-control"/><br>
		<label>Poids de la Usecase :</label><input type="text" required="required" name="poids" pattern="[0-9]{1,2}" id="poids" placeholder="Saisissez un poids" class="form-control"/>
				
			<form class="form-inline">
		  		<div class="form-group"><br>
		    		<label class="sr-only" for="avancement"></label>
		    		<div class="input-group">
		    		<div disabled class="input-group-addon">Avancement :</div>
		   		 	<input type="text" class="form-control" id="avancement" name="avancement" value="0" pattern="[0-9]{1,2}" placeholder="0% d'avancement"/>
		   		</div>
		   	</form>
		   
</div>

		<div class="form-group">
		 		<label for="identite">Ajouter l'utilisateur</label>
		 		
				<select class="form-control" id="idDev" name="idDev">
				  {% for u in users %}
				    <option value="{{u.getId()}}">{{u.getIdentite()}} :  {{u.getId()}}</option>
				  {% endfor%}
				</select>
		</div>
		
		<div class="form-group">
		 		<label for="identite">Ajouter le projet</label>
		 		
				<select class="form-control" id="idProjet" name="idProjet">
				
				 	 {% for p in projet %}
				    <option value="{{p.getId()}}">{{p.getNom()}} :  {{p.getId()}}</option>
				  	 {% endfor%}
				
				</select>
				
		</div>
		

		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-primary validate">
			<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
</div>

</fieldset>
</form>
{{ script_foot }}
