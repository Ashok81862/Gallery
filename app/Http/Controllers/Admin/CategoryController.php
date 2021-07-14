<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required','max:100'],
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success','New Category has been Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'  => ['required','max:100'],
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success','Category has been Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success','Category has been Deleted Successfully !!');
    }

    public function photos(Category $category)
    {
        return view('admin.categories.photos', compact('category'));
    }

    public function addPhoto(Request $request, Category $category)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,gif,jpeg',
        ]);

        $media_id = MediaService::upload($request->file('image'), "categorieis");

        $category->medias()->attach(Media::find($media_id));

        return redirect()
            ->route('admin.categories.photos', $category->id)
            ->with('success', 'File uploaded successfully!');
    }

    public function removePhoto(Request $request, Category $category)
    {
        $request->validate([
            'media_id' => 'required|exists:media,id',
        ]);

        $media = Media::find($request->media_id);

        $media->delete();

        return redirect()
            ->route('admin.categories.photos', $category->id)
            ->with('success', 'File removed successfully!');
    }
}
