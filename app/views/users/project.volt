{% for o in pro %}

	<div>	
		<div style='border:1px solid #5B81D8; margin:0px; background-color:#A3C0FF; padding:10px 0 10px 40px; border-radius:2px;'>
			<h3 style='margin:0px;'>
				{{o.getNom()}} [{{user.getIdentite()}}]
			</h3>
		</div>
		<div style='border:1px solid #5B81D8; margin-top:20px; border-radius:2px;'>
			<h4 style='background-color:#A3C0FF; margin:0px; padding:10px 0 10px 15px;'>
				Details du projet
			</h4>
			<div style='background-color:#E2ECFF; padding:10px 40px 10px 40px'>
				<h4 style='margin:0px;'>
					Description
				</h4>
				<p style='margin:0px; padding:5px 0px 15px;'>
					{{o.getDescription()}}
				</p>
				<div style='display:inline-block; width:40%;'>
					<h4 style='margin:0px;'>
						Date de lancement : {{o.getDateLancement()}}
					</h4>
				</div>
				<div style='display:inline-block; width:40%;'>
					<h4 style='margin:0px;'>
						Date de fin prevue : {{o.getDateFinPrevue()}}
					</h4>
				</div>

			</div>
		</div>
		
		<div style='border:1px solid #5B81D8; margin-top:20px; border-radius:2px; display:block;'>
			<a id='equipe' class="btn" style="display:block; padding:0px; text-align:left; border:none;" data-ajax='{{"/projects/equipe/" ~ o.getId()}}'>
				<h4 style='background-color:#A3C0FF; margin:0px; padding:10px 0 10px 15px;'>
					Equipe
				</h4>
			</a>

			<div id='detailProject' style='padding:0px;'></div>
		</div>
		
		<a id='btnMessages' class="btn" data-ajax='{{"/projects/messages/" ~ o.getId()}}' style='margin-top:20px; border:1px solid #5B81D8; width:35%; display:inline-block; border-radius:2px; background-color:#A3C0FF; cursor:pointer;'>
			<h4 style='margin:0px; padding:0px;'>
				<span class="glyphicon glyphicon-envelope"></span> {{nbmsg}} Messages...
			</h4>
		</a>
		<div id='divMessages' style='padding:0px; margin-top:10px;'></div>

	</div>
{% endfor %}

{{script_foot}}