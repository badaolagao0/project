@extends('layout.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
      <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => "Product", 'key'=>'Add'])
        {{-- <div class="col-md-12">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div> --}}
        <form action="{{route('product.store')}}"  method='post' enctype="multipart/form-data">
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">
                          @csrf
                          <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name='name' 
                            placeholder="Nhập tên sản phẩm"
                            value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                              <label>Giá sản phẩm</label>
                              <input type="text" 
                              class="form-control @error('price') is-invalid @enderror" 
                              name='price' 
                              placeholder="Nhập tên sảm phẩm"
                              value="{{ old('price') }}">
                              @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                              <label>Ảnh đại diện</label>
                              <input type="file" class="form-control-file"
                                      name='feature_image_path' >
                          </div>

                          <div class="form-group">
                              <label>Ảnh chi tiết</label>
                              <input type="file" class="form-control-file" multiple
                                      name='image_path[]'>
                          </div>

                          <div class="form-group">
                              <label>Chọn danh mục</label>
                              <select class="form-control select2_init @error('category_id') is-invalid @enderror" 
                                name='category_id'>
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                              </select>
                              @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                              <label>Nhập tags cho sản phẩm</label>
                              <select name='tags[]' class="form-control tags_select_choose" multiple="multiple">
                              </select>
                            </div>
      
                          </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nhập nội dung</label>
                              <textarea class="form-control tinymce_editor_init @error('contents') is-invalid @enderror" 
                              name="contents" cols="30" rows="10">
                              {{ old('contents') }}
                            </textarea>
                              @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
          </div>
        </form>
    </div>
@endsection

@section('js')
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <script src="{{ asset('admins/product/add/add.js') }}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
@endsection
