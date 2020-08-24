@extends('layouts.main')

@section('content')
<div class="content">
	<!-- Start side menu -->
	@include('includes.messagebar')
	<!-- End side menu -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Services 
                	<span class="float-right"> 
                		<a href="{{route('serviceadd')}}" class="btn">+ Add Service</a>
                	</span></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Image</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Date Added</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
	                    @foreach($services as $row)
	                      <tr>
	                        <td><img src="{{ ($row->image == '' ?  asset('public/images/noimage.png') : asset('public/images/services/'.$row->image) )  }}" class="thumbnail" /></td>
	                        <td>{{$row->title}}</td>
	                        <td>{{$row->status}}</td>
	                        <td>{{$row->created_at}}</td>
	                        <td>
                            <a href="{{route('servicedetail' , $row->id)}}" class="btn btn-raised btn-primary btn-sm">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
	                        	<a href="{{route('serviceedit' , $row->id)}}" class="btn btn-raised btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
	                        	<form method="POST" id="delete-form-{{$row->id}}" action="{{route('servicedelete' , $row->id)}}" style="display: none;">
	                        		{{csrf_field()}}
	                        		{{method_field('delete')}}
	                        	</form>
                        		<button onclick="if(confirm('Are you sure you want to delete?')){
                        			event.preventDefault();
                        			document.getElementById('delete-form-{{$row->id}}').submit();
                        		}else{
									event.preventDefault();
                        			
                        		}" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                        		</button>
	                        	
	                        	
	                        </td>
	                      </tr>
	                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$services->links()}}
              </div>
            </div>
          </div>
          
        </div>
      </div>
@endsection