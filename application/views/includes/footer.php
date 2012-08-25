<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/script.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/tipsy.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$("#skills").autoSuggest("<?php echo base_url();?>index.php/student/autosuggest_skills", {selectedItemProp: "name", searchObjProps: "name",minChars: 2, matchCase: false});
	});
</script>
<!-- Google Analysitcs -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30238728-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>