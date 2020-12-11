$('.boxaccess').on('click', function () {
	const role_id = $(this).data('role');
	const menu_id = $(this).data('id');

	$.ajax({
		url: '',
		method: 'post',
		data: {
			role_id: role_id,
			menu_id: menu_id
		},
		success: function () {
			document.location.href = '';
		}

	});

});

$('.ubahSekolah').on('click', function () {

	const id = $(this).data('id');

	$.ajax({
		url: '',
		data: {
			id: id
		},
		dataType: 'json',
		method: 'post',
		success: function (data) {

			$('.identitas_model #id_sekolah').val(id);
			$('.identitas_model #nama_sekolah').val(data.nama_sekolah);
			$('.identitas_model #alamat_sekolah').val(data.alamat_sekolah);
			$('.identitas_model #email_sekolah').val(data.email_sekolah);
			$('.identitas_model #telepon_sekolah').val(data.telepon_sekolah);
		}
	});
});
