@extends('layout.admin')

@section('title')
    <title>Thêm user</title>
@endsection

@section('css')
      <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => "User", 'key'=>'Add'])

        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.store') }}"  method='post' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Tên</label>
                          <input type="text" 
                          class="form-control" 
                          name='name' 
                          placeholder="Nhập tên"
                          value='{{ old('name') }}'>
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" 
                          class="form-control" 
                          name='email' 
                          placeholder="Nhập Email"
                          value='{{ old('name') }}'>
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" 
                          class="form-control" 
                          name='password' 
                          placeholder="Nhập Password"
                          value='{{ old('password') }}'>
                        </div>

                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="form-control select2_init" multiple>
                                <option value=""></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role -> id }}">{{ $role -> name }}</option>
                                @endforeach
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <script>
    $('.select2_init').select2({
        'placeholder': 'Chọn vai trò',
    })
  </script>
@endsection