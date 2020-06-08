
$(document).ready(function() {
  	$("#checkAll").click(function() {
    		$(".checkSingle").prop("checked", this.checked);
  	});
});

//String to Slug
  $(document).ready( function() {
	$("#title").stringToSlug({
		setEvents: 'keyup keydown blur',
		getPut: '#slug',
		space: '-'
	});
});