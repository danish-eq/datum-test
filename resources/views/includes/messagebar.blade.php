@if(session('successMsg'))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          {{session('successMsg')}}
        </div>
      </div>
    </div>
  @endif