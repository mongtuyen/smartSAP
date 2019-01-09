@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh sản phẩm
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

<form method="post" action="{{ route('danhsachnhanvien.update', ['id' => $nhanvien->nv_ma]) }}" > 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vt_ma">Chức vụ</label>
        <select name="vt_ma" class="form-control">
            @foreach($danhsachvaitro as $vaitro)
                @if($vaitro->vt_ma == $nhanvien->vt_ma)
                <option value="{{ $vaitro->vt_ma }}" selected>{{ $vaitro->vt_ten }}</option>
                @else
                <option value="{{ $vaitro->vt_ma }}">{{ $vaitro->vt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="nv_taiKhoan" name="nv_taiKhoan" value="{{ old('nv_taiKhoan', $nhanvien->nv_taiKhoan) }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nv_matKhau" name="nv_matKhau" value="{{ old('nv_matKhau', $nhanvien->nv_matKhau) }}">
    </div>
    <div class="form-group">
        <label for="nv_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="nv_hoTen" name="nv_hoTen" value="{{ old('nv_hoTen', $nhanvien->nv_hoTen) }}">
    </div>
    <label for="nv_gioiTinh">Giới tính</label>
    <select name="nv_gioiTinh">
        <option value="1" {{ old('nv_gioiTinh', $nhanvien->nv_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{ old('nv_gioiTinh', $nhanvien->nv_gioiTinh) == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    <div class="form-group">
        <label for="nv_email">Email</label>
        <input type="text" class="form-control" id="nv_email" name="nv_email" value="{{ old('nv_email', $nhanvien->nv_email) }}">
    </div>

    <div class="form-group">
        <label for="nv_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" value="{{ old('nv_ngaySinh', $nhanvien->nv_ngaySinh) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nv_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nv_diaChi" name="nv_diaChi" value="{{ old('nv_diaChi', $nhanvien->nv_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="nv_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="nv_dienThoai" name="nv_dienThoai" value="{{ old('nv_dienThoai', $nhanvien->nv_dienThoai) }}" placeholder="Nhập tên">
    </div>
    

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection