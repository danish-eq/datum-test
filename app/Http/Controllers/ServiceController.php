<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $services =  Services::orderBy('id', 'desc')->paginate(20);
        $data = [
            'services' => $services
        ];
        
		return view('services.listing' , $data);
    }


    public function add()
    {
    	return view('services.add');
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
   
        $request->image->move(public_path('images/services'), $imageName);

    	$service = new Services;
    	$service->title = $request->title;
    	$service->description = $request->description;
        $service->image = $imageName;
    	$service->status = $request->status;

    	$service->save();
    	return redirect(route('servicelisting'))->with('successMsg' , 'Service added successfully!');
    }



    public function edit($id)
    {
        $services = Services::find($id);
        $data = [
            'services' => $services
        ];
        return view('services.edit' , $data);
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
            $request->image->move(public_path('images/services'), $imageName);    
        }
        

        $services = Services::find($id);
        $services->title = $request->title;
        $services->description = $request->description;
        ($request->image != '' ? $services->image = $imageName : '');
        $services->status = $request->status;

        $services->save();
        return redirect(route('servicelisting'))->with('successMsg' , 'Service updated successfully!');   
    }


    public function delete($id)
    {
        Services::find($id)->delete();
        return redirect(route('servicelisting'))->with('successMsg' , 'Service deleted successfully!');
    }



    public function detail($id)
    {
    	$service = Services::find($id);
    	$data = [
            'services' => $service
        ];
        
		return view('services.detail' , $data);	
    }


}
