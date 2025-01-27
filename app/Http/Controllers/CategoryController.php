<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $title = 'Hapus kategori!';
        $text = "Apa kamu yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('toast_success', 'Data kategori baru berhasil ditambahkan!');
    }

    public function edit(Category $kategori)
    {
        $category = Category::find($kategori->id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $kategori)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('category.index')->with('toast_success', 'Data kategori berhasil diubah!');
    }

    public function destroy(Category $kategori)
    {
        $kategori->delete();

        return redirect()->route('category.index')->with('toast_success', 'Data kategori berhasil dihapus!');
    }
}
