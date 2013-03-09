<section>
    <div style="width:100%; text-align: center;">
        <h3>BC Skills is a <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">BC CSS project</a> with contributions from Alan Lin, Ron Radu, Matt Keemon, Kevin Lamb, and Peter Casinelli.</h3>
    </div>
</section>
<script type="text/javascript"> var Settings = {base_url: '<?= base_url(); ?>'}</script>
<script type="text/javascript"> var SkillsSettings = {startValues : '<?= (isset($preFill)) ? $preFill : ""; ?>'}</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo asset_url() ?>/js/script.js" type="text/javascript"></script>
<script src="<?php echo asset_url() ?>/js/tipsy.js" type="text/javascript"></script>
<script src="<?php echo asset_url(); ?>/js/jquery.autoSuggest.js" type="text/javascript"></script>
<script src="<?php echo asset_url(); ?>/js/slides.min.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>/js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>/js/typeahead/typeahead.min.js"></script>
<?php if (!empty($profile_missing)): ?>
	<script type="text/javascript" src="<?php echo asset_url(); ?>/js/profileSuggest.js"></script>
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

        var skills_config = {
            searchObjProps: "name",
            selectedItemProp: "name",
            selectedValuesProp: "name",
            minChars: 2,
            matchCase: false
        };
        if(SkillsSettings.startValues){
            skills_config.preFill = SkillsSettings.startValues;
        }else{
            skills_config.startText = "Enter your skills here";
        }
        $("#skills").autoSuggest(Settings.base_url + 'index.php/student/autosuggest_skills', skills_config);
        $("#edit-profile [title]").tipsy({trigger:"focus", gravity:"w"});

        $(".bio_more").click(function() {
            $(this).parent().children(".bio_rest").css("display", "inline");
            $(this).remove();
        });

        $('.typeahead').typeahead({
            name: 'languages',
            local: [
                "PHP",
                "JavaScript",
                "Python",
                "HTML",
                "CSS",
                "Java",
                "Haskell",
                "OCaml",
                "Ruby",
                "Scala",
                ".NET"
            ]
        });

        <?php if ($join_a_team){ ?>
        $("#join-a-team").tipsy({gravity:"n"});
        <?php } ?>

        <?php if ($get_in_touch){ ?>
        $(".get-in-touch").tipsy({gravity:"n"});
        <?php } ?>

	});
</script>

<script src="<?php echo asset_url(); ?>/js/gcharts/skills_barchart.js" type="text/javascript"></script>
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