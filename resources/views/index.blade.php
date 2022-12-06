@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contacts</h1> 
    <a href="{{ route('webstream.create')}}" class="btn btn-primary">Add stream</a>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Description</td>
          <td>Price</td>
          <td>Type</td>
          <td>Date</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($webstreams as $webstream)
        <tr>
            <td>{{$webstream["id"]}}</td>
            <td>{{$webstream["title"]}}</td>
            <td>{{$webstream["description"]}}</td>
            <td>{{$webstream["tokens_price"]}}</td>
            <td>{{$webstream["type"]}}</td>
            <td>{{$webstream["date_expiration"]}}</td>
            <td>
                <a href="{{ route('webstream.edit',$webstream['id'])}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('webstream.destroy', $webstream['id'])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{-- Pagination --}}
      <div class="d-flex justify-content-center">
          {{ $webstreams->links() }}
      </div>
<div>
</div>
@endsection