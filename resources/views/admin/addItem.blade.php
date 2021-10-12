@extends('admin.layouts.main')
@section('content')
<div class="row">
  <div class="col col-md-6">
    <form action="{{ route('admin.item.post-add') }}" method="post">
      @csrf
      <div class="card">
        <div class="card-header">Add Item</div>
        <div class="card-body">
          <input type="file" name="image" id="image" class="form-control mb-3 form-control-sm" accept="image/*">
          <select name="category" id="category" class="form-select form-select-sm mb-3">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          <input type="text" name="name" id="name" class="form-control form-control-sm mb-3" placeholder="Name">
          <input type="text" name="price" id="price" class="form-control form-control-sm mb-3" placeholder="Price">
          <select name="unit" id="unit" class="form-select form-select-sm mb-3">
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
          </select>
          <textarea name="description" id="description" cols="30" rows="4" class="form-control form-control-sm mb-3" placeholder="Description"></textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-sm btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
