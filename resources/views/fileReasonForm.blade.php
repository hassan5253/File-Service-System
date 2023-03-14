
<div class="well">
    <div class="lineHeight">&nbsp;</div>
    {{ Form::open(array('url' => '/addFileReasonDetail' ,"enctype"=>"multipart/form-data", 'method' => 'POST')) }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section[]" value="1">
    <input type="hidden" name="id" value="{{ Input::get('param1') }}">
    <input type="hidden" name="status" value="{{ Input::get('param2') }}">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <label>Reason</label>
                    <span class="rflabelsteric"><strong>*</strong></span>
                    <textarea class="requiredField form-control" name="reason" id="reason"></textarea>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px">
                    {{ Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'btnLoad']) }}
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        // Wait for the DOM to be ready
        $(".btn-success").click(function(e){
            var employee = new Array();
            var val;
            $("input[name='section[]']").each(function(){
                employee.push($(this).val());
            });
            var _token = $("input[name='_token']").val();
            for (val of employee) {
                jqueryValidationCustom();
                if(validate == 0){
                    //alert(response);
                }else{
                    return false;
                }
            }
        });
    });

</script>