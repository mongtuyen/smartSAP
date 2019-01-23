@extends('backend.layouts.index')

@section('title')
Thêm mới bài viết
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

<form method="post" action="{{ route('danhsachbaiviet.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="lv_ma">Lĩnh vực</label>
        <select name="lv_ma" class="form-control" id="lv_ma">
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
        <label for="cd_ma">Chủ đề bài viết</label>
        <select name="cd_ma" class="form-control" id="cd_ma">
            @foreach($danhsachchude as $chude)
                @if(old('cd_ma') == $chude->cd_ma)
                <option value="{{ $chude->cd_ma }}" selected>{{ $chude->cd_ten }}</option>
                @else
                <option value="{{ $chude->cd_ma }}">{{ $chude->cd_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_tacGia">Tác giả</label>
        <select name="nv_tacGia" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_ma') == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="bv_ma">Mã</label>
        <input type="text" class="form-control" id="bv_ma" name="bv_ma">
    </div>
    
    <div class="form-group">
        <label for="bv_tieuDe">Tiêu đề</label>
        <input type="text" class="form-control" id="bv_tieuDe" name="bv_tieuDe">
    </div>
    <div class="form-group">
        <label for="bv_ngayDang">Ngày đăng</label>
        <input type="text" class="form-control" id="bv_ngayDang" name="bv_ngayDang"data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="bv_moTaNgan">Mô tả ngắn</label>
        <input type="text" id="bv_moTaNgan" class="form-control"></input>
    </div>
    <div class="form-group">
    <label>Hình ảnh</label>
        <div class="file-loading">
            
            <input id="bv_hinh" type="file" name="bv_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="bv_noiDung">Nội dung</label>
        <textarea id="bv_noiDung" class="form-control ckeditor" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="bv_soLuotXem">Số lượt xem</label>
        <input type="number" class="form-control" id="bv_soLuotXem" name="bv_soLuotXem">
    </div>
    <div class="form-group">
        <label for="bv_noiBat">Nổi bật</label>
        <label class ="radio-inline">
            <input name="NoiBat" value="1" checked="" type="radio">Có  
        </label>
        <label class ="radio-inline">
            <input name="NoiBat" value="2" checked="" type="radio">Không
        </label>
    </div>

    <!-- <label for="bv_noiBat">Nổi bật</label>
    <select name="bv_noiBat" class="form-control">
        <option value="1" {{ old('bv_noiBat') == 1 ? "selected" : "" }}>Nổi bật</option>
        <option value="2" {{ old('bv_noiBat') == 2 ? "selected" : "" }}>Không nổi bật</option>
    </select> -->
    
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
        $("#bv_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        $("#bv_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
           $("#lv_ma").change(function(){
                var lv_ma=$(this).val();
                $.get("/admin/ajax/chude/"+lv_ma,function(data){
                   //alert(data);
                   $("#cd_ma").html(data);
                });
            });
        
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- <script>
$(document).ready(function(){
    
});
</script> -->

@endsection
<!--AJAX-->
@section('script')
    <script>
        $(document).ready(function(){
            //alert("chvb");
            $("lv_ma").change(function(){
                var lv_ma=$(this).val();
                $.get("admin/ajax/chude/"+lv_ma,function(data){
                   //alert(data);
                   $("#cd_ma").html(data);
                });
            });
        });
    </script>
@endsection