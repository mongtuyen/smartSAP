@extends('backend.layouts.index')

@section('title')
Danh sách chủ đề
@endsection


@section('main-content')

<div class="col-lg-12">
    <h1 class="page-header">Chủ đề
        <small>danh sách</small>
    </h1>
</div>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachchude.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Thuộc lĩnh vực</th>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachchude as $chude)
            <tr>
                <td>{{ $chude->cd_ma }}</td>
                <td>{{ $chude->cd_ten }}</td>
                <!---->
                <td>{{$chude->linhvuc->lv_ten}}</td>
                <td><a href="{{ route('danhsachchude.edit', ['id' => $chude->cd_ma]) }}">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachchude.destroy', ['id' => $chude->cd_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
{{$danhsachchude->links()}}
@endsection