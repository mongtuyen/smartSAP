@extends('backend.layouts.index')

@section('title')
Thêm mới vai trò
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

<form id="frmThemvt" method="post" action="{{route('danhsachvaitro.store')}}">
{{csrf_field()}}
    <div class="form-group">
        <label for="vt_ma">Mã</label>
        <input type="text" class="form-control" id="vt_ma" name="vt_ma" placeholder="Nhập mã">
    </div>
    <div class="form-group">
        <label for="vt_ten">Tên</label>
        <input type="text" class="form-control" id="vt_ten" name="vt_ten" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection