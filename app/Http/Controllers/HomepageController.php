<?php

namespace App\Http\Controllers;

use App\Helpers\ImageUploader;
use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function index()
    {
        return view('home.pages.home');
    }

    public function alert()
    {
        return view('home.pages.alert');
    }

    public function createImageFromBase64(GuestRequest $request)
    {

        $name = $request->input('name');
        $address = $request->input('address');
        $saying = $request->input('saying');
        $file_data = $request->input('image');

        $image = str_replace('data:image/jpeg;base64,', '', $file_data);
        //generating unique file name;
        $file_name = 'image_' . time() . '.png';
        //@list($type, $file_data) = explode(';', $file_data);
        //@list(, $file_data)      = explode(',', $file_data);
        if ($file_data != "") {
            // storing image in storage/app/public Folder
            Storage::disk('image')->put($file_name, base64_decode($file_data));
            // $url = Storage::disk('image')->url($file_name);
        }

        $data = array(
            'name' => $name,
            'address' => $address,
            'saying' => $saying,
            'image' => $file_name
        );

        // dd($data);
        Guest::create($data);
        return redirect()->route('alert');
    }
}
