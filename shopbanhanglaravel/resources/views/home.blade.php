@extends('layout.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => "Home", 'key'=>'home'])


        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Trang chu
                </div>
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
