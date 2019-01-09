@extends('backend.layouts.index')

@section('title')
Danh sách bài viết
@endsection


@section('main-content')
<h2>DANH SÁCH BÀI VIẾT</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachbaiviet.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ngày đăng</th>
            <th>Mô tả ngắn</th> 
            <th>Hình</th>           
            <th>Số lượt xem</th>
            <th>Nổi bật</th>
            <th>Tác giả</th>
            <th>Thuộc chủ đề</th>
            <th>Thuộc lĩnh vực</th>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachbaiviet as $baiviet)
            <tr>
                <td>{{ $baiviet->bv_ma }}</td>
                <td>{{ $baiviet->bv_tieuDe }}</td>               
                <td>{{ $baiviet->bv_ngayDang }}</td>
                <td>{{ $baiviet->bv_moTaNgan }}</td>
                <td><img src="{{ asset('storage/photos/' . $baiviet->bv_hinh) }}" class="img-list" /></td>
                <td>{{ $baiviet->bv_soLuotXem }}</td>
                <td>
                    @if($baiviet->bv_noiBat==1)
                    {{'Có'}}
                    @else
                    {{'Không'}}
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="{{ route('danhsachbaiviet.edit', ['id' => $baiviet->bv_ma]) }}">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachbaiviet.destroy', ['id' => $baiviet->bv_ma]) }}">
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