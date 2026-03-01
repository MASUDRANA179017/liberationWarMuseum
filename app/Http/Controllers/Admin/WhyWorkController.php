<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyWork;
use App\Models\WhyWorkImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyWorkController extends Controller
{
    public function index() {
        $whyWorks = WhyWork::all();
        return view('admin.why-work.index',[
            'whyWorks' => $whyWorks,
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

    public function store(Request $request) {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',

        ]);

        $whyWork = new WhyWork();
        $whyWork->title = $request->title;
        $whyWork->details = $request->details;
        $whyWork->icon = $request->icon;
        $whyWork->save();
        return redirect()->route('why-work.index')->with('success', 'Keypoint added successfully.');
    }

    public function toggleStatus($id)
    {
        $whyWork = WhyWork::findOrFail($id);
        $whyWork->status = !$whyWork->status;
        $whyWork->save();
        return redirect()->route('why-work.index')->with('success', 'Why Work status updated successfully.');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $whyWork = WhyWork::findOrFail($id);
        $whyWork->title = $request->title;
        $whyWork->details = $request->details;
        $whyWork->icon = $request->icon;
        $whyWork->save();
        return redirect()->route('why-work.index')->with('success', 'Keypoint updated successfully.');
    }

    public function destroy($id)
    {
        $whyWork = WhyWork::findOrFail($id);
        $whyWork->delete();
        return redirect()->route('why-work.index')->with('success', 'Keypoint deleted successfully.');
    }
}
