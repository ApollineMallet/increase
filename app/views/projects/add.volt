<script type="text/javascript">
$('#myForm').validator()
</script>

	{{ form("projects/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	
		<div class="card">  
<fieldset>
		
		<legend>Ajoutez un projet</legend>
	
		<div class="alert alert-info">Ajout d'un projet</div>

<form id="myForm" role="form" data-toggle="validator">
		<input type="hidden" name="id" id="id">	
		<label>Nom</label><input type="text" required name="nom" id="nom" placeholder="Saisissez un nom" class="form-control"/><br>
		<label>Description :</label><input type="text" required" name="description" id="description" placeholder="Saisissez une description" class="form-control"/><br>
				
		
		   


		<div class="form-group">
		 		<label for="identite">Ajoutez l'utilisateur</label>
		 		
				<select class="form-control" id="idDev" name="idDev">
				  {% for u in users %}
				    <option value="{{u.getId()}}">{{u.getIdentite()}} :  {{u.getId()}}</option>
				  {% endfor%}
				</select>
		</div>
		
		<div class="form-group">
		
		
	<input type="hidden" name="dateLancement"
		id="dateLancement" value={{today}} class="form-control disabled">
		
		<label>Date finale du projet :</label><input type="date" name="dateFinPrevue"
		id="dateFinPrevue" value={{today}} class="form-control disabled"><br>
		
		 		
				
		</div>
		

		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-primary validate">
			<a class="btn btn-default cancel" href="{{url.get("Index")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>


</fieldset>
</div>
</form>
{{ script_foot }}
