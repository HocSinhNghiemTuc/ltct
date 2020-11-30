<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderByRaw('is_solved','DESC')->get();
        return view('contact::feedback',compact('feedbacks'));
    }
    public function solved(Request $request){
        $feedback = Feedback::find($request['id']);
        $feedback['is_solved'] = !$feedback['is_solved'];
        $feedback->save();
        return redirect()->route('feedback.index', [$feedback]);
    }
}
