<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutKeypoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('admin.about-us.index', [
            'abouts' => $abouts,
        ]);
    }
    private function handleFileUpload($file, $path)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
        }
    }

    public function toggleStatus($id)
    {
        $about = About::findOrFail($id);
        $about->status = !$about->status;
        $about->save();
        return redirect()->route('about-us')->with('success', 'About status updated successfully.');
    }
    public function edit($id)
    {
        $about = About::findOrFail($id);

        return view('admin.about-us.edit', [
            'about' => $about,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6020',
            'video_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',

            'about_points.*' => 'required|string',

            
        ]);
        
        $about = About::findOrFail($id);

        // dd($request->about_points);

        $about->title = $request->title;
        $about->description = $request->description;

        // $about->video_thumb = $request->video_thumb;
        if ($request->hasFile('video_thumb')) {
            $this->handleFileDelete($about->video_thumb);
            $about->video_thumb = $this->handleFileUpload($request->file('video_thumb'), 'about/video_thumb');
        }
        
        $about->video_link = $request->video_link;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $this->handleFileDelete($about->image);
            $about->image = $this->handleFileUpload($request->file('image'), 'about/image');
        }

        $about->about_points = json_encode($request->about_points);


        
        $about->save();

        return redirect()->route('about-us')->with('success', 'About Us updated successfully.');
    }

    public function removePoint(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $points = json_decode($about->about_points, true);

        if (isset($points[$request->index])) {
            unset($points[$request->index]);
            $points = array_values($points); // reindex array
            $about->about_points = json_encode($points);
            $about->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }




}
