@extends('layouts.default')

@section('title')

การจัดการหน่วย
@stop
@section('content')


<div class="col-md-offset-1 col-md-10"> 

    <div class="panel-success">
        <div class='panel-heading'>ข้อมูลของหน่วยนับ</div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="#addform" role="button" id="add" class="btn btn-success" data-toggle="modal">เพิ่มข้อมูล</a>
            </div>

            @if($unit->count() != 0)
            <div class="row-fluid table users-list">
                <div class="pull-right">

                </div>
                <table id="example">
                    <thead>
                        <tr role="row">
                            <th class="col-md-2">รหัส</th>
                            <th class="col-md-2">หน่วย</th>
                            <th class="col-md-2">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

               @foreach ($unit as $unit)
                    <tr id="{{ $unit->id }}" >
                    <td class="childrow">{{ $unit->id }}</td>
                    <td class="childrow">{{ $unit->name }}</td>
                    <td>
                        <a href="#addform" id="{{$unit->id}}"  data-toggle="modal" class="btn btn-warning addform"><i class="icon-large icon-edit"></i></a>

                      <a class="btn delete-asset btn-danger" data-toggle="modal" 
                                      href="#dataConfirmModal" url="{{ route('delete/unit', $unit->id) }}" 
                                   data-content="คุณมั่นใจที่จะลบ แล้วหรือ?" data-title="ลบ 
                                   {{ htmlspecialchars($unit->name) }}?" 
                                   onclick="$('#dataConfirmOK').attr('href',$(this).attr('url'))">
                                    <i class="icon-large icon-trash"></i></a>
                    </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>


            @else
            <div class="col-md-6">
                <div class="alert alert-warning alert-block">
                    <i class="icon-warning-sign"></i>
                    @lang('admin/users/table.noresults')


                </div>
            </div>
            @endif
        </div>
    </div>
    <div id="addform" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">เพิ่มข้อมูล</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route'=>'unit','class'=>'form-horizontal'))}} 
                    {{ Form::hidden('id',null,array('id'=>'hiddenid'))}}

                     <div class="form-group">
                        <label class="control-label col-md-4" for="categorie_id">รหัส</label>
                        <div class="col-md-6">
                            {{ Form::text('id',null,array('class'=>'form-control','readonly'))}}
                        </div>

                     
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="categorie_id">ชื่อ</label>
                        <div class="col-md-6">
                            {{ Form::text('name',null,array('class'=>'form-control'))}}
                        </div>

                     
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" value="Submit" class="btn btn-custom pull-right" id="send_btn" data-original-title="" title="">บันทึก</button>
                        </div>
                    </div>
                    </form>
                </div><!-- End of Modal body -->
            </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
    </div>

</div>



@stop
@section('specific_script')
$("#startdate").on("dp.change",function (e) {
               $('#stopdate').data("DateTimePicker").setMinDate(e.date);
            });
            $("#stopdate").on("dp.change",function (e) {
               $('#startdate').data("DateTimePicker").setMaxDate(e.date);
            });

        $('#add').click(function(e){
            $("form.form-horizontal :input.form-control").each(function(key,data){
                 var value = $('#example tr:last').attr('id');
                 if(typeof value === 'undefined'){
                    var data = '1';
                 }else{
                 var val = value.split("-");
                    var data = Number(val[1])+1;
                 }
              
               
                if($(this).attr('name') == 'id'){
                
                 $(this).val('U-'+pad(data,5))
                 
                }
               
                });


            });
            
$('.addform').click(function(e){
           
var val = $(this).attr('id');

$('#hiddenid').val(val);
var array = [];
$('#'+val+' .childrow').each(function(key,data){

array[key] = $(this).html();    
});
$("form.form-horizontal :input.form-control").each(function(key,data){
if(typeof array[key] == 'undefined' || array[key] === ''){
return;
}

$(this).val(array[key]);

}); 

});

@stop