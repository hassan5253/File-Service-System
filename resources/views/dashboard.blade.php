<?php
$acc_type = Auth::user()->acc_type;
$counter = 1;
use App\Helpers\CommonHelper;
use App\Models\Users;
?>
@extends('layouts.default')
@section('content')

    <div class="row">&nbsp;</div>
    <div class="well">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <span class="subHeadingLabelClass">Uploaded Files</span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                <button class="btn btn-primary" onclick="showMasterTableEditModel('uploadFilesForm','Upload Files','','')">
                    Upload File
                </button>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered sf-table-list table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center col-sm-1">S.No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">File Name</th>
                                    <th class="text-center">Extension</th>
                                    <th class="text-center">File Size</th>
                                    <th class="text-center">Date Time</th>
                                    <th class="text-center">Download Url</th>
                                    @if($acc_type == 'admin') <th class="text-center">Reason</th> @endif
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="appendList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="data_loader"></div>
            </div>
        </div>
    </div>

    <script>

        $(function() {
            uploadedFilesList();
        });

        function checkHash(hash)
        {
            var http = new XMLHttpRequest();
            http.open('GET', "https://www.tu-chemnitz.de/informatik/DVS/blocklist/"+hash, true);
            http.setRequestHeader("Access-Control-Allow-Origin", "*");
            http.setRequestHeader("Access-Control-Allow-Methods", "PUT, GET, POST, DELETE");
            http.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization")
            http.send();
            console.log(http.status);
        }

        function blockOrUnBlockFile(id, status, statusToBe)
        {
            $.ajax({
                url: '{{ url('/') }}/blockOrUnBlockFile',
                type: "GET",
                data: {id: id, status: status, statusToBe: statusToBe},
                success: function (data) {
                    uploadedFilesList();
                    swalUpdate();
                },
                error: function (error) {
                    swalAlert('Error', 'Something went wrong');
                }
            });
        }

        function uploadedFilesList()
        {
            var acc_type = '{{ Auth::user()->acc_type }}';
            $('.data_loader').html('<div class="loader"></div>');
            $.ajax({
                url: '{{ url('/') }}/uploadedFilesList',
                type: "GET",
                data: {acc_type: acc_type},
                success: function (data) {
                    $('#appendList').html(data);
                    $('.data_loader').html('');
                },
                error: function (error) {
                    swalAlert('Error', 'Something went wrong');
                    $('.data_loader').html('');
                }
            });
        }

    </script>

@endsection
