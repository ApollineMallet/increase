<div>

	{% for x in dev %}
	<div
		style="line-height: 30px; padding-left: 40px; background-color: {{color[x]}};">
		{{x}} [{{poid[x]}}]</div>
	{% endfor %}

</div>