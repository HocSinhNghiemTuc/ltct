<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('contact::index',compact('feedbacks'));
    }
    public function solved(Request $request){
        $feedback = Feedback::find($request['id']);
        $feedback['status'] = !$feedback['status'];
        $feedback->save();
    }
}
