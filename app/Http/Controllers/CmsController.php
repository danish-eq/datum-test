<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsModel;
class CmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cms =  CmsModel::orderBy('id', 'desc')->paginate(20);
        $data = [
            'cms' => $cms
        ];
        
		return view('cms.listing' , $data);
    }


    public function add()
    {
    	return view('cms.add');
    }



    public function save(Request $request)
    {
    	$this->validate($request , [
    		'title' => 'required',
    		'status' => 'required',
    		'description' => 'required'
    	]);

    	$cms = new CmsModel;
    	$cms->title = $request->title;
    	$cms->description = $request->description;
        $cms->status = $request->status;

    	$cms->save();
    	return redirect(route('cmslisting'))->with('successMsg' , 'CMS page added successfully!');
    }


    public function edit($id)
    {
        $cms = CmsModel::find($id);
        $data = [
            'cms' => $cms
        ];
        return view('cms.edit' , $data);
    }



    public function update(Request $request,$id)
    {
        $this->validate($request , [
            'title' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);

        $cms = CmsModel::find($id);
        $cms->title = $request->title;
        $cms->description = $request->description;
        $cms->status = $request->status;

        $cms->save();
        return redirect(route('cmslisting'))->with('successMsg' , 'CMS page updated successfully!');
    }



    public function delete($id)
    {
        CmsModel::find($id)->delete();
        return redirect(route('cmslisting'))->with('successMsg' , 'CMS page deleted successfully!');
    }


    public function detail($id)
    {
        $cms = CmsModel::find($id);
        $data = [
            'cms' => $cms
        ];
        
        return view('cms.detail' , $data); 
    }


}
