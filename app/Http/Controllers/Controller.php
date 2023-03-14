<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Hash;
use File;
use Input;
use Auth;
use DB;
use Config;
use Redirect;
use Session;
use GuzzleHttp\Client;
use App\Models\Files;
use App\Models\Users;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        static::deleteInActiveFiles();
        return view('dashboard');
    }

    public function uploadedFilesList()
    {
        if(Auth::user()->acc_type == 'admin') {
            $files = Files::all();
        } else {
            $files = Files::where([['user_id', '=', Auth::user()->id]])->get();
        }
        return view('uploadedFilesList', compact('files'));
    }

    public function uploadFilesForm()
    {
        return view('uploadFilesForm');
    }

    public function fileReasonForm()
    {
        return view('fileReasonForm');
    }

    public function addFileReasonDetail()
    {
        Files::where([['id','=', Input::get('id')]])->update(['reason' => Input::get('reason'), 'status' => Input::get('status')]);
        Session::flash('dataEdit');
        return Redirect::to('/dashboard');
    }

    public function blockOrUnBlockFile()
    {
        $statusToBe = Input::get('statusToBe');
        $status = Input::get('status');

        if($statusToBe == 'decline'):
            if($status == 4):
                $statusToBe = 2;
            elseif($status == 3):
                $statusToBe = 1;
            endif;
            Files::where([['id','=', Input::get('id')]])->update(['status' => $statusToBe]);
        else:
            Files::where([['id','=', Input::get('id')]])->update(['status' => $statusToBe]);
        endif;
    }

    public function uploadFileDetail(Request $request)
    {
        if ($request->file('files')):
            $countFiles = count($request->file('files'));
            for($i = 0; $i < $countFiles; $i++):

                $size = $request->file('files')[$i]->getSize(); // in bytes
                $size = $size / 1048576; // mebibytes with 1 digit
                $hash = hash('sha256',  $request->file('files')[$i]);

                if($size <= 10.0):
                    $file = $request->file('files')[$i]->getClientOriginalName();
                    $filename = pathinfo($file, PATHINFO_FILENAME);
                    $extension = pathinfo($file, PATHINFO_EXTENSION);

                    $file_name = pathinfo($file, PATHINFO_FILENAME).'-'.time().'-'.$i.'.'.$extension;
                    $path = 'app/' . $request->file('files')[$i]->storeAs('public', $file_name);
                    $data['user_id'] = Auth::user()->id;
                    $data['file_name'] = $filename.'-'.time().'-'.$i.'.'.$extension;
                    $data['file_path'] = $path;
                    $data['file_extension'] = $extension;
                    $data['file_size'] = $size;
                    $data['hash'] = $hash;
                    $data['downloaded_date'] = date('Y-m-d');
                    Files::insert($data);
                endif;
            endfor;
        endif;
        Session::flash('dataInsert');
        return Redirect::to('/dashboard');
    }

    public function usersList()
    {
        return view('usersList');
    }

    public function userListDetail()
    {
        $users = Users::all();
        return view('userListDetail', compact('users'));
    }

    public static function deleteInActiveFiles()
    {
        $now = strtotime(date('Y-m-d'));
        $files = Files::all();
        foreach($files as $key => $file):
            $downloaded_date = strtotime($file->downloaded_date);
            $datediff = $now - $downloaded_date;

            if(round($datediff / (60 * 60 * 24)) >= 14):
                Files::where([['id','=', $file->id]])->delete();
            endif;
        endforeach;
    }

    public function downloadFile()
    {
        $file_extension = Input::get('file_extension');
        $file_name = Input::get('file_name');
        $header = 'application';
        if($file_extension == 'pdf'):
            $header = 'application/pdf';
        elseif($file_extension == 'jpg'):
            $header = 'image/jpg';
        endif;
        Files::where([['file_name', '=', $file_name]])->update(['downloaded_date' => date('Y-m-d')]);
        $file = Storage::disk('public')->get($file_name);
        return (new Response($file, 200))
            ->header('Content-Type', $header);

        //$data = array("a" => $a);
//        $ch = curl_init("https://www.tu-chemnitz.de/informatik/DVS/blocklist/e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//
//        $response = curl_exec($ch);
//        return $response;
//        if (!$response)
//        {
//            return false;
//        }
//        $url = '';
//        $responseHeaders = get_headers($url, 1);
//        print_r($responseHeaders);



//        $hash = Input::get('hash');
//        $handle = curl_init('');
//        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
//        $response = curl_exec($handle);
//        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
//        curl_close($handle);




//
//        $client = new Client();
//        $headers = get_headers('https://www.tu-chemnitz.de/informatik/DVS/blocklist/'.$hash);
//        return substr($headers[0], 9, 3);
//        $body = $client->get();
//        print_r(json_decode($body));
    }


}
?>
