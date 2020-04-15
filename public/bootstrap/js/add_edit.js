$(document).ready(function(){
	$('#add').click(function(){
		$('.form-add').slideDown();
	})
	$('#cancel').click(function(){
		$('.form-add').slideUp();
	})
	$('.edit-btn').click(function(){
		id = $(this).data('id');
		email = $(this).data('email');
		level = $(this).data('level');
		$('#id').val(id);
		$('#edit-email').val(email);
		$('#edit-level').val(level);
		$('.form-edit').slideDown();
	})
	$('#cancel-edit').click(function(){
		$('.form-edit').slideUp();
	})
})

