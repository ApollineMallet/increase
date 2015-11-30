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

		<a id='equipe' style='border-top:1px solid #5B81D8; border-right:1px solid #5B81D8; border-left:1px solid #5B81D8; margin-top:20px; border-top-left-radius:2px; border-top-right-radius:2px; display:block; cursor:pointer;' data-ajax='{{"/projects/equipe/" ~ o.getId()}}'>
		
		<h4 style='background-color:#A3C0FF; margin:0px; padding:10px 0 10px 15px;'>
			Equipe
		</h4>
		</a>

		<div id='detailProject' style='padding:0px;'>
		</div>

		

	</div>
{% endfor %}

{{script_foot}}