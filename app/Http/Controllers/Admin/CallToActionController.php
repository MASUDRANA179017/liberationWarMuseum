<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CallToActionController extends Controller
{
    public function index() {
        $action = CallToAction::first();

        return view('admin.call-to-action.index',[
            'action' => $action,
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
        $action = CallToAction::findOrFail($id);
        $action->status = !$action->status;
        $action->save();
        return redirect()->route('action.index')->with('success', 'Status updated successfully.');
    }

     public function update(Request $request, $id)
    {
        $action = CallToAction::findOrFail($id);
        $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'data_count' => 'nullable|string',
            'counter_symbol' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string',
        ]);

        $action->title = $request->title;
        $action->sub_title = $request->sub_title;
        $action->data_count = $request->data_count;
        $action->counter_symbol = $request->counter_symbol;
        $action->short_description = $request->short_description;
        $action->button_text = $request->button_text;
        $action->button_url = $request->button_url;
       
        $action->save();
        return redirect()->route('action.index')->with('success', 'Call to Action updated successfully.');
    }

}
