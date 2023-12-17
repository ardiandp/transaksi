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
        <a href="{{ route('produk.create') }}" class="btn btn-sm btn-success">Add Data</a>
        <table class="table table-bordered" id="norekTable">
            <!-- Tabel Data akan ditampilkan di sini -->
        </table>
    
              </div>


  
<div class="container">   
        <table class="table" id="produk-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(function () {
            $('#produk-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('produk.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'kode', name: 'kode' },
                    { data: 'nama', name: 'nama' },
                    { data: 'harga', name: 'harga' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>



</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@extends('layout.footer')
   
</body>
</html>