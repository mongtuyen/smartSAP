@extends('backend.layouts.index')

@section('title')
Thêm mới nhân viên
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachnhanvien.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vt_ma">Chức vụ</label>
        <select name="vt_ma" class="form-control">
            @foreach($danhsachvaitro as $vaitro)
                @if(old('vt_ma') == $vaitro->vt_ma)
                <option value="{{ $vaitro->vt_ma }}" selected>{{ $vaitro->vt_ten }}</option>
                @else
                <option value="{{ $vaitro->vt_ma }}">{{ $vaitro->vt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="nv_taiKhoan" name="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nv_matKhau" name="nv_matKhau" value="{{ old('nv_matKhau') }}">
    </div>

    <div class="form-group">
        <label for="nv_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="nv_hoTen" name="nv_hoTen" value="{{ old('nv_hoTen') }}">
    </div>
    <div class="form-group">
        <label for="nv_gioiTinh">Giới tính</label>
    <select name="nv_gioiTinh" class="form-control">
        <option value="1" {{ old('nv_gioiTinh') == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{ old('nv_gioiTinh') == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    </div>
    <div class="form-group">
        <label for="nv_email">Email</label>
        <input type="text" class="form-control" id="nv_email" name="nv_email" value="{{ old('nv_email') }}">
    </div>
    <div class="form-group">
        <label for="nv_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" value="{{ old('nv_ngaySinh') }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nv_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nv_diaChi" name="nv_diaChi" value="{{ old('nv_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="nv_dienThoai">Điện thoại<i></i></label>
        <input type="text" class="form-control" id="nv_dienThoai" name="nv_dienThoai" value="{{ old('nv_dienThoai') }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection