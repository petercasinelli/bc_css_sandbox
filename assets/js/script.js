function toggleExpand(id) {
	$('#item'+id).slideToggle();
	if($('#expand'+id).html()=='Collapse') {
		$('#expand'+id).html('Expand');
	} else {
		$('#expand'+id).html('Collapse');
	}
}