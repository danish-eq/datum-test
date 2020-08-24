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
                <h4 class="card-title"> Subscription </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Email</th>
                      <th>Date Added</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
	                    @foreach($subscribers as $row)
	                      <tr>
	                        <td>{{$row->email}}</td>
	                        <td>{{$row->created_at}}</td>
	                        <td>
	                        	<form method="POST" id="delete-form-{{$row->id}}" action="{{route('subscriptiondelete' , $row->id)}}" style="display: none;">
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
                {{$subscribers->links()}}
              </div>
            </div>
          </div>
          
        </div>
      </div>
@endsection