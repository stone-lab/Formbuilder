function showEditTextarea(locale){
	$('#render_edited_' + locale).val($('#render_shortcode_' + locale).val());
	$('#content_edited_' + locale).show();
}