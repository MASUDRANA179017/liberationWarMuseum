<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use App\Models\ExhibitionCategory;
use App\Models\ExhibitionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExhibitionController extends Controller
{
    private function handleFileUpload($file, $path)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }

    public function category()
    {
        $categories = ExhibitionCategory::all();
        return view('admin.exhibition.exhibition-category', compact('categories'));
    }

    public function index()
    {
        $exhibitions = Exhibition::all();
        $categories = ExhibitionCategory::all();
        return view('admin.exhibition.index', compact('exhibitions', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exhibition_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'director_name' => 'nullable|string|max:255',
            'synopsis' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $exhibition = new Exhibition();
        $exhibition->exhibition_title = $request->exhibition_title;
        $exhibition->director_name = $request->director_name;
        $exhibition->synopsis = $request->synopsis;
        $exhibition->slug = Str::slug($request->exhibition_title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $exhibition->image = $this->handleFileUpload($request->file('image'), 'exhibition');
        }

        if ($request->hasFile('video')) {
            $exhibition->video = $this->handleFileUpload($request->file('video'), 'exhibition_videos');
        }

        $exhibition->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $this->handleFileUpload($file, 'exhibition_images');

                ExhibitionImage::create([
                    'exhibition_id' => $exhibition->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('exhibition.index')->with('success', 'Exhibition created successfully.');
    }

    public function toggleStatus($id)
    {
        $exhibition = Exhibition::findOrFail($id);
        $exhibition->status = !$exhibition->status;
        $exhibition->save();
        return redirect()->route('exhibition.index')->with('success', 'Exhibition status updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'exhibition_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'director_name' => 'nullable|string|max:255',
            'synopsis' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $exhibition = Exhibition::findOrFail($id);
        $exhibition->exhibition_title = $request->exhibition_title;
        $exhibition->director_name = $request->director_name;
        $exhibition->synopsis = $request->synopsis;

        if ($request->hasFile('image')) {
            $this->handleFileDelete($exhibition->image);
            $exhibition->image = $this->handleFileUpload($request->file('image'), 'exhibition');
        }

        if ($request->hasFile('video')) {
            $this->handleFileDelete($exhibition->video);
            $exhibition->video = $this->handleFileUpload($request->file('video'), 'exhibition_videos');
        }

        $exhibition->save();

        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $this->handleFileUpload($file, 'exhibition_images');
                ExhibitionImage::create([
                    'exhibition_id' => $exhibition->id,
                    'image' => $path
                ]);
            }
        }
        return redirect()->route('exhibition.index')->with('success', 'Exhibition updated successfully.');
    }

    public function destroy($id)
    {
        $exhibition = Exhibition::findOrFail($id);
        $this->handleFileDelete($exhibition->image);

        foreach ($exhibition->images as $image) {
            $this->handleFileDelete($image->image);
        }

        $exhibition->delete();
        return redirect()->route('exhibition.index')->with('success', 'Exhibition deleted successfully.');
    }

    public function getImages($id)
    {
        $images = ExhibitionImage::where('exhibition_id', $id)->get();
        return response()->json($images);
    }

    public function deleteImage($id)
    {
        $image = ExhibitionImage::findOrFail($id);
        $this->handleFileDelete($image->image);
        $image->delete();
        return response()->json(['success' => true]);
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = new ExhibitionCategory();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('exhibition.category')->with('success', 'Exhibition category created successfully.');
    }

    public function categoryToggleStatus($id)
    {
        $category = ExhibitionCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        return redirect()->route('exhibition.category')->with('success', 'Exhibition category status updated successfully.');
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = ExhibitionCategory::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('exhibition.category')->with('success', 'Exhibition category updated successfully.');
    }

    public function categoryDestroy($id)
    {
        $category = ExhibitionCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('exhibition.category')->with('success', 'Exhibition category deleted successfully.');
    }
}
