<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Chemnits</title>

    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link id="changeStyle" href="{{ URL::asset('assets/css/color-one.css') }}" rel="stylesheet" />

    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>

</head>

<body style="overflow-x: hidden;">
@include('layouts.header')
@yield('content')

<script>

    function swalAdd() {
        swal("Successfully Saved !", "", "success");
    }

    function swalUpdate() {
        swal("Successfully Updated !", "", "success");
    }

    function swalDelete() {
        swal("Successfully Deleted !", "", "success");
    }

    function swalRegistered() {
        swal("Successfully Registered !", "", "success");
    }

    function swalAlert(title, text){
        swal(title, text);
    }

</script>

<div class="container-fluid" id="mainSFContent">

    @if(Session::has('dataInsert'))
        <script>swalAdd();</script>
    @endif
    @if(Session::has('dataDelete'))
        <script>swalDelete();</script>
    @endif
    @if(Session::has('dataEdit'))
        <script>swalUpdate();</script>
    @endif
    @if(Session::has('registered'))
        <script>swalRegistered();</script>
    @endif

</div>

<script>

function showMasterTableEditModel(url, modalName, param1, param2){

jQuery('#showMasterTableEditModel').modal('show', {backdrop: 'false'});
jQuery('#showMasterTableEditModel .modalTitle').html(modalName);
jQuery('#showMasterTableEditModel .modal-body').html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div>');
@if(!empty($_GET['pageType'])):
    var pageType = '{{ $_GET['pageType'] }}';
    var parentCode = '{{ $_GET['parentCode'] }}';
@else
    var pageType = true;
    var parentCode = true;
@endif
$.ajax({
    url: '{{ url('/') }}/'+url+'',
    type: "GET",
    data: {param1: param1, param2: param2, pageType: pageType, parentCode: parentCode},
    success:function(data) {
        jQuery('#showMasterTableEditModel .modal-body').html(data);
    }
});
}

    var validate = 0;
    function jqueryValidationCustom(){
        var requiredField = document.getElementsByClassName('requiredField');
        for (i = 0; i < requiredField.length; i++){
            var rf = requiredField[i].id;
            var checkType = requiredField[i].type;
            if($('#'+rf).val() == ''){
                $('#'+rf).css('border-color', 'red');
                $('#'+rf).focus();
                validate = 1;
                return false;
            }else{
                $('#'+rf).css('border-color', '#ccc');
                validate = 0;
            }
        }
        return validate;
    }

    function mainDisable(disable,enable){
        if ($('#'+disable).val() == ""){
            $('#'+disable).attr('readonly','readonly');
            $('#'+disable).removeAttr('required','required');
            $('#'+disable).removeClass("requiredField")
            $('#'+disable).val("");
            $('#'+enable).removeAttr('readonly');
            $('#'+enable).attr('required','required');
            $('#'+enable).addClass("requiredField")
        }
    }

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
                , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })()

</script>

<div class="modal fade" id="showMasterTableEditModel">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header" style=" padding: 5px; background-color: #f7f7f7; border-bottom: 5px solid #9170E4; width: 100%;">
                <div class="row">
                    <div class="col-md-4 col-sm-1 col-xs-12 text-center">
                    </div>
                    <div class="col-md-4 col-sm-1 col-xs-12 text-center">
                        <span class="modalTitle subHeadingLabelClass"></span>
                    </div>
                    <div class="col-md-4 col-sm-1 col-xs-12 text-right">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
            <div  class="modal-body"></div>
        </div>
    </div>
</div>

</body>