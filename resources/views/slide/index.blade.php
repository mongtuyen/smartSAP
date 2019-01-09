@extends('backend.layouts.index')

@section('title')
Danh sách slide
@endsection


@section('main-content')
<h2>DANH SÁCH SLIDE</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachslide.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Nội dung</th>
            <th>Link</th>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachslide as $slide)
            <tr>
                <td>{{ $slide->sl_ma }}</td>
                <td>{{ $slide->sl_ten }}</td>
                <td><img src="{{ asset('storage/photos/' . $slide->sl_hinh) }}" class="img-list" /></td>
                
                <td>{{ $slide->sl_noiDung }}</td>
                <td>{{ $slide->sl_link }}</td>
                
                <td><a href="{{ route('danhsachslide.edit', ['id' => $slide->sl_ma]) }}">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachslide.destroy', ['id' => $slide->sl_ma]) }}">
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