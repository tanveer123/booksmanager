$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function toggle(modalstate, id)
{
    $('.form-group').removeClass('has-error');
    switch (modalstate) {
        case 'add':
            $('#myModalLabel').html('Add New Book');
            $('#title').val('');
            $('#racks').val('');
            $('#pub_year').val('');
            $('#book_id').val('');
            $('#author').val('');
            break;
        case 'edit':
            $('#myModalLabel').html('Edit Book');
            $.ajax({
                type: 'get',
                url: path + 'getbook',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#book_id').val(id);
                    $('#title').val(data.title);
                    $('#author').val(data.author);
                    $('#racks').val(data.rack_id);
                    $('#pub_year').val(data.pub_year);
                    $('#status').val(data.is_active);
                }
            });
            break;
        default:
            break;
    }
    $('#myModal').modal('show');
}

function saveBook()
{
    var id = $('#book_id').val();
    var url = path + 'books';
    if (id){
            url += "/" + id;
    }
    $.ajax({
            type: 'post',
            url: url,
            data: $('#frmBook').serialize(),
            success: function(response) {
                if(response)
                {
                    alert(response);
                }
                else
                {
                    window.location = path + 'books';
                }
            }
        });
    return false;
}

function delBook(id)
{
	var isConfirmDelete = confirm('Are you sure you want to delete this book?');
    if (isConfirmDelete)
	{
		$.ajax({
				type: 'post',
				url: path + 'delbook',
				data: {
						  'id': id
				},
				success: function(data) {
                    window.location = path + 'books';
				}
		});
	}
	else {
    	return false;
    }
}

