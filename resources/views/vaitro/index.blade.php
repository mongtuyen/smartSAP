@extends('backend.layouts.index')

@section('title')
Danh sách vai trò
@endsection


@section('main-content')
<h2>DANH SÁCH VAI TRÒ</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachvaitro.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachvaitro as $vaitro)
            <tr>
                <td>{{ $vaitro->vt_ma }}</td>
                <td>{{ $vaitro->vt_ten }}</td>
                <td><a href="{{ route('danhsachvaitro.edit', ['id' => $vaitro->vt_ma]) }}">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachvaitro.destroy', ['id' => $vaitro->vt_ma]) }}">
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