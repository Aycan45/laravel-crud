@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Edit Web stream</h1>
  <div>
      <form method="post" action="{{ route('webstream.update', $webstream->id) }}">
            @method('PATCH') 
            @csrf
          <div class="form-group">    
              <label for="first_name">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$webstream->title}}"/>
          </div>

          <div class="form-group">
              <label for="last_name">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$webstream->description}}"/>
          </div>

          <div class="form-group">
              <label for="email">Price:</label>
              <input type="number" class="form-control" name="tokens_price" value="{{$webstream->tokens_price}}"/>
          </div>
          <div class="form-group">
              <label for="city">Type:</label>
              <input type="number" class="form-control" name="type" value="{{$webstream->type}}"/>
          </div>
          <div class="form-group">
              <label for="country">Date:</label>
              <input type="date" class="form-control" name="date_expiration" value="{{$webstream->date_expiration}}"/>
          </div>              
          <button type="submit" class="btn btn-primary mt-2">Update</button>
      </form>
      <a class="btn btn-success mt-2" href="/">Back</a>
  </div>
</div>
</div>
@endsection