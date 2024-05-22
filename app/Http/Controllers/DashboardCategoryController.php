<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard_category.dashboard_category_index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard_category.dashboard_category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => ['required'],
        ]);

        Category::create([
            'nama' => $request->category_name
        ]);

        return redirect()->route('dashboard_category.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('dashboard.dashboard_category.dashboard_category_edit', [
            'category' => Category::where('slug', $slug)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'category_name' => ['required'],
        ]);

        $category = Category::findOrFail($id);
        $category->slug = null;

        $category->update([
            'nama' => $request->category_name,
        ]);

        return redirect()->route('dashboard_category.index')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('dashboard_category.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
