<?php
$acc_type = Auth::user()->acc_type;
$counter = 1;
?>
@if(!empty($users))
    @foreach($users as $key => $val)
        <tr>
            <td class="text-center">{{ $counter++ }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->username }}</td>
            <td>{{ $val->email }}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="9">No record found !</td>
    </tr>
@endif