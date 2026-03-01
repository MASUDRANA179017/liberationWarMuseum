<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keypoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeypointController extends Controller
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

    public function index(){
        return view('admin.keypoint.index');
    }

    public function list()
    {
        $keypoints = Keypoint::all();

        return response()->json($keypoints);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $keypoint = new Keypoint();
        $keypoint->title = $request->title;
        $keypoint->description = $request->description;

        if ($request->hasFile('icon')) {
            $keypoint->icon = $this->handleFileUpload($request->file('icon'), 'keypoint');
        }

        $keypoint->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Keypoint created successfully',
            'data'    => $keypoint
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $keypoint = Keypoint::findOrFail($id);

        $keypoint->title = $request->title;
        $keypoint->description = $request->description;

        if ($request->hasFile('icon')) {
            $this->handleFileDelete($keypoint->icon);
            $keypoint->icon = $this->handleFileUpload($request->file('icon'), 'keypoint');
        }

        $keypoint->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Keypoint updated successfully',
            'data'    => $keypoint
        ]);
    }

    public function destroy($id)
    {
        $keypoint = Keypoint::findOrFail($id);
        $this->handleFileDelete($keypoint->icon);
        $keypoint->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Keypoint deleted successfully.'
        ]);
    }

    public function toggleStatus($id)
    {
        $keypoint = Keypoint::findOrFail($id);
        $keypoint->status = !$keypoint->status;
        $keypoint->save();
        return redirect()->back()->with('success', 'Slider status updated successfully.');
    }

}
