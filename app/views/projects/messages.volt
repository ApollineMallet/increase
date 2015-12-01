<div style='border:1px solid #5B81D8; border-radius:2px; '>
<h4 style='background-color:#A3C0FF; margin:0px; padding:10px 0 10px 15px;'>
	{{nbmsg}} Messages
</h4>
		
{% for x in msg %}
	<div style="line-height:30px; padding-left:40px; background-color:{{color[x.getId()]}};">
		{{user[x.getId()]}}
		-
		{{x.getObjet()}}
		<div style="float:right; padding-right:40px;">
			{{x.getDate()}}
		</div>
	</div>
{% endfor %}
</div>

<div id='btnMessages' class="btn" style='float:right; margin-top:20px; border:1px solid #5B81D8; width:35%; display:inline-block; border-radius:2px; background-color:#A3C0FF; cursor:pointer;'>
			<h4 style='margin:0px; padding:0px;'>
				+ Nouveau message
			</h4>
</div>
