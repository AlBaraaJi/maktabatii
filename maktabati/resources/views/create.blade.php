<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form action="/store" method="POST" enctype="multipart/form-data">
   @csrf
   
    <div class="mb-3">
      <label for="title" class="form-label">Book Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control" cols="20" rows="5"></textarea>
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" class="form-control" id="author" name="author">
    </div>
    {{-- <input name="file" type="file" accept=".pdf"> --}}
    <input name="file" type="file"">

    <div class="mb-3">
        <label for="image" class="form-label">Book Cover</label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
