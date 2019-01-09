@extends('backend.layouts.index')

@section('title')
Danh sách nhân viên
@endsection

@section('main-content')
<h2>DANH SÁCH NHÂN VIÊN</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachnhanvien.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachnhanvien as $nhanvien)
            <tr>
                <td>{{ $nhanvien->nv_ma }}</td>
                <td>{{ $nhanvien->nv_hoTen }}</td>
                <td>{{ $nhanvien->nv_gioiTinh }}</td>
                <td>{{ $nhanvien->vaiTro->vt_ten }}</td>
                <td>{{ $nhanvien->nv_email }}</td>
                
                <td>{{ $nhanvien->nv_ngaySinh }}</td>
                <td>{{ $nhanvien->nv_diaChi }}</td>
                <td>{{ $nhanvien->nv_dienThoai }}</td>
               
                <td><a href="{{ route('danhsachnhanvien.edit', ['id' => $nhanvien->nv_ma]) }}">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachnhanvien.destroy', ['id' => $nhanvien->nv_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection