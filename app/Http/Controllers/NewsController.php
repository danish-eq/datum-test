<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $news =  News::orderBy('id', 'desc')->paginate(20);
        $data = [
            'news' => $news
        ];
        
		return view('news.listing' , $data);
    }



    public function add()
    {
    	return view('news.add');
    }



    public function save(Request $request)
    {
    	$this->validate($request , [
    		'title' => 'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    		'status' => 'required',
    		'description' => 'required'
    	]);

        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images/news'), $imageName);

    	$news = new News;
    	$news->title = $request->title;
    	$news->description = $request->description;
        $news->image = $imageName;
    	$news->status = $request->status;

    	$news->save();
    	return redirect(route('newslisting'))->with('successMsg' , 'News added successfully!');
    }



    public function edit($id)
    {
        $news = News::find($id);
        $data = [
            'news' => $news
        ];
        return view('news.edit' , $data);
    }



    public function update(Request $request,$id)
    {
        $this->validate($request , [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'required',
            'description' => 'required'
        ]);

        
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/news'), $imageName);    
        }
        

        $news = News::find($id);
        $news->title = $request->title;
        $news->description = $request->description;
        ($request->image != '' ? $news->image = $imageName : '');
        $news->status = $request->status;

        $news->save();
        return redirect(route('newslisting'))->with('successMsg' , 'News updated successfully!');   
    }



    public function delete($id)
    {
        News::find($id)->delete();
        return redirect(route('newslisting'))->with('successMsg' , 'News deleted successfully!');
    }



    public function detail($id)
    {
        $news = News::find($id);
        $data = [
            'news' => $news
        ];
        
        return view('news.detail' , $data); 
    }

}
