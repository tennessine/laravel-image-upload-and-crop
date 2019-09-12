<?php

use Illuminate\Http\Request;

Route::get('/', function () {
	return view('welcome');
});

Route::post('/upload', function (Request $request) {
	if ($request->has('photo')) {
		$photo = $request->file('photo');

		$filename = uniqid('1_') . '.' . $photo->getClientOriginalExtension();
		$path = sprintf('%s/%s/', date('Y'), date('m'));
		$savePath = $path . $filename;
		Storage::disk('profile')->put($savePath, File::get($photo));

		$thumb = Image::make($photo);
		$thumb->fit(200);
		$jpg = (string) $thumb->encode('jpg');

		$thumbName = pathinfo($filename, PATHINFO_FILENAME) . '-thumb.jpg';
		Storage::disk('profile')->put($path . $thumbName, $jpg);

		return Storage::disk('profile')->url($path . $thumbName);
	}
})->name('upload');