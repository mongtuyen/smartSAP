@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh vai trò
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

<form method="post" action="{{ route('danhsachvaitro.update', ['id' => $vaitro->vt_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vt_ten">Tên</label>
        <input type="text" class="form-control" id="vt_ten" name="vt_ten" value="{{ $vaitro->vt_ten }}" placeholder="Nhập tên">
    </div>
    

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection