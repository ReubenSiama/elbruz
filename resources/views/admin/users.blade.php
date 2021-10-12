@extends('admin.layouts.main')
@section('content')
  <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col col-md-4">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
      </div>
      <div class="col col-md-4 offset-4 text-right">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUser">Add</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!-- Add User Modal-->
  <form action="{{ route('user.add') }}" method="post">
    @csrf
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name">
            <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email">
            <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Password">
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-success">Add</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('scripts')
  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
@endsection