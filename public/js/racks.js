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
            $('#myModalLabel').html('Add New Rack');
			$('#name').val('');
			$('#rack_id').val('');
            break;
        case 'edit':
            $('#myModalLabel').html('Edit Rack');
			$('#rack_id').val(id);
			var row = $("tr#rack-row-"+id);
			$('#name').val(row.find("td:nth-child(1)").html());
			var status = row.find("td:nth-child(2)").find('span').html();
			$("#status option").filter(function() {
				return this.text == status; 
			}).attr('selected', true);
            break;
        default:
            break;
    }
    $('#myModal').modal('show');
}

function saveRack()
{
    var id = $('#rack_id').val();
    var url = path + 'racks';
    if (id){
            url += "/" + id;
    }
    $.ajax({
            type: 'post',
            url: url,
            data: $('#frmRack').serialize(),
            success: function(response) {
                if(response)
                {
                    alert(response);
                }
                else
                {
                	window.location = path + 'racks';
                }
            }
        });
    return false;
}

function delRack(id)
{
	var isConfirmDelete = confirm('Are you sure you want to delete this rack?');
    if (isConfirmDelete)
	{
		$.ajax({
				type: 'post',
				url: path + 'delrack',
				data: {
						  'id': id
				},
				success: function(data) {
                    window.location = path + 'racks';
				}
		});
	} 
	else {
    	return false;
    }
}