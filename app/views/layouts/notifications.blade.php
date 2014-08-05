@if ($errors->any())
<div class="col-md-12">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon-large icon-bomb"></i>
        <strong>เกิดข้อผิดพลาด: </strong>
        <ul>
            @foreach($errors as $error)
             {{ dd($error)}}  
            @endforeach
        </ul>
    </div>
</div>

@endif

@if ($message = Session::get('success'))
<div class="col-md-12">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon-large icon-ok-sign"></i>
        <strong>Success: </strong>
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="col-md-12">
    <div class="alert alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon-large icon-exclamation-sign"></i>
        <strong>Error: </strong>
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="col-md-12">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon-large icon-warning-sign"></i>
        <strong>ระวัง: </strong>
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="col-md-12">
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon-large icon-info-sign"></i>
        <strong>Info: </strong>
        {{ $message }}
    </div>
</div>
@endif

