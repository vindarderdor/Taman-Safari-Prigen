@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">content Management</h1>
        {{-- <a href="{{ route('contents.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center gap-2"> --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add content
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid gap-4">
        @foreach($contents as $content)
            <div class="bg-white p-4 rounded-lg shadow flex justify-between items-start">
                <div class="flex gap-4">
                    <img src="{{ Storage::url($content->image) }}" 
                         alt="{{ $content->place }}"
                         class="w-32 h-24 object-cover rounded">
                    <div>
                        <h3 class="font-bold">{{ $content->place }}</h3>
                        <div class="text-sm text-gray-600">
                            {{ $content->title }} {{ $content->title2 }}
                        </div>
                        <p class="text-sm mt-2 text-gray-700 line-clamp-2">
                            {{ $content->description }}
                        </p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('contents.edit', $content) }}" 
                       class="p-2 text-blue-500 hover:bg-blue-50 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </a>
                    <form action="{{ route('contents.destroy', $content) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this content?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
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
