<h4> Utilisateur </h4>

Modification du rôle d'utilisateur : <br /> <br />

{{ form("Acl/updaterole", "method": "post", "name":"frmObject","id":"frmObject") }}
	Utilisateur : <br />
	<select name="utilisateurs">
		{% for user in users %}
		<option value='{{user}}'>{{user}}</option>
		{% endfor %}
	</select> <br /> <br />
	
	{% set roleUser=user.getRole() %}
	
	Rôle : <br />
	{% for role in roles %}
		{% if roleUser==role.getId() %}
			<input type="radio" name="role" value="{{role.getLibelle()}}" checked> {{role.getLibelle()}}
		{% else %}
			<input type="radio" name="role" value="{{role.getLibelle()}}"> {{role.getLibelle()}}
		{% endif %}
	{% endfor %}
</form>