<?php
$acc_type = Auth::user()->acc_type;
$counter = 1;
use App\Helpers\CommonHelper;
use App\Models\Users;
?>
@if(!empty($files))
    @foreach($files as $key => $val)
        <?php $url = url('/').Storage::url($val->file_path); ?>
        <tr>
            <td class="text-center">{{ $counter++ }}</td>
            <td>{{ Users::where([['id','=',  $val->user_id]])->select('name')->value('name') }}</td>
            <td>{{ $val->file_name }}</td>
            <td class="text-center">{{ $val->file_extension }}</td>
            <td class="text-center">{{ $val->file_size }} MiB</td>
            <td class="text-center">{{ $val->timestamp }}</td>
            <td class="text-center">
                @if($val->status != 2)
                    <a target="_blank" href="{{ url('/') }}/downloadFile?file_name={{ $val->file_name }}&&file_extension={{ $val->file_extension }}">Download</a>
                @endif
            </td>
            @if($acc_type == 'admin') <td class="text-center">{{ $val->reason }}</td> @endif
            <td class="text-center">{{ CommonHelper::getFileStatusLabel($val->status ) }}</td>
            <td class="text-center">
                <div class="dropdown">
                    <button class="btn btn-dashboard dropdown-toggle btn-xs" type="button" id="actionList" data-toggle="dropdown">Actions
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="actionList">
                        @if($acc_type == 'admin')
                            @if($val->status == 3)
                                <li role="presentation">
                                    <a class="edit-modal btn" onclick="blockOrUnBlockFile('{{ $val->id }}','{{ $val->status }}','2')">
                                        Block
                                    </a>
                                </li>
                            @elseif($val->status == 4)
                                <li role="presentation">
                                    <a class="edit-modal btn" onclick="blockOrUnBlockFile('{{ $val->id }}', '{{ $val->status }}','1')">
                                        UnBlock
                                    </a>
                                </li>
                            @endif
                            <li role="presentation">
                                <a class="edit-modal btn" onclick="blockOrUnBlockFile('{{ $val->id }}','{{ $val->status }}', 'decline')">
                                    Decline
                                </a>
                            </li>
                        @elseif($acc_type == 'user')
                            @if($val->status == 1)
                                <li role="presentation">
                                    <a class="edit-modal btn" onclick="showMasterTableEditModel('fileReasonForm','Reason For Blocking Or UnBlocking', '{{ $val->id }}', '3')">
                                        Request To Block
                                    </a>
                                </li>
                            @elseif($val->status == 2 )
                                <li role="presentation">
                                    <a class="edit-modal btn" onclick="showMasterTableEditModel('fileReasonForm','Reason For Blocking Or UnBlocking', '{{ $val->id }}', '4')">
                                        Request To UnBlock
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="9">No record found !</td>
    </tr>
@endif