<div style='border: 1px solid #5B81D8; border-radius: 2px;'>
	<h4
		style='background-color: #A3C0FF; margin: 0px; padding: 10px 0 10px 15px;'>
		<span class="glyphicon glyphicon-envelope"></span> {{nbmsg}} Messages
	</h4>

	{% for x in msg %}
	<div style="padding-bottom: 5px; background-color: {{color[x.getId()]}}">
		<a data-id="{{x.getId()}}" class="btn messagefil" style="font-weight: bold; display: block; text-align: left; padding: 0px 0px 0px 40px; line-height: 30px;" data-ajax='{{"/projects/messagefil/" ~ x.getId()}}'>
			{{user[x.getId()]}} - {{x.getObjet()}}
			<div style="float: right; padding-right: 40px;">
				{{x.getDate()}}
			</div>
		</a>
		<div id='message{{x.getId()}}' class='' style='padding: 0px;'></div>
	</div>
	{% endfor %}
	
</div>

<div id='btnMess' class="btn" style='float:right; margin-top: 20px; border:1px solid #5B81D8; width:35%; display:inline-block; border-radius:2px; background-color:#A3C0FF; cursor:pointer;' data-ajax='{{"/messages/newmessage/" ~ idpjt}}'>
	<h4 style='margin:0px; padding:0px;'>
		<span class="glyphicon glyphicon-plus"></span> Nouveau message
	</h4>
</div>

<div id='newmessage' style='padding:0px; margin-top:75px;'></div>

{{script_foot}}
