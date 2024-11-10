<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Users Table</h2>
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>ID_USER</th>
                    <th>NAMA_USER</th>
                    <th>email</th>
                    <th>USERNAME</th>
                    <th>ID_JENIS_USER</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.data') !!}',
                columns: [
                    { data: 'ID_USER', name: 'ID_USER' },
                    { data: 'NAMA_USER', name: 'NAMA_USER' },
                    { data: 'email', name: 'email' },
                    { data: 'USERNAME', name: 'USERNAME' },
                    { data: 'ID_JENIS_USER', name: 'ID_JENIS_USER' },
                ]
            });
        });
    </script>
</body>
</html>
