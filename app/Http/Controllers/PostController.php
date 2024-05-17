<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'image'=> ['required', 'max:2028', 'image'],
        'title'=> ['required', 'max:2028', ],
        'description'=> ['required']
       ]);
    //    dd('success');

    //    $fileName = time().'_'.$request->image->getClientOriginalName();
    //    $filePath = $request->image->storeAs("uploads", $fileName);

       $fileName = time() . '_' . $request->image->getClientOriginalName();
       $filePath = $request->image->storeAs('uploads', $fileName);

    //    return $filePath;
    
    $post= new Post();
    $post->title= $request->title;
    $post->description= $request->description;
    $post->image =  $filePath ;
    $post->save();
    return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=> ['required', 'max:2028', ],
            'description'=> ['required']
           ]);
           $post= Post::findOrFail($id);

           if($request->hasFile('image')){

            $request->validate([
                'image'=> ['required', 'max:2028', 'image'],
               ]);
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);
            File::delete(public_path($post->image));
            $post->image =  'storage/'.$filePath ;
           }

           
   
   

        $post->title= $request->title;
        $post->description= $request->description;
        
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    //    return $id;
    $post= Post::findOrFail($id);
    $post->delete();
    return redirect()->route('post.index');
    }
}
