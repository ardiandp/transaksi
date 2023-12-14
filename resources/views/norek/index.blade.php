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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
   
<script type="text/javascript">
    $(document).ready(function(){
        $('#norek-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('norek.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'atas_nama', name: 'atas_nama' },
                { data: 'alias', name: 'alias' },
                { data: 'norek', name: 'norek' },
                { data: 'bank', name: 'bank' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // ...

        // Handle edit
        $('#norek-table').on('click', '.edit', function(){
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('norek') }}" + '/' + id + '/edit',
                type: "GET",
                dataType: "json",
                success: function(data){
                    $('#editModal').modal('show');
                    $('#edit_id').val(data.id);
                    $('#edit_nomor_rekening').val(data.nomor_rekening);
                    $('#edit_nama_pemilik').val(data.nama_pemilik);
                }
            });
        });

        // Handle update
        $('#editForm').on('submit', function(e){
            e.preventDefault();
            var id = $('#edit_id').val();
            var url = "{{ url('norek') }}" + '/' + id;

            $.ajax({
                url: url,
                type: "PUT",
                data: $('#editForm').serialize(),
                success: function(response){
                    $('#editModal').modal('hide');
                    $('#norek-table').DataTable().ajax.reload();
                    alert(response.success);
                }
            });
        });
    });
</script>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Norek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nomor_rekening">Nomor Rekening</label>
                        <input type="text" class="form-control" id="edit_nomor_rekening" name="nomor_rekening">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" id="edit_nama_pemilik" name="nama_pemilik">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- coding edit -->

</div>
@extends('layout.footer')
   
</body>
</html>