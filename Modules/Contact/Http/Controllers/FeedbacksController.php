<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Feedback;

class FeedbacksController extends Controller
{
    public function create(Request $request){
        $params = array('email'=>$request['email'],
            'content'=> $request['content']);
        Feedback::create($params);
    }
}
