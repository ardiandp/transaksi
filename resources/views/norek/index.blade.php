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
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addModal">Add Data</button>
        <table class="table table-bordered" id="norekTable">
            <!-- Tabel Data akan ditampilkan di sini -->
        </table>
    
              </div>


  
<div class="container">   
    <table class="table table-bordered" id="norek-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Rekening</th>
                <th>Nama Pemilik</th>
                <th>Alias</th>
                <th>Bank</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
   
<!-- Tambahkan di dalam tag <head> atau di akhir tag <body> -->

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        var norekTable = $('#norekTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('norek.index') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'atas_nama', name: 'atas_nama' },
                { data: 'alias', name: 'alias' },
                { data: 'norek', name: 'norek' },
                { data: 'bank', name: 'bank' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // Tampilkan modal saat tombol "Add Data" diklik
        $('#addModal').on('show.bs.modal', function() {
            // Bersihkan form saat modal muncul
            $('#addForm')[0].reset();
        });

        // Tambahkan event submit pada form untuk menangani AJAX
        $('#addForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{!! route('norek.store') !!}',
                data: $(this).serialize(),
                success: function(response) {
                    // Tampilkan pesan sukses jika penyimpanan berhasil
                    alert(response.message);

                    // Perbarui tabel dengan data baru
                    norekTable.ajax.reload();

                    // Tutup modal
                    $('#addModal').modal('hide');
                },
                error: function(error) {
                    // Tampilkan pesan error jika ada kesalahan
                    alert('Error saving data. Please try again.');
                }
            });
        });
    });
</script>

<!-- update nore-->
<!-- resources/views/norek/index.blade.php -->

<script>
    // ...

    function editNorek(id) {
        // Mengambil data norek berdasarkan ID
        $('.edit').click(function() {
            var id = $(this).data('id');

            // Mengambil data norek berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '/norek/' + id + '/edit',
                success: function(response) {
                    // Mengisi form edit dengan data yang diambil
                    $('#editForm input[name="id"]').val(response.norek.id);
                    $('#editForm input[name="atas_nama"]').val(response.norek.atas_nama);
                    $('#editForm input[name="alias"]').val(response.norek.alias);
                    $('#editForm input[name="norek"]').val(response.norek.norek);
                    $('#editForm input[name="bank"]').val(response.norek.bank);

                    // Menampilkan modal edit
                    $('#editModal').modal('show');
                },
                error: function(error) {
                    // Menampilkan pesan error jika ada kesalahan
                    alert('Error loading data for editing. Please try again.');
                }
            });
        });

    }

    </script>
    
<script>
    function deleteData(id) {
        // Konfirmasi penghapusan
        if (confirm('Are you sure you want to delete this data?')) {
            // Menghapus data norek berdasarkan ID
            $.ajax({
                type: 'DELETE',
                url: '/transaksi/' + id,
                success: function(response) {
                    // Tampilkan pesan sukses jika penghapusan berhasil
                    alert(response.message);

                    // Perbarui tabel dengan data yang telah dihapus
                    norekTable.ajax.reload();
                },
                error: function(error) {
                    // Tampilkan pesan error jika ada kesalahan
                    alert('Error deleting data. Please try again.');
                }
            });
        }
    }
  
</script>

<script>
    $('#editForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'PUT',
            url: '/norek/' + $('#editForm input[name="id"]').val(),
            data: $(this).serialize(),
            success: function(response) {
                // Menampilkan pesan sukses jika penyimpanan berhasil
                alert(response.message);

                // Perbarui tabel dengan data yang telah diubah
                norekTable.ajax.reload();

                // Tutup modal
                $('#editModal').modal('hide');
            },
            error: function(error) {
                // Menampilkan pesan error jika ada kesalahan
                alert('Error updating data. Please try again.');
            }
        });
    });
</script>

<!-- js untuk hapus -->
<script>
    function deleteData(id) {
        // Konfirmasi penghapusan
        if (confirm('Are you sure you want to delete this data?')) {
            // Menghapus data norek berdasarkan ID
            $.ajax({
                type: 'DELETE',
                url: '{{ route('norek.destroy', ['id' => '__id__']) }}'.replace('__id__', id),
                success: function(response) {
                    // Tampilkan pesan sukses jika penghapusan berhasil
                    alert(response.message);

                    // Perbarui tabel dengan data yang telah dihapus
                    norekTable.ajax.reload();
                },
                error: function(error) {
                    // Tampilkan pesan error jika ada kesalahan
                    alert('Error deleting data. Please try again.');
                }
            });
        }
    }
</script>

<script>
    function deleteData(id) {
        // Konfirmasi penghapusan
        if (confirm('Are you sure you want to delete this data?')) {
            // Menghapus data norek berdasarkan ID
            $.ajax({
                type: 'DELETE',
                url: '{{ route('norek.destroy', ['id' => '__id__']) }}'.replace('__id__', id),
                success: function(response) {
                    // Tampilkan pesan sukses jika penghapusan berhasil
                    alert(response.message);

                    // Perbarui tabel dengan data yang telah dihapus
                    norekTable.ajax.reload();
                },
                error: function(error) {
                    // Tampilkan pesan error jika ada kesalahan
                    alert('Error deleting data. Please try again.');
                }
            });
        }
    }
</script>


<!-- modal Add --> 
<!-- Modal untuk Menambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama:</label>
                        <input type="text" class="form-control" id="atas_nama" name="atas_nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias" name="alias" required>
                    </div>
                    <div class="form-group">
                        <label for="norek">Nomor Rekening:</label>
                        <input type="text" class="form-control" id="norek" name="norek" required>
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank:</label>
                        <input type="text" class="form-control" id="bank" name="bank" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama:</label>
                        <input type="text" class="form-control" id="edit_atas_nama" name="atas_nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="edit_alias" name="alias" required>
                    </div>
                    <div class="form-group">
                        <label for="norek">Nomor Rekening:</label>
                        <input type="text" class="form-control" id="edit_norek" name="norek" required>
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank:</label>
                        <input type="text" class="form-control" id="edit_bank" name="bank" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ... (Bagian lain dari kode HTML) ... -->


<!-- ... (Bagian lain dari kode HTML) ... -->










</div>
@extends('layout.footer')
   
</body>
</html>