<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




{{-- <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Book Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control" cols="20" rows="5">{{$book->description}}</textarea>
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" class="form-control" id="author" name="author" value=" {{$book->author}} ">
    </div>
    <label class="form-label" for="file">file</label>
    <input name="file" type="file" accept=".pdf" value="{{$book->file}}"> 


    <div class="mb-3">
        <label for="image" class="form-label">Book Cover</label>
        <input type="file" name="image" id="image" class="form-control" >
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}
<form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
     <label for="title" class="form-label">Book Title</label>
     <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
  </div>
  <div class="mb-3">
     <label for="description" class="form-label">Description</label>
     <textarea name="description" id="description" class="form-control" cols="20" rows="5">{{ old('description', $book->description) }}</textarea>
  </div>
  <div class="mb-3">
     <label for="author" class="form-label">Author</label>
     <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}">
  </div>
  <div class="mb-3">
     <label class="form-label" for="file">File</label>
     <input name="file" type="file" accept=".pdf">
  </div>
  <div class="mb-3">
     <label for="image" class="form-label">Book Cover</label>
     <input type="file" name="image" id="image" class="form-control">
     @error('image')
         <div class="text-danger">{{ $message }}</div>
     @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

