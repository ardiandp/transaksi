<!DOCTYPE html>
<html>
<head>
    <title>Data Norek</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>


@include('layout.header')
@include('layout.Sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
<!-- Tambahkan tombol untuk membuka modal -->
<button type="button" class="btn-xm btn-success" data-toggle="modal" data-target="#createModal">
    Create Admin
</button>

              </div>
  
<div class="container">
            <table class="table table-bordered" id="adminTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
   <!-- coding untuk menampilkan data --> 
    <script>
        $(document).ready(function() {
            $('#adminTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>

    <!-- script untuk edit -->
    <script>
    $(document).ready(function() {
        // Menangkap klik tombol Edit
        $('.edit').click(function() {
            var adminId = $(this).data('id');

            // Kirim request AJAX untuk mendapatkan data admin berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '/admin/' + adminId + '/edit',
                success: function(response) {
                    // Isi data admin ke dalam modal Edit
                    $('#editForm input[name="id"]').val(response.admin.id);
                    $('#editForm input[name="name"]').val(response.admin.name);
                    $('#editForm input[name="email"]').val(response.admin.email);

                    // Tampilkan modal Edit
                    $('#editModal').modal('show');
                },
                error: function(error) {
                    alert('Error loading data for editing. Please try again.');
                }
            });
        });
    });
</script>


    <!-- coding untuk input data --> 
    <!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk input admin -->
                <form id="adminForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- coding untuk menyimpan data dengan ajax --> 
<!-- Tambahkan script untuk meng-handle form menggunakan AJAX -->
<script>
    $(document).ready(function() {
        $('#adminForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.store') }}',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                    // Reset form setelah sukses
                    $('#adminForm')[0].reset();
                    // Tutup modal
                    $('#createModal').modal('hide');
                },
                error: function(error) {
                    alert('Error creating admin. Please try again.');
                }
            });
        });
    });
</script>

<!-- modal untuk edit data --> 
<!-- resources/views/admin/index.blade.php -->

<!-- Modal untuk Edit Data -->
<!-- Modal untuk Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk Edit admin -->
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- js untuk update data --> 
<!-- resources/views/admin/index.blade.php -->

<!-- Tambahkan script di bagian bawah file -->
<script>
    $(document).ready(function() {
        // Menangkap submit form Edit
        $('#editForm').submit(function(e) {
            e.preventDefault();

            // Kirim request AJAX untuk update data admin
            $.ajax({
                type: 'PUT',
                url: '/admin/' + $('#editForm input[name="id"]').val(),
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);

                    // Perbarui tabel dengan data yang telah diubah
                    // (mungkin Anda ingin menggunakan DataTables untuk memperbarui data)
                    location.reload();

                    // Tutup modal
                    $('#editModal').modal('hide');
                },
                error: function(error) {
                    alert('Error updating data. Please try again.');
                }
            });
        });
    });
</script>




</div>
@extends('layout.footer')
   
</body>
</html>
