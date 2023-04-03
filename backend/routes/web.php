<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
  // $visited = DB::select('select * from places where visited = ?', [1]); 
  // $togo = DB::select('select * from places where visited = ?', [0]);

  // return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
  return view('welcome');
});


Route::resource("folders", FoldersController::class);
Route::resource("image", ImageController::class);
Route::resource("User", ImageController::class);