<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqMain;
use Illuminate\Http\Request;

class FaqMainController extends Controller
{
    public function index() {
        $action = FaqMain::first();

        return view('admin.faq_main.index',[
            'action' => $action,
        ]);
    }
    
    public function toggleStatus($id)
    {
        $action = FaqMain::findOrFail($id);
        $action->status = !$action->status;
        $action->save();
        return redirect()->route('faq_main.index')->with('success', 'Status updated successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $action = FaqMain::findOrFail($id);
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string',
        ]);

        $action->title = $request->title;
        $action->description = $request->description;
        $action->button_text = $request->button_text;
        $action->button_url = $request->button_url;
       
        $action->save();
        return redirect()->route('faq_main.index')->with('success', 'Call to Action updated successfully.');
    }
}
