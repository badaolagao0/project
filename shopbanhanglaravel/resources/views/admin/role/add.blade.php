@extends('layout.admin')

@section('title')
    <title>Thêm role</title>
@endsection

@section('css')
      <link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')
      <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => "Role", 'key'=>'Add'])

        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('roles.store') }}"  method='post' enctype="multipart/form-data" style='width: 100%'>
                <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                          <label>Tên vai trò</label>
                          <input type="text" 
                          class="form-control @error('name') is-invalid @enderror" 
                          name='name' 
                          placeholder="Nhập tên vai trò"
                          value='{{ old('name') }}'>
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label>Mô tả vai trò</label>
                          <textarea name="display_name" 
                          class="form-control" 
                          id="" cols="30" rows="4">{{ old('display_name') }}</textarea>
                        </div>
                </div>
                
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" class="checkAll">
                            <label for="">Check All</label>
                        </div>

                        @foreach ($permissionsParent as $permissionsParentItem)
                        <div class="card border-primary mb-3 col-md-12">
                            <div class="card-header">
                                <label for="">
                                    <input type="checkbox" value='' class='checkbox_wrapper'>
                                </label>    
                                Module {{ $permissionsParentItem -> name }}
                            </div>
                            <div class="row">
                                @foreach ($permissionsParentItem -> permissionsChildren as $permissionsChildrenItem)
                                <div class="card-body text-primary col-md-3">
                                <h5 class="card-title">
                                    <label for="">
                                        <input type="checkbox" class="checkbox_children"
                                        name='permission_id[]' 
                                        value='{{ $permissionsChildrenItem -> id }}'>
                                    </label>
                                    {{ $permissionsChildrenItem->name }}
                                </h5>
                                </div>
                                @endforeach                         
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
@endsection
