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
                <h4 class="card-title"> News - Edit 
                	<span class="float-right"> 
                		<a href="{{route('newsadd')}}" class="btn">+ Add News</a>
                	</span></h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('newsupdate' , $news->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" id="title" value="{{$news->title}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Image</label>
                        <div>
                          <img src="{{ ($news->image == '' ?  asset('public/images/noimage.png') : asset('public/images/news/'.$news->image) )  }}" class="thumbnail" />

                        </div>
                        <br />
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="image" id="image">
                          <label class="custom-file-label" for="customFileLang">Select Image</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="active" name="status" value="Active"
                                    @if($news->status =='Active' ) checked @endif >
                              <label class="custom-control-label" for="active">Active</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="inactive" name="status" value="Inactive"  @if($news->status=='Inactive' ) checked @endif >
                              <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description">{{$news->description}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary btn-round" name="btnsub" id="btnsub">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error=>{
        console.error(error);
    });                                             
</script>      
@endsection