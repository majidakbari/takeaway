<?php
Route::get('/', function (){
   return response()->json(['hi' => 1]);
});
