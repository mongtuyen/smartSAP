@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh lĩnh vực
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

<form method="post" action="{{ route('danhsachlinhvuc.update', ['id' => $linhvuc->lv_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="lv_ten">Tên</label>
        <input type="text" class="form-control" id="lv_ten" name="lv_ten" value="{{ $linhvuc->lv_ten }}" placeholder="Nhập tên">
    </div>
    

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection