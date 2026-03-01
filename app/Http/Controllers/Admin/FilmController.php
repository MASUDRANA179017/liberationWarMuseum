<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use App\Models\FilmImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
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

    public function index()
    {
        $films = Film::get();
        log::info($films);
        return view('admin.film.index', [
            'films' => $films,
        ]);
    }

    public function toggleStatus($id)
    {
        $film = Film::findOrFail($id);
        $film->status = !$film->status;
        $film->save();
        return redirect()->route('film.index')->with('success', 'status updated successfully.');
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('admin.film.edit', compact('film'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'film_name'         => 'required|string|max:255',
            'synopsis'       => 'nullable|string',
            'director_name' => 'nullable|string|max:255',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480',
            'image.*'          => 'required|mimes:pdf,doc,docx,ppt,pptx,zip,rar,jpg,jpeg,png,gif',
            'status'        => 'boolean',
        ]);

        $film = new Film();
        $film->film_name = $request->film_name;
        $film->slug = Str::slug($request->film_name);
        $film->synopsis = $request->synopsis;
        $film->director_name = $request->director_name;

        if ($request->hasFile('video')) {
            $film->video = $this->handleFileUpload($request->file('video'), 'film_videos');
        }

        $film->save();

        // multiple images save
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image) {
                    $film_image = new FilmImage();
                    $film_image->film_id = $film->id;
                    $film_image->image = $this->handleFileUpload($image, 'film_images');
                    $film_image->save();
                }
            }
        }

        return redirect()->route('film.index')->with('success', 'Film created successfully.');
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $request->validate([
            'film_name'             => 'required|string|max:255',
            'synopsis'      => 'nullable|string',
            'director_name' => 'nullable|string|max:255',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480',
            'images.*'         => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'status'           => 'boolean',
        ]);

        // Update main film
        $film->film_name = $request->film_name;
        $film->slug = Str::slug($request->film_name);
        $film->synopsis = $request->synopsis;
        $film->director_name = $request->director_name;
        $film->status = $request->status ?? $film->status;

        if ($request->hasFile('video')) {
            if ($film->video) {
                $this->handleFileDelete($film->video);
            }
            $film->video = $this->handleFileUpload($request->file('video'), 'film_videos');
        }

        $film->save();

        // Handle new uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image) {
                    $film_image = new FilmImage();
                    $film_image->film_id = $film->id;
                    $film_image->image = $this->handleFileUpload($image, 'film_images');
                    $film_image->save();
                }
            }
        }

        return redirect()->route('film.index')->with('success', 'Film updated successfully.');
    }

    public function removeImage($id)
    {
        $image = FilmImage::findOrFail($id);

        if ($image->image) {
            $this->handleFileDelete($image->image);
        }

        $image->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Image deleted successfully'
        ]);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);

        if ($film->images && $film->images->count() > 0) {
            foreach ($film->images as $img) {
                $this->handleFileDelete($img->image);
            }
        }

        $film->delete();

        return redirect()->route('film.index')->with('success', 'Film and its images deleted successfully.');
    }
}
