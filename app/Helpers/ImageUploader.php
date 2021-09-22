<?php

namespace App\Helpers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use ImageOptimizer;

class ImageUploader {
  private $IMAGE_PATH = 'images';
  private $BASE_PATH = '';



  public function upload($image, $extension) {
    $image_name = Str::uuid();
    $filename = $this->BASE_PATH . $image_name . '.' . $extension;
    $exp = explode(',', $image);
    $base64 = array_pop($exp);
    Storage::disk('image')->put($filename, base64_decode($base64));
    $url = Storage::disk('image')->url($filename);
    return $url;
  }

  public function saveImage(Request $request, $name) {
    if ($request->file($name)) {
      $imagePath = $request->file($name);
      $uuid = Str::uuid()->toString();
      $imageName = $uuid . '-' . $imagePath->getClientOriginalName();
      $request->thumbnail->move(public_path($this->IMAGE_PATH), $imageName);
      // $pathToImage = public_path($this->IMAGE_PATH .'/'. $imageName);
      // ImageOptimizer::optimize($pathToImage);
      return $imageName;
    }
    return '';
  }

  public function saveImages(Request $request, $name) {
    $uploadedImages = [];
    if($files = $request->file($name)){
      foreach($files as $file){          
          $uuid = Str::uuid()->toString();
          $imageName = $uuid . '-' . $file->getClientOriginalName();
          $file->move(public_path($this->IMAGE_PATH), $imageName); 
          // $pathToImage = public_path($this->IMAGE_PATH .'/'. $imageName);
          // ImageOptimizer::optimize($pathToImage);
          array_push($uploadedImages, $imageName);
      }
    }   
    return $uploadedImages;
  }

  public function removeImage(Request $request, $name) {
    $image_path = "/".$this->IMAGE_PATH."/" . $name;
    if(File::exists($image_path)) {
        File::delete($image_path);
    }
  }
  public function uploadPdf($image, $extension) {
    $image_name = Str::uuid();
    $filename = $this->BASE_PATH . $image_name . '.' . $extension;
    $exp = explode(',', $image);
    $base64 = array_pop($exp);
    Storage::disk('pdf')->put($filename, base64_decode($base64));
    $url = Storage::disk('pdf')->url($filename);
    return $filename;
    
  }
}