@extends('backend.layouts.index')

@section('title')
Thêm mới chủ đề
@endsection

@section('main-content')
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">Chủ đề
        <small>thêm</small>
    </h1>
</div>
<div class="col-lg-7" style="padding-bottom:120px">
<form method="post" action="{{ route('danhsachchude.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="lv_ma">Thuộc lĩnh vực</label>
        <select name="lv_ma" class="form-control">
            @foreach($danhsachlinhvuc as $linhvuc)
                @if(old('lv_ma') == $linhvuc->lv_ma)
                <option value="{{ $linhvuc->lv_ma }}" selected>{{ $linhvuc->lv_ten }}</option>
                @else
                <option value="{{ $linhvuc->lv_ma }}">{{ $linhvuc->lv_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cd_ten">Tên</label>
        <input type="text" class="form-control" id="cd_ten" name="cd_ten" value="{{ old('cd_ten') }}">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
@endsection