<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

public function getProductColors($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['colors' => []]);
    }

    $colors = [];

    if (!empty($product->color) && is_array($product->color)) {
        $colors = $product->color;
    } 
    elseif (!empty($product->color) && is_string($product->color)) {
        $decoded = json_decode($product->color, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            $colors = $decoded;
        } else {
            $colors = array_map('trim', explode(',', $product->color));
        }
    }

    return response()->json(['colors' => $colors]);
}

    // =========================
    // Display Products & DataTable
    // =========================
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', fn($row) => $row->image)
                ->editColumn('status', function ($row) {
                    $class = $row->status ? 'bg-success' : 'bg-danger';
                    $text  = $row->status ? 'Active' : 'Inactive';
                    return '<span class="badge '.$class.' status-badge" style="cursor:pointer" data-id="'.$row->id.'">'.$text.'</span>';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <button class="btn btn-sm btn-primary edit-btn" data-id="'.$row->id.'">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="'.$row->id.'">Delete</button>
                    ';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('admin.product.index');
    }

    // =========================
    // Store / Update Product
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => $request->id ? 'nullable|image|mimes:jpg,jpeg,png,webp' : 'required|image|mimes:jpg,jpeg,png,webp',
            'price' => 'nullable|numeric',
            'text_before_price' => 'nullable|string|max:255',
            'text_after_price' => 'nullable|string|max:255',
        ]);

        $product = Product::find($request->id) ?? new Product();

        $product->name = $request->name;
        $product->subtitle = $request->subtitle;
        $product->description = $request->description;
        $product->applications = $request->applications;

        $product->text_before_price = $request->text_before_price;
        $product->price = $request->price;
        $product->text_after_price = $request->text_after_price;

        // Save Key Benefits as JSON
        $product->benefits = json_encode($request->input('benefits', []));

        // Save Core Features as JSON
        $features = [];
        if ($request->has('features')) {
            $titles = $request->input('features.title', []);
            $icons  = $request->input('features.icon', []);
            $descs  = $request->input('features.description', []);
            foreach ($titles as $i => $title) {
                $features[] = [
                    'title' => $title,
                    'icon' => $icons[$i] ?? null,
                    'description' => $descs[$i] ?? null,
                ];
            }
        }
        $product->features = json_encode($features);

        // Handle image upload
        if ($request->hasFile('image')) {
            $this->handleFileDelete($product->image);
            $product->image = $this->handleFileUpload($request->file('image'), 'products');
        }

        // Default status to Active if new
        if (!$product->id) {
            $product->status = 1;
        }

        $product->save();

        return response()->json(['success' => true, 'message' => 'Product saved successfully']);
    }

    // =========================
    // Edit Product - load data to modal
    // =========================
    public function edit(Product $product)
    {
        $product->benefits = json_decode($product->benefits) ?? [];
        $product->features = json_decode($product->features) ?? [];

        return response()->json($product);
    }

    // =========================
    // Toggle Status
    // =========================
    public function toggleStatus(Product $product)
    {
        $product->status = !$product->status;
        $product->save();

        return response()->json([
            'success' => true,
            'status'  => $product->status ? 'Active' : 'Inactive'
        ]);
    }

    // =========================
    // Delete Product
    // =========================
    public function destroy(Product $product)
    {
        $this->handleFileDelete($product->image);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }

    // =========================
    // File Helpers
    // =========================
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

}
