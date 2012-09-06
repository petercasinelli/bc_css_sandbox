<section>
    <div style="width:100%; text-align: center;">
        <h3>BC Skills is a <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">BC CSS project</a> with contributions from Alan Lin, Matt Keemon, Kevin Lamb, and Peter Casinelli.</h3>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/script.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/tipsy.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autoSuggest.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js" type="text/javascript"></script>
<?php if (!empty($jquery)): ?>
<script type="text/javascript">
        <?php echo $jquery; ?>
</script>
<?php endif; ?>
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