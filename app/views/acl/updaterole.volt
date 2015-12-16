{{ form("users/updaterole", "method": "post", "name":"frmObject","id":"frmObject") }}
		
	<h3> Administrateurs </h3>
		{% for admin in admins %}
			
			<input type="checkbox" name="id[]" value="{{admin.getId()}}" id="id-admins" data-ajax="Acl/formulairerole"> {{admin}} <br />
		{% endfor %}
		
	<h3> Auteurs </h3>
		{% for author in authors %}
			
			<input type="checkbox" name="id[]" value="{{author.getId()}}"  id="id-auteurs" data-ajax="Acl/formulairerole"> {{author}} <br />
		{% endfor %}
	
	
	<h3> Utilisateurs </h3>
		{% for util in utils %}
			
			<input type="checkbox" name="id[]" value="{{util.getId()}}"  id="id-users" data-ajax="Acl/formulairerole"> {{util}} <br />
		{% endfor %}
	
	
	<div id="formrole" style="display:none">
		
		<h3>Modification du rôle : </h3> 
		{% for role in roles %}
			<input type= "radio" id="role" name="role" value="{{role.getId()}}"> {{role.getLibelle()}} 
		{% endfor %}
		<br/>
		<br/>
		<button type="submit" class='btn btn-primary add' data-ajax="{{url.get("Acl/index")}}"> Modifier </button>
	</div>

</form>
			
{{script_foot}}
