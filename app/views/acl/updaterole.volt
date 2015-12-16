{{ form("Acl/update", "method": "post", "name":"frmObject","id":"frmObject") }}
		
	<h3> Administrateurs </h3>
		{% for admin in admins %}
			<input type="hidden" name="id" id="id" value="{{admin.getId()}}">
			<input type="checkbox" name="utilisateur" value="{{admin.getRole()}}" id="utilisateur-{{admin.getId()}}" data-ajax="Acl/formulairerole"> {{admin}} <br />
		{% endfor %}
		
	<h3> Auteurs </h3>
		{% for author in authors %}
			<input type="hidden" name="id" id="id" value="{{author.getId()}}">
			<input type="checkbox" name="utilisateur" value="{{author.getRole()}}"  id="utilisateur-{{author.getId()}}" data-ajax="Acl/formulairerole"> {{author}} <br />
		{% endfor %}
	
	
	<h3> Utilisateurs </h3>
		{% for util in utils %}
			<input type="hidden" name="id" id="id" value="{{util.getId()}}">
			<input type="checkbox" name="utilisateur" value="{{util.getRole()}}"  id="utilisateur-{{util.getId()}}" data-ajax="Acl/formulairerole"> {{util}} <br />
		{% endfor %}
	
	
	<div id="formrole" style="display:none">
		<br /> <br />
		Modification du rôle : <br />
		{% for role in roles %}
			<input type= "radio" name="role" value="{{role.getId()}}"> {{role.getLibelle()}} &nbsp
		{% endfor %}
		<button type="submit" class='btn btn-primary add' data-ajax="{{url.get("Acl/index")}}"> Modifier </button>
	</div>

</form>
			
{{script_foot}}
