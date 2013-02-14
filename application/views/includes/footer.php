<section>
    <div style="width:100%; text-align: center;">
        <h3>BC Skills is a <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">BC CSS project</a> with contributions from Alan Lin, Ron Radu, Matt Keemon, Kevin Lamb, and Peter Casinelli.</h3>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/script.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/tipsy.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autoSuggest.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.leanModal.min.js"></script>
<?php if (!empty($jquery)): ?>
<script type="text/javascript">
        <?php echo $jquery; ?>
</script>
<?php endif; ?>

 <script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      
	  //define chart and data in map to avoid name clashing.	
	  var g_map = {
	  	chart: "",
	  	data: ""
	  }	
      
      //set the drawChart function to be called on load.
      function drawChart() {
      	var jsonData = $.ajax({
          url: "<?php echo base_url(); ?>explore/get_skill_distribution",
          dataType:"json",
          async: false
          }).responseText;
          
		var parsed_json = jQuery.parseJSON(jsonData);
        g_map.data = google.visualization.arrayToDataTable(parsed_json);
        
        //set char options
        var options = {
          title: 'Skills',
        };

        g_map.chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        g_map.chart.draw(g_map.data, options);
        
        //set handler for redirects
        google.visualization.events.addListener(g_map.chart, 'select', selectHandler);
      };
      
      function selectHandler() {
		  var selection = g_map.chart.getSelection();
		  var message = '';
		  for (var i = 0; i < selection.length; i++) {
		    var item = selection[i];
			//var haha = g_map.data.getFormattedValue(item.row, item.column);
			var skill = g_map.data.getFormattedValue(item.row, 0);
			window.location = 'student/search/' + skill;
		  }
		}
    </script>
<!-- Google Analysitcs -->
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-34569178-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>
</html>