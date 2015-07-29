$(document).on('submit', '.noteForm', function(){
	$.post(
		"/notes_controller/create",
		$('form.noteForm').serialize(),
		function(return_data){
			$('.notes').prepend(
					'<div class="col-sm-6">'+
						'<div class="panel panel-info">'+
							'<div class="panel-heading">'+
								'<h3 class="panel-title">'+$('input#inputTitle').val()+'</h3>'+
							'</div>'+
							'<div class="panel-body">'+
								$('input#inputDescription').val()+
							'</div>'+
						'</div>'+
					'</div>'
				);
			$('.noteForm')[0].reset();
		},
		'json'
	);
	return false;
});

$(document).on('submit', 'form.deleteForm', function(){
	$(this).parent().parent().remove();
	$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				console.log(data + " Deleted");
				location.reload(true);
			},
			"json"
		);
	return false;
});