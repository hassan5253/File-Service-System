
<div class="well">
    <div class="lineHeight">&nbsp;</div>
    {{ Form::open(array('url' => '/uploadFileDetail' ,"enctype"=>"multipart/form-data", 'method' => 'POST')) }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section[]" value="1">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label>File</label>
                    <span class="rflabelsteric"><strong>*</strong></span>
                    <input type="file" name="files[]" id="files" class="form-control requiredField" multiple />
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px">
                    {{ Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'btnLoad']) }}
                </div>
            </div>
            <br>
            @if(Session::has('errorMsg'))
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">&nbsp;
                        <div class="alert-danger" style="font-size: 18px"><span class="glyphicon glyphicon-warning-sign"></span><em> {!! session('errorMsg') !!}</em></div>
                    </div>
                </div>
            @endif
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

    document.getElementById("btnLoad").addEventListener("click", function showFileSize() {
        // (Can't use `typeof FileReader === "function"` because apparently it
        // comes back as "object" on some browsers. So just see if it's there
        // at all.)
        if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
            console.log("The file API isn't supported on this browser yet.");
            return;
        }

        var input = document.getElementById('fileinput');
        if (!input.files) { // This is VERY unlikely, browser support is near-universal
            console.error("This browser doesn't seem to support the `files` property of file inputs.");
        } else if (!input.files[0]) {
            addPara("Please select a file before clicking 'Load'");
        } else {
            var file = input.files[0];
            addPara("File " + file.name + " is " + file.size + " bytes in size");
        }
    });

    function addPara(text) {
        var p = document.createElement("p");
        p.textContent = text;
        document.body.appendChild(p);
    }

</script>