@include('admin.headers.top')
@include('admin.headers.sidebar')

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    /* Ensure the message column wraps */
    td:nth-child(5) {
        white-space: normal; /* Allow text to wrap */
        word-wrap: break-word; /* Prevent text overflow */
        max-width: 300px; /* Optional: restrict max width */
        height: auto; /* Ensure height adjusts based on content */
    }

    /* Adjust table layout for better responsiveness */
    th {
        background-color:rgb(244, 244, 244);
    }

    td:nth-child(2), th:nth-child(2) {
        width: 200px; /* Adjust width for Name column */
    }

    td:nth-child(3), th:nth-child(3) {
        width: 250px; /* Adjust width for Email column */
    }

    /* Ensure message content wraps on smaller screens */
    @media screen and (max-width: 600px) {
        td:nth-child(5) {
            width: 100%; /* Make sure the message column takes up full width */
        }

        table.dataTable {
            table-layout: auto;
        }
    }

    table.dataTable {
        /* Enable dynamic table resizing */
        table-layout: auto;
        width: 100%;
    }

     .filter {
            margin-bottom: 15px;
        }

    .status-btn {
        padding: 5px 10px;
        cursor: pointer;
        border: none;
        border-radius: 3px;
    }

    .pending {
        background-color: #4caf50;
        color: white;
    }

    .done {
        background-color:rgb(236, 182, 4);
        color: white;
    }

    .done-entry{
        color: green;
        display: none;
    }
</style>


<div class="container">
    <h2 class="brand">Enquiry Form Data</h2>
    <table id="enquiryTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date Submitted</th>
                <th>Status</th>
                <th>Change Status</th>

            </tr>
        </thead>
        <tbody>
              @foreach ($enquiries as $enquiry)
                <tr class="{{ $enquiry->type == 'done' ? 'done-entry' : '' }}">
                    <td>{{ $enquiry->id }}</td>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->phone_number }}</td>
                    <td>{{ $enquiry->message }}</td>
                    <td>{{ $enquiry->created_at->format('Y-m-d') }}</td>
                    <td>{{ $enquiry->type }}</td>
                    <td>
                        @if ($enquiry->type == 'pending')
                            <button class="status-btn pending" data-id="{{ $enquiry->id }}" data-status="done">Done</button>
                        @else
                            <button class="status-btn done" data-id="{{ $enquiry->id }}" data-status="pending">Pending</button>
                        @endif
                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>
</div>



<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#enquiryTable').DataTable({
            responsive: true,
            // Optional: Enable filtering for each column, if needed
            columnDefs: [
                {
                    targets: 4, /* The "Message" column */
                    className: 'word-wrap', /* Apply a custom class to this column */
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<div style="word-wrap: break-word; white-space: normal;">' + data + '</div>';
                        }
                        return data; // Keep the data as it is for other types
                    }
                }
            ],
        
        });

        // Handle status button click (Pending / done)
        $(document).on('click', '.status-btn', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            
            // Update the status in the table row (without refreshing)
            $(this).closest('tr').toggleClass('done', status === 'done');
            $(this).data('status', status === 'pending' ? 'done' : 'pending');
            $(this).text(status === 'pending' ? 'done' : 'Pending');
            $(this).toggleClass('pending done');

            // AJAX request to update status in the database
            $.ajax({
                url: '/update-status',  // Define the route for updating the status
                method: 'POST',
                data: {
                    id: id,
                    status: status,
                    _token: '{{ csrf_token() }}'  // Add CSRF token for security
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: 'The enquiry status has been updated successfully.',
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'There was an error updating the status.',
                    });
                }
            });
        });

        // Optional: Add filter for showing only done entries
        $('#statusFilter').on('change', function() {
            var selectedStatus = $(this).val();

            // Filter rows based on status class (done / pending)
            table.rows().every(function() {
                var row = this.node();
                if (selectedStatus === 'all') {
                    $(row).show();
                } else if ($(row).hasClass(selectedStatus)) {
                    $(row).show();
                } else {
                    $(row).hide();
                }
            });
        });
    });
</script>
@include('admin.footers.dependency')

