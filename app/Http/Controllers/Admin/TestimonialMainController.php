<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonialmain;
use Illuminate\Http\Request;

class TestimonialMainController extends Controller
{
    public function index() {
        $action = Testimonialmain::first();

        return view('admin.testimonial_main.index',[
            'action' => $action,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable',
            'sub_title' => 'nullable|string|max:255',
        ]);

        $action = new Testimonialmain();
        $action->title = $request->title;
        $action->description = $request->description;
        $action->sub_title = $request->sub_title;
        $action->status = true;
        $action->save();

        return redirect()->route('testimonial_main.index')->with('success', 'Main Testimonial created successfully.');
    }

    public function toggleStatus($id)
    {
        $action = Testimonialmain::findOrFail($id);
        $action->status = !$action->status;
        $action->save();
        return redirect()->route('testimonial_main.index')->with('success', 'Status updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $action = Testimonialmain::findOrFail($id);
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable',
            'sub_title' => 'nullable|string|max:255',
        ]);

        $action->title = $request->title;
        $action->description = $request->description;
        $action->sub_title = $request->sub_title;

        $action->save();
        return redirect()->route('testimonial_main.index')->with('success', 'Main Testimonial updated successfully.');
    }
}
