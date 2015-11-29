<div style='border-bottom:1px solid #5B81D8; border-right:1px solid #5B81D8; border-left:1px solid #5B81D8; border-bottom-left-radius:2px; border-bottom-right-radius:2px; '>

{% for x in dev %}
	<div>
		<div style="line-height:30px; padding-left:40px; background-color:{{color[x]}};">
			{{x}}
			[{{poid[x]}}]
		</div>
	</div>
{% endfor %}

</div>