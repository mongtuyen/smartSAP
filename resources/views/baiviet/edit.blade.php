@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh slide
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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

<form method="post" action="{{ route('danhsachbaiviet.update', ['id' => $baiviet->bv_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="bv_tieuDe">Tiêu đề</label>
        <input type="text" class="form-control" id="bv_tieuDe" name="bv_tieuDe" value="{{ $baiviet->bv_tieuDe }}" placeholder="Nhập tiêu đề">
    </div>

    <div class="form-group">
        <label for="bv_ngayDang">Ngày đăng</label>
        <input type="text" class="form-control" id="bv_ngayDang" name="bv_ngayDang" value="{{ $baiviet->bv_ngayDang }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="bv_moTaNgan">Mô tả ngắn</label>
        <input type="text" class="form-control" id="bv_moTaNgan" name="bv_moTaNgan" value="{{ $baiviet->bv_moTaNgan }}">
    </div>
    <div class="form-group">
        <label for="bv_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="bv_noiDung" name="bv_noiDung" value="{{ $baiviet->bv_noiDung }}">
    </div>
    <div class="form-group">
        <label for="bv_soLuotXem">Số lượt xem</label>
        <input type="number" class="form-control" id="bv_soLuotXem" name="bv_soLuotXem" value="{{ $baiviet->bv_soLuotXem }}">
    </div>

    <label for="bv_noiBat">Nổi bật</label>
    <select name="bv_noiBat" class="form-control">
        <option value="1" {{ old('bv_noiBat', $baiviet->bv_noiBat) == 1 ? "selected" : "" }}>Nổi bật</option>
        <option value="2" {{ old('bv_noiBat', $baiviet->bv_noiBat) == 2 ? "selected" : "" }}>Không nổi bật</option>
    </select>
    



    <div class="form-group">
        <div class="file-loading">
            <label>Hình ảnh</label>
            <input id="sl_hinh" type="file" name="sl_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="sl_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="sl_noiDung" name="sl_noiDung" value="{{ $slide->sl_noiDung }}" placeholder="Nhập tên">
    </div>
    <div class="form-group">
        <label for="sl_link">Link</label>
        <input type="text" class="form-control" id="sl_link" name="sl_link" value="{{ $slide->sl_link }}" placeholder="Nhập tên">
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $("#sl_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('storage/photos/' . $slide->sl_hinh) }}"
            ],
            initialPreviewConfig: [
                {
                    caption: "{{ $slide->sl_hinh }}", 
                    size: {{ Storage::exists('public/photos/' . $slide->sl_hinh) ? Storage::size('public/photos/' . $slide->sl_hinh) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: 1
                },
            ]
        });
        
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<script>
$(document).ready(function(){
    
});
</script>

@endsection