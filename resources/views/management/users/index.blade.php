@extends('layouts.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Users</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Users</li>
            </ol>
        </nav>
        </div>
    </div>

    <div class="widget-content searchable-container list">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search"
                  placeholder="Search Contacts..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div
              class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="{{ route('management.users.create') }}" id="btn-add-contact" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add User
              </a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table id="zero_config"
              class="table border table-striped table-bordered text-nowrap align-middle">
              <thead class="header-item">
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach($users as $user)
                <tr class="search-items">
                    <td>
                      <span class="usr-email-addr">{{ $user->ID_USER }}</span>
                    </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $user->NAMA_USER }}</h6>
                          <span class="user-work fs-3" data-occupation="Web Developer">{{ $user->JENIS_USER }}</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="usr-email-addr" data-email="adams@mail.com">{{ $user->NO_HP }}</span>
                  </td>
                  <td>
                    <span class="usr-location" data-location="Boston, USA">{{ $user->email }}</span>
                  </td>
                  <td>
                    <span class="usr-ph-no" data-phone="+1 (070) 123-4567">
                        <a href="{{ route('management.users.edit', $user->ID_USER) }}" class="text-primary edit">
                            <i class="ti ti-pencil fs-5"></i></a>
                        <form action="{{ route('management.users.delete', $user->ID_USER) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-primary edit">
                                <i class="ti ti-trash fs-5"></i></button>
                        </form></span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
{{-- @extends('layouts2.app')

@section('content')
    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Users</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="widget-content searchable-container list">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <form class="position-relative">
                        <input type="text" class="form-control product-search ps-5" id="input-search"
                               placeholder="Search Contacts..."/>
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <button id="btn-add-contact" class="btn btn-primary d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add User
                    </button>
                </div>
            </div>
        </div>
        <div class="card card-body">
            <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                    <thead class="header-item">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody id="users-table-body">
                        <!-- User data will be populated here via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->ID_JENIS_USER }}">{{ $role->JENIS_USER }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_user_id" name="user_id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_role" class="form-label">Role</label>
                            <select class="form-select" id="edit_role" name="role" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->ID_JENIS_USER }}">{{ $role->JENIS_USER }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Load users on page load
        loadUsers();

        // Add user
        $('#btn-add-contact').click(function() {
            $('#addUserModal').modal('show');
        });

        $('#addUserForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("management.users.store") }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#addUserModal').modal('hide');
                    loadUsers();
                    alert('User added successfully');
                },
                error: function(xhr) {
                    alert('Error adding user');
                }
            });
        });

        // Edit user
        $(document).on('click', '.edit-user', function() {
            var userId = $(this).data('id');
            $.ajax({
                url: '/management/users/' + userId + '/edit',
                method: 'GET',
                success: function(response) {
                    $('#edit_user_id').val(response.ID_USER);
                    $('#edit_name').val(response.NAMA_USER);
                    $('#edit_username').val(response.USERNAME);
                    $('#edit_email').val(response.EMAIL);
                    $('#edit_role').val(response.ID_JENIS_USER);
                    $('#editUserModal').modal('show');
                }
            });
        });

        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            var userId = $('#edit_user_id').val();
            $.ajax({
                url: '/management/users/' + userId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editUserModal').modal('hide');
                    loadUsers();
                    alert('User updated successfully');
                },
                error: function(xhr) {
                    alert('Error updating user');
                }
            });
        });

        // Delete user
        $(document).on('click', '.delete-user', function() {
            if (confirm('Are you sure you want to delete this user?')) {
                var userId = $(this).data('id');
                $.ajax({
                    url: '/management/users/' + userId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        loadUsers();
                        alert('User deleted successfully');
                    },
                    error: function(xhr) {
                        alert('Error deleting user');
                    }
                });
            }
        });

        // Load users function
        function loadUsers() {
            $.ajax({
                url: '{{ route("management.users.index") }}',
                method: 'GET',
                success: function(response) {
                    $('#users-table-body').html(response.html);
                }
            });
        }
    });
</script>
@endsection --}}
