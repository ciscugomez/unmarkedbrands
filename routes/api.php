<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload-images', function (Request $request) {



    $file   = $request->file('file');
    $url    = $request->get('url');
    $name   = $request->get('name');

    // dd(
    //     Storage::disk('s3')->temporaryUrl('unmarked/social-networks/' . $name, now()->addMinutes(5))
    // );

    $path           = Storage::disk('s3')->put($url.$name, file_get_contents($file));
    $temporaryPath  = Storage::disk('s3')->temporaryUrl($url.$name, now()->addMinutes(5));


    return $temporaryPath;
});
