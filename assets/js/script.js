function toggleExpand(id) {
	$('#item'+id).slideToggle();
	if($('#expand'+id).html()=='Collapse') {
		$('#expand'+id).html('Expand Profile');
	} else {
		$('#expand'+id).html('Collapse');
	}
}

$(function() {
	$('#edit-profile [title]').tipsy({trigger:'focus', gravity:'w'});
});