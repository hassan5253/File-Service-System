@extends('layouts.default')
@section('content')

    <div class="row">&nbsp;</div>
    <div class="well">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <span class="subHeadingLabelClass">Users List</span>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
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
            userListDetail();
        });

        function userListDetail()
        {
            $('.data_loader').html('<div class="loader"></div>');
            $.ajax({
                url: '{{ url('/') }}/userListDetail',
                type: "GET",
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
