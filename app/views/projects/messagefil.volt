{{ form("Messages/update", "method": "post", "name":"frmObject",
"id":"frmObject") }}

<div style="padding: 0px 40px 10px 40px;">
	{{content}} <a class="btn"
		style='margin-top: 25px; border: 1px solid #5B81D8; width: 15%; display: block; border-radius: 2px; background-color: #A3C0FF; cursor: pointer;'>
		<h4 style='margin: 0px; padding: 0px;'>Repondre</h4>
	</a>

	<div style="padding: 20px 0px 10px 80px; display: block;">
		{% for o in msgfil %}

		<div style="font-weight: bold; line-height: 30px;">
			{{user[o.getIdUser()]}} - {{o.getObjet()}}

			<div style="float: right;">{{o.getDate()}}</div>

		</div>

		<div style="padding-bottom: 20px">{{o.getContent()}}</div>

		{% endfor %}



		<form class="form-inline" >
			<fieldset>
				<input type="text" required="required" name="objet" id="objet"
					placeholder="Objet" class="form-control"
					style="border-radius: 2px;">
				<textarea placeholder=" Contenue..." name="content" id="content"
					required="required"
					style="width: 100%; max-width: 100%; border-radius: 2px;"></textarea>
					
				<input type="hidden" name="date" id="date" value="{{today}}">
				<input type="hidden" name="idFil" id="idFil" value="2">
				<input type="hidden" name="idProjet" id="idProjet" value="1">
				<input type="hidden" name="idUser" id="idUser" value="1">
				
				<div class="form-group">
					<input type="submit" value="Valider"
						class="btn btn-default validate"
						style='margin-top: 25px; border: 1px solid #5B81D8; width: 15%; display: block; border-radius: 2px; background-color: #A3C0FF; cursor: pointer;'>
				</div>
			</fieldset>
		</form>


	</div>

</div>