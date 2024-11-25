<?php

namespace App\Http\Controllers;

use App\Models\Dashboard\BlogModel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use HasFactory;

    // public function __construct(){
    //     $this->middleware('admin');
    // }

    public function index()
    {
        $blogs = BlogModel::where('user_id', Auth::id())->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_blog' => 'required|string',
            'desc_blog' => 'required|string',
            'content' => 'required|string',
        ]);

        $input = $request->all();

        // Add the authenticated user's ID to the input data
        $input['user_id'] = auth()->id();

        if ($image = $request->file('image')) {

            $destinationPath = 'images/blogs';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }

        BlogModel::create($input);

        notify('success', 'Blog Has Been Created');
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog created successfully');
    }



    public function edit(BlogModel $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_blog' => 'required|string',
            'desc_blog' => 'required|string',
            'content' => 'required|string',
        ]);

        $blog = BlogModel::findOrFail($id);

        // Check if the authenticated user is the owner of the blog
        if ($blog->user_id !== auth()->id()) {
            return redirect()->route('dashboard.blogs.index')->with('error', 'You do not have permission to update this blog');
        }

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/blogs';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if (file_exists($destinationPath . $blog->image)) {
                unlink($destinationPath . $blog->image);
            }

            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            // Keep the old image if no new image is uploaded
            $input['image'] = $blog->image;
        }

        $blog->update($input);

        notify('success', 'Blog has been updated');
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function show(BlogModel $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = BlogModel::findOrFail($id);

        // Check if the authenticated user is the owner of the blog
        if ($blog->user_id !== auth()->id()) {
            return redirect()->route('dashboard.blogs.index')->with('error', 'You do not have permission to delete this blog');
        }

        $destinationPath = 'images/blogs';

        // Delete the image file if it exists
        if ($blog->image && file_exists($destinationPath . $blog->image)) {
            unlink($destinationPath . $blog->image);
        }

        $blog->delete();

        notify('success', 'Blog has been deleted');
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog deleted successfully');
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
