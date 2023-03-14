<?php
Route::auth();
Route::get('login', function () {
    if (Auth::check()) {
        return Redirect::to('/dashboard');
    }
    else {
        return view('auth.login');
    }
});

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('login',array('as'=>'login',function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
}));

Route::get('/', function () {
    if (Auth::check()) {
        if(Auth::user()->acc_type == 'admin'):
            return Redirect::to('/dashboard');
        elseif(Auth::user()->acc_type == 'user'):
            return Redirect::to('/dashboard');
        endif;
    }
    else {
        return view('auth.login');
    }
});

Route::get('/register','AuthController@register');

Route::get('/dashboard','Controller@dashboard');
Route::get('/uploadedFilesList','Controller@uploadedFilesList');
Route::post('/addFileReasonDetail','Controller@addFileReasonDetail');
Route::get('/uploadFilesForm','Controller@uploadFilesForm');
Route::post('/uploadFileDetail','Controller@uploadFileDetail');
Route::get('/downloadFile','Controller@downloadFile');
Route::get('/usersList','Controller@usersList');
Route::get('/userListDetail','Controller@userListDetail');
Route::get('/fileReasonForm','Controller@fileReasonForm');
Route::get('/blockOrUnBlockFile','Controller@blockOrUnBlockFile');
Route::get('/deleteInActiveFiles','Controller@deleteInActiveFiles');