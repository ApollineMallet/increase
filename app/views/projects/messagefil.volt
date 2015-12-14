{{ form("Messages/update", "method": "post", "name":"frmMessage", "id":"frmMessage") }}

<div class="contenuMess">
	{{content}} 



	<div class="msgfill">
		{% for o in msgfil %}

		<div class="nameuseridfil">
			{{user[o.getIdUser()]}} - {{o.getObjet()}}

			<div class="datemsg">
				{{o.getDate()}}
			</div>

		</div>

		<div>
			{{o.getContent()}}
		</div>

		{% endfor %}

		<div id="messageAdded"></div>

	</div>
	<div class="formu">
		<form class="form-inline" >
			<fieldset>
				<input type="text" required="required" name="objet" id="objet" placeholder="Objet" class="form-control obj">
				<textarea placeholder=" Contenu..." name="content" id="content" class="contenuRepMess" required="required"></textarea>
					
				<input type="hidden" name="date" id="date" value="{{today}}">
				<input type="hidden" name="idFil" id="idFil" value="{{idmsgparent}}">
				<input type="hidden" name="idProjet" id="idProjet" value="{{idp}}">
				<input type="hidden" name="idUser" id="idUser" value="{{u.getId()}}">
				
				<div class="form-group">
				{{q["btnValidate"]}}
				</div>
			</fieldset>
		</form>
	</div>

	

</div>

{{script_foot}}