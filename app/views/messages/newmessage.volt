{{ form("Messages/update", "method": "post", "name":"frmMessage", "id":"frmMessage") }}

<div class="detailsprojet cinquante">
	<h4 class="new">
		Nouveau message
	</h4>

	<form class="form-inline">
		<fieldset>
			<input type="text" required="required" name="objet" id="objet" placeholder="Objet" class="form-control">
			<textarea placeholder=" Contenu..." name="content" id="content" class="ta" required="required"></textarea>
				
			<input type="hidden" name="date" id="date" value="{{today}}">
			<input type="hidden" name="idProjet" id="idProjet" value="{{id}}">
			<input type="hidden" name="idUser" id="idUser" value="{{user.getId()}}">
			
			
			<div class="form-group">
				{{q["btnValidate"]}}
			</div>
		</fieldset>
	</form>
</div>
{{script_foot}}