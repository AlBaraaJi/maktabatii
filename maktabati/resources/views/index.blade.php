
@extends('nav')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@if(isset($booksearch))

@foreach ( $booksearch as $book )
    

<div class=" flex-row ">




  <div class="card-group col-md-4  mb-5">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $book->image) }}" class="card-image" width="130px !important" height="130px" alt="no image">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          
          <p class="card-text">{{$book->description}}</p>
          
          <div class="d-flex">
            @auth
            <form action="/delete/{{$book->id}}" method="POST">
              @method('DELETE')
              @csrf
                  <input type="submit" class="btn-delete btn-danger btn" value="delete" >
          </form> 
            @endauth
            
              <form action="{{ route('books.download', $book->id) }}" method="GET">
              @csrf
              <input type="submit" class="btn-download btn-primary btn" value="Download" >
            </form>
        </div>
        </div>
      </div>
</div>
</div>

@endforeach



@else


@foreach ( $books as $book)
    
<div class=" flex-row ">
<div class="card-group col-md-4  mb-5">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $book->image) }}" class="card-image" width="130px !important" height="130px" alt="no image">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          
          <p class="card-text">{{$book->description}}</p>
          
          <div class="d-flex">
            @auth
              
            <form action="/delete/{{$book->id}}" method="POST">
                @method('DELETE')
                @csrf
                    <input type="submit" class="btn-delete btn-danger btn" value="delete" >
            </form>

            <form action="{{ route('book.edit', $book) }}" method="POST">
              @method('PUT')
              @csrf
              <input type="submit" class="btn-edit btn-success btn" value="Edit">
          </form>
          
            @endauth  
              <form action="{{ route('books.download', $book->id) }}" method="GET">
              @csrf
              <input type="submit" class="btn-download btn-primary btn" value="Download" >
            </form>
        </div>
        </div>
      </div>
</div>
</div>

@endforeach

@endif



@endsection
