@extends('layouts.main')

@section('content')

<div class="content">

  @if($errors->any())
    @foreach($errors->all() as $error)
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        </div>
      </div>
    @endforeach
  @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> CMS - Detail 
                	<span class="float-right"> 
                		<a href="{{route('cmsadd')}}" class="btn">+ Add Page</a>
                	</span>
                  <a href="{{route('cmsedit' , $cms->id)}}" class="btn btn-raised btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                  <form method="POST" id="delete-form-{{$cms->id}}" action="{{route('cmsdelete' , $cms->id)}}" style="display: none;">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                  </form>
                  <button onclick="if(confirm('Are you sure you want to delete?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{$cms->id}}').submit();
                  }else{
                     event.preventDefault();      
                  }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                </h4>
              </div>
              <div class="card-body">
                  <div class="row">  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Title</label>
                        {{$cms->title}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                          <div class="col-md-12">
                            {{$cms->status}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label>
                        {!! $cms->description !!}
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
          </div>
          
        </div>
      </div>
@endsection