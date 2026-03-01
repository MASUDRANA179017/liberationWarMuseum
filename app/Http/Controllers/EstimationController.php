<?php

namespace App\Http\Controllers;

use App\Models\Estimation;
use App\Models\Product;
use App\Models\Film;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Log;

class EstimationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $rows = Estimation::with(['product:id,name', 'film:id,film_name'])->latest()->get();
            return DataTables::of($rows)
                ->addIndexColumn()
                ->addColumn('item_type', fn($r) => $r->product_id ? 'product' : 'film')
                ->addColumn('item_name', fn($r) => $r->product_id ? ($r->product->name ?? 'N/A') : ($r->film->film_name ?? 'N/A'))
                ->editColumn('price_per_sft', fn($r) => number_format($r->price_per_sft, 2))

                ->addColumn('action', fn($r) =>
                '<button class="btn btn-sm btn-primary est-edit" data-id="' . $r->id . '">Edit</button>
                     <button class="btn btn-sm btn-danger est-del" data-id="' . $r->id . '">Delete</button>')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.estimation.index');
    }

    public function store(Request $request)
    {
        $data = $this->validatePayload($request);

        // Resolve existence
        if ($data['product_id']) {
            if (!Product::whereKey($data['product_id'])->exists())
                return response()->json(['success' => false, 'message' => 'Invalid product_id'], 422);
        }
        if ($data['film_id']) {
            if (!Film::whereKey($data['film_id'])->exists())
                return response()->json(['success' => false, 'message' => 'Invalid film_id'], 422);
        }

        $row = Estimation::create([
            // 'product_id'    => $data['product_id'],
            'film_id'    => $data['film_id'],
            'price_per_sft' => $data['price_per_sft'],
            // 'color'         => $data['color'] ?? null,
            'film_type'  => $data['film_type'] ?? null,
        ]);

        return response()->json(['success' => true, 'message' => 'Saved', 'id' => $row->id]);
    }

    public function show(Estimation $estimation)
    {
        $estimation->load(['product:id,name', 'film:id,film_name']);
        return response()->json($estimation);
    }

    public function edit(Estimation $estimation)
    {
        $estimation->load(['product:id,name', 'film:id,film_name']);
        return response()->json($estimation);
    }

    public function update(Request $request, Estimation $estimation)
    {
        $data = $this->validatePayload($request);

        if ($data['product_id']) {
            if (!Product::whereKey($data['product_id'])->exists())
                return response()->json(['success' => false, 'message' => 'Invalid product_id'], 422);
        }
        if ($data['film_id']) {
            if (!Film::whereKey($data['film_id'])->exists())
                return response()->json(['success' => false, 'message' => 'Invalid film_id'], 422);
        }

        $estimation->update([
            'product_id'    => $data['product_id'],
            'film_id'    => $data['film_id'],
            'price_per_sft' => $data['price_per_sft'],
            'color'         => $data['color'] ?? null,
            'film_type'  => $data['film_type'] ?? null,
        ]);

        return response()->json(['success' => true, 'message' => 'Updated']);
    }



    public function destroy(Estimation $estimation)
    {
        $estimation->delete();
        return response()->json(['success' => true, 'message' => 'Deleted']);
    }

    private function validatePayload(Request $request): array
    {
        $data = $request->validate([
            'product_id'    => 'nullable|integer|min:1',
            'film_id'    => 'required|integer|min:1',
            'price_per_sft' => 'required|numeric|min:0',
            'color' => 'nullable|string',
            'film_type' => 'nullable|string',
        ]);


        return $data;
    }
    // App\Http\Controllers\Admin\ProductController.php
    public function productsimpleList()
    {
        return response()->json(
            Product::select('id', 'name')
                ->where('status', 1)
                ->orderBy('name')
                ->get()
        );
    }

    // App\Http\Controllers\Admin\FilmController.php
    public function filmsimpleList()
    {
        return response()->json(
            Film::select('id', 'film_name as name')
                ->where('status', 1)
                ->orderBy('film_name')
                ->get()
        );
    }



    public function lookup(Request $request)
    {
        // log::info($request->all());
        $request->validate(['product_id' => 'nullable|integer', 'film_id' => 'required|integer']);
        $query = Estimation::where('product_id', $request->product_id)
            ->where('film_id', $request->film_id);

        if ($request->filled('color_value')) {
            $query->where('color', $request->color_value);
        }

        if ($request->filled('film_type_value')) {
            $query->where('film_type', $request->film_type_value);
        }

        $row = $query->first();
        if (!$row) return response()->json(['message' => 'Rate not found'], 404);
        return response()->json(['price_per_sft' => $row->price_per_sft]);
    }



    public function getColors($id)
    {
        $product = \App\Models\Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // color stored as JSON (array of strings)
        return response()->json([
            'colors' => $product->color ?? []
        ]);
    }

    public function getTypes($id)
    {
        $film = \App\Models\Film::find($id);

        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        // film_type stored as JSON (array)
        return response()->json([
            'types' => $film->film_type ?? []
        ]);
    }
}
