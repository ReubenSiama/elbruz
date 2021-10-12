@extends('admin.layouts.main')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col col-md-4">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
      </div>
      <div class="col col-md-4 offset-4 text-right">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCategory">Add</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Salary</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>$320,800</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Category Modal-->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name">
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-sm btn-primary" href="login.html">Add</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
@endsection