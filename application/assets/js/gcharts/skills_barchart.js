google.load("visualization", "1", {
	packages : ["corechart"]
});

google.setOnLoadCallback(drawChart);

//define chart and data in map to avoid name clashing.
var g_map = {
	chart : "",
	data : ""
}

//set the drawChart function to be called on load.
function drawChart() {
	var jsonData = $.ajax({
		url : Settings.base_url + "explore/get_skill_distribution",
		dataType : "json",
		async : false
	}).responseText;

	var parsed_json = jQuery.parseJSON(jsonData);
	g_map.data = google.visualization.arrayToDataTable(parsed_json);

	//set char options
	var options = {
		title : 'Programming Languages',
		backgroundColor : '#f4f4f4'
	};

	g_map.chart = new google.visualization.BarChart(document.getElementById('chart_div'));
	g_map.chart.draw(g_map.data, options);

	//set handler for redirects
	google.visualization.events.addListener(g_map.chart, 'select', selectHandler);
};

function selectHandler() {
	var selection = g_map.chart.getSelection();
	var message = '';
	for(var i = 0; i < selection.length; i++) {
		var item = selection[i];
		//var haha = g_map.data.getFormattedValue(item.row, item.column);
		var skill = g_map.data.getFormattedValue(item.row, 0);
		window.location = 'student/search/' + skill;
	}
}
