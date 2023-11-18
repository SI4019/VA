<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{    
    /**
 * index
 *
 * @return \Illuminate\Contracts\View\View
 */
public function index()
{
    $blogs = Blog::latest()->paginate(10);
    return view('blog.index', compact('blogs'));
}
/**
* create
*
* @return \Illuminate\Contracts\View\View
*/
public function create()
{
    return view('blog.create');
}


/**
* store
*
* @param  \Illuminate\Http\Request $request
* @return \Illuminate\Http\RedirectResponse
*/
public function store(Request $request)
{
    $this->validate($request, [
        'image'     => 'required|image|mimes:png,jpg,jpeg',
        'title'     => 'required',
        'content'   => 'required'
    ]);

    //upload image
    $image = $request->file('image');
    $image->storeAs('public/blogs', $image->hashName());

    $blog = Blog::create([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'content'   => $request->content
    ]);

    if($blog){
        //redirect dengan pesan sukses
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}
/**
 * edit
 *
 * @param  \App\Models\Blog  $blog
 * @return \Illuminate\Contracts\View\View
 */
public function edit(Blog $blog)
{
    return view('blog.edit', compact('blog'));
}

/**
 * update
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Blog  $blog
 * @return \Illuminate\Http\RedirectResponse
 */
public function update(Request $request, Blog $blog)
{
    $this->validate($request, [
        'title'     => 'required',
        'content'   => 'required'
    ]);

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Remove old image
        Storage::disk('local')->delete('public/blogs/' . $blog->image);

        // Upload new image
        $image = $request->file('image');
        $imagePath = $image->storeAs('public/blogs', $image->hashName());

        $blog->update([
            'image'     => basename($imagePath),
            'title'     => $request->title,
            'content'   => $request->content
        ]);
    } else {
        // Update without changing the image
        $blog->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);
    }

    // Check if the update was successful
    if ($blog) {
        // Redirect with success message
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
    } else {
        // Redirect with error message
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
/**
 * destroy
 *
 * @param  mixed $id
 * @return \Illuminate\Http\RedirectResponse
 */
public function destroy($id)
{
    $blog = Blog::findOrFail($id);

    // Delete image from storage
    Storage::delete('public/blogs/' . $blog->image);

    // Delete the blog entry
    $blog->delete();

    // Check if the deletion was successful
    if ($blog) {
        // Redirect with success message
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
    } else {
        // Redirect with error message
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
}

}