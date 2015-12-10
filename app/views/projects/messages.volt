<div class="detailsprojet">
	{% for x in msg %}
	
		<a data-id="{{x.getId()}}" class="btn messagefil msg" data-ajax='{{"/projects/messagefil/" ~ x.getId()}}'>
			<span class="glyphicon glyphicon-menu-down msg"></span> {{user[x.getId()]}} - {{x.getObjet()}}
			<div class="datemsg">
				{{x.getDate()}}
			</div>
		</a>
		<div id='message{{x.getId()}}'></div>
	
	{% endfor %}
	
</div>

<div id='btnMess' class="new" data-ajax='{{"/messages/newmessage/" ~ idpjt}}'>
	<h4>
		<span class="glyphicon glyphicon-plus"></span> Nouveau message
	</h4>
</div>

<div id='newmessage'></div>

{{script_foot}}
