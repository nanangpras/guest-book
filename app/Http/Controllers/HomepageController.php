<?php

namespace App\Http\Controllers;

use App\Helpers\ImageUploader;
use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use Exception;
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

    public function createStepOne(Request $request)
    {
        $guest = $request->session()->get('guest');

        return view('home.pages.create-step-one',compact('guest'));
    }

    public function postStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        if(empty($request->session()->get('guest'))){
            $tamu = new Guest();
            $tamu->fill($validatedData);
            $request->session()->put('guest', $tamu);
        }else{
            $tamu = $request->session()->get('guest');
            $tamu->fill($validatedData);
            $request->session()->put('guest', $tamu);
        }
        return redirect()->route('guest.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $guest = $request->session()->get('guest');

        return view('home.pages.create-step-two',compact('guest'));
    }

    public function postStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'saying' => 'required'
        ]);

        $tamu = $request->session()->get('guest');
        $tamu->fill($validatedData);
        $request->session()->put('guest', $tamu);

        return redirect()->route('guest.step.three');
    }

    public function createStepThree(Request $request)
    {
        $guest = $request->session()->get('guest');

        return view('home.pages.create-step-three',compact('guest'));
    }

    public function postStepThree (Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required'
        ]);

        

        try {
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

            $tamu = $request->session()->get('guest');
            $tamu->image = $file_name;
            $tamu->save();
            // dd($tamu);
            $request->session()->forget('guest');
        } catch (Exception $e) {
            return $e;
        }

        return redirect()->route('alert');
    }
}
