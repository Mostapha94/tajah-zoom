<?php
namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Zoom;
use Carbon\Carbon;
class MeetingController extends Controller
{
    // const MEETING_TYPE_INSTANT = 1;
    // const MEETING_TYPE_SCHEDULE = 2;
    // const MEETING_TYPE_RECURRING = 3;
    // const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $user=Zoom::user()->find('mostapha.elsayed94@gmail.com'); // by id or email
        $meetings=$user->meetings()->all();
        return view('zoom.add-meeting',compact('meetings'));
    }
    
    //create meeting
    public function createMeeting(Request $request)
    {
        $user=Zoom::user()->find('mostapha.elsayed94@gmail.com'); // by id or email
        $meetings=$user->meetings()->all();
        return view('zoom.add-meeting',compact('meetings'));
    }
    //create meeting
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
        ]);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $meeting=Zoom::user()->find('mostapha.elsayed94@gmail.com')->meetings()->make([
        'topic' => $request->topic,
        'type' => 2,
        'start_time' => new Carbon($request->start_time), // best to use a Carbon instance here.
        ]); // by id or email

        //when type =8
        // $meeting->recurrence()->make([
        // 'type' => 2,
        // 'repeat_interval' => 1,
        // 'weekly_days' => '2',
        // 'end_times' => 5
        // ]);
        $meeting->save();
        return redirect()->route('meeting.index');
    }

    //get
    public function get(Request $request, string $id)
    {
        return $meeting=Zoom::meeting()->find($id);
    }
    //update
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        
        $meeting=Zoom::meeting()->find($id)->update([
            'topic' => $request->topic,
            'type' => 1,
            'start_time' => new Carbon($request->start_time), // best to use a Carbon instance here.
        ]);
        return redirect()->route('meeting.index');
    }
    //delete
    public function delete(Request $request, string $id)
    {
        $meeting=Zoom::meeting()->find($id);
        $meeting->delete();
        return redirect()->route('meeting.index');
    }
}