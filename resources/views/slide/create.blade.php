@extends('backend.layouts.index')

@section('title')
Thêm mới slide
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
<form id="frmThemslide" method="post" action="{{route('danhsachslide.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="form-group">
        <label for="sl_ma">Mã</label>
        <input type="text" class="form-control" id="sl_ma" name="sl_ma" placeholder="Nhập mã">
    </div>
    <div class="form-group">
        <label for="sl_ten">Tên</label>
        <input type="text" class="form-control" id="sl_ten" name="sl_ten" placeholder="Nhập tên">
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label>Hình ảnh</label>
            <input id="sl_hinh" type="file" name="sl_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="sl_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="sl_noiDung" name="sl_noiDung" placeholder="Nhập tên">
    </div>
    <div class="form-group">
        <label for="sl_link">Link</label>
        <input type="text" class="form-control" id="sl_link" name="sl_link" placeholder="Nhập tên">
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
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        $("#sl_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
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