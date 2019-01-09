@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh chủ đề
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

<form method="post" action="{{ route('danhsachchude.update', ['id' => $chude->cd_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="cd_ten">Tên</label>
        <input type="text" class="form-control" id="cd_ten" name="cd_ten" value="{{ $chude->cd_ten }}" placeholder="Nhập tên">
    </div>
    

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection