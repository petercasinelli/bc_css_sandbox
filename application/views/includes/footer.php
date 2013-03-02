<section>
    <div style="width:100%; text-align: center;">
        <h3>BC Skills is a <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">BC CSS project</a> with contributions from Alan Lin, Ron Radu, Matt Keemon, Kevin Lamb, and Peter Casinelli.</h3>
    </div>
</section>
<script type="text/javascript"> var Settings = {base_url: '<?= base_url(); ?>'}</script>
<script type="text/javascript"> var SkillsSettings = {startValues : '<?= $preFill; ?>'}</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/script.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/tipsy.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autoSuggest.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.leanModal.min.js"></script>
<?php if (!empty($profile_missing)): ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profileSuggest.js"></script>
<?php endif; ?>

<script type="text/javascript">
	$(function() {
		$("#slides").slides({
			preload : true,
			preloadImage : "img/loading.gif",
			play : 5000,
			pause : 5000,
			hoverPause : true,
			paginationClass : "slide_pagination"
		});
	});

	$(function(){
		var skills_config = {
								searchObjProps: "name", 
								selectedItemProp: "name", 
								selectedValuesProp: "name", 
								minChars: 1, 
								matchCase: false
						};
							
		if(SkillsSettings.startValues)
			skills_config.preFill = SkillsSettings.startValues;
		else
			skills_config.startText = "Enter your skills here";
			
		$("#skills").autoSuggest(Settings.base_url + 'index.php/student/autosuggest_skills', skills_config);
		$("#edit-profile [title]").tipsy({trigger:"focus", gravity:"w"});
	});
	
</script>
<script src="<?php echo base_url(); ?>assets/js/gcharts/skills_barchart.js" type="text/javascript"></script>
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