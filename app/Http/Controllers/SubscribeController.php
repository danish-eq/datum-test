<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $subscribers =  Subscribe::orderBy('id', 'desc')->paginate(20);
        $data = [
            'subscribers' => $subscribers
        ];
        
		return view('subscribers.listing' , $data);
    }



    public function delete($id)
    {
        Subscribe::find($id)->delete();
        return redirect(route('subscriptionlist'))->with('successMsg' , 'Email deleted successfully!');
    }
}
