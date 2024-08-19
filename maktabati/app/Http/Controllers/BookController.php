<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use App\Http\Controllers\Book;

class BookController extends Controller
{
   
    public function index()
    {
        $books = Book::all();
        
        return view('index', compact('books'));
    }

    public function search(Request $request )
    {
        $books = Book::all();
        if ($request->has('search')) {
         $getsearch = $request->get('search');
         $booksearch = Book::query()->where('title','like','%'. $getsearch .'%')->get();
        //  return view('index', [compact($booksearch)]);
        return view('index', ['booksearch' => $booksearch , 'books' =>$books ]);
    
        };
        return view('index')->with('message','No search ');
    }

 
    public function create(Book $book)
    {
      return view("create");
    }

 
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:150',
            'author' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 
    
       
        // if ($request->hasFile('image')) {
             
        //     $path = $request->file('image')->store('books');
        //     $data['image'] = $path;
        // }
        
        // if ($request->hasFile('file')) {
        
        //     $path = $request->file('file')->store('files');
        //     $data['file'] = $path;
        // }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); 
            $imagePath = $image->storeAs('books', $imageName);
            $data['image'] = $imagePath;
        }
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); 
            $filePath = $file->storeAs('files', $fileName);
            $data['file'] = $filePath;
        }
        
        
        Book::create($data);
        // @dd($data); 
        $books = Book::all();
        return view('index', compact('books'));

    }


    public function download($id)
    {
    $book = Book::findOrFail($id);

    if ($book->file) {
        return Storage::download($book->file);
    }

    return redirect()->back()->with('error', 'File not found.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
       
        return view('edit', compact('book'));

    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'author' => 'required|string',
            'file' => 'nullable|mimes:pdf',
            'image' => 'nullable|image',
        ]);
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        if ($request->hasFile('image')) { $book->image = $request->file('image')->store('images'); }

          if ($request->hasFile('file')) { $book->file = $request->file('file')->store('files'); }
    
    
        $book->save();
    
        return redirect()->route('index', $book->id);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/index');
    }
 
}
