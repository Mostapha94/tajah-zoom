<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Get list of meetings.
Route::get('/meetings', 'Zoom\MeetingController@list')->name('meeting.index');

// Create meeting room using topic, agenda, start_time.
Route::get('/create-meeting', 'Zoom\MeetingController@createMeeting');
Route::post('/meetings', 'Zoom\MeetingController@create')->name('meeting.store');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::post('/delete-meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+')->name('meetings.delete');