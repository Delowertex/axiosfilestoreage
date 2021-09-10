<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class UploadController extends Controller
{
    // public function onFileUp(Request $request){
    //     $result = $request->file('filekey')->store('images');
    //     return $result;
    // }
    
    public function uploadPercentage(Request $request){
        $result = $request->file('filekey')->store('images');
        return $result;
    }


}
