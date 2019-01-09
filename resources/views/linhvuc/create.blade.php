@extends('backend.layouts.index')

@section('title')
Thêm mới lĩnh vực
@endsection

@section('main-content')
<form id="frmThemlv" method="post" action="{{route('danhsachlinhvuc.store')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="lv_ma">Mã</label>
        <input type="text" class="form-control" id="lv_ma" name="lv_ma" placeholder="Nhập mã">
    </div>
    <div class="form-group">
        <label for="lv_ten">Tên</label>
        <input type="text" class="form-control" id="lv_ten" name="lv_ten" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection