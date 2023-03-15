// Initialize datatables
$('#user-request-div').hide();

function showDatatable()  { $('#user-request-div').show(); }
function closeDatatable() { $('#user-request-div').hide(); }

// Table content function
requestTable();

function requestTable()
{
    // Select table by ID
	var table = $('#user-request-table').DataTable(
	{
        // Send the data by POST from the back-end (Contoller Datatable and method userRequest) and fill the table with it
		ajax:
		{
			method: "POST",
			url: request_table_url,
		},

        // General configurations
		scrollX: false,
        searching: false,
		paging: true,
		select: true,
		pageLength: 5,
		dom: 'frtip',

        // Database columns in their respective columns
		columns:
		[
			{data:  "REQUEST_ID"},
			{data:  "NAME"},
			{data:  "ID_CARD"},
			{data:  "USER_ROLE"},
			{data:  "EMAIL"},
            {data:  "REQUEST_DATE"},
            {text:  ""}
		],

        // Specific column not in database
		columnDefs: 
		[{
			targets: -1,
			data: null,
			defaultContent: '<button class="btn bg-navy"><i class="fa-duotone fa-pen-to-square"></i></button>',
		}]
	});

    // on click function: when the user clicks on 'Responder' call the respective function with row's data
    // This functions is in the file 'user-request-form.js'
	$('#user-request-table tbody').on('click', 'button', function () 
	{
		var data = table.row($(this).parents('tr')).data();
		requestForm(true, data)
	});
}