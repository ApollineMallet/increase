{{ form("Messages/update", "method": "post", "name":"frmObject", "id":"frmObject") }}

<div style="border: 1px solid #5B81D8; border-radius: 2px;">
	<form class="form-inline">
		<fieldset>
			<input type="text" required="required" name="objet" id="objet" placeholder="Objet" class="form-control"	style="border-radius: 2px; width:100%;">
			<textarea placeholder=" Contenue..." name="content" id="content" required="required" style="width: 100%; max-width: 100%; border-radius: 2px;"></textarea>
				
			<input type="hidden" name="date" id="date" value="{{today}}">
			<input type="hidden" name="idProjet" id="idProjet" value="{{id}}">
			<input type="hidden" name="idUser" id="idUser" value="1">
			
			<input type="text" name="idFil" id="idFil" value="{{user}}">
			
			<div class="form-group">
				<input type="submit" value="Valider" class="btn btn-default validate" style='margin-top: 25px; border: 1px solid #5B81D8; width: 100%; display: block; border-radius: 2px; background-color: #A3C0FF; cursor: pointer;'>
			</div>
		</fieldset>
	</form>
</div>