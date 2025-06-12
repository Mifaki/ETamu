<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GuestCategory;
use Illuminate\Http\Request;

class GuestCategoryController extends Controller
{
    public function index()
    {
        $guestCategories = GuestCategory::latest()->paginate(10);
        return view('dashboard.guest-categories.index', compact('guestCategories'));
    }

    public function create()
    {
        return view('dashboard.guest-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        GuestCategory::create($validated);

        return redirect()
            ->route('dashboard.guest-categories.index')
            ->with('success', 'Kategori tamu berhasil ditambahkan');
    }

    public function edit(GuestCategory $guestCategory)
    {
        return view('dashboard.guest-categories.edit', compact('guestCategory'));
    }

    public function update(Request $request, GuestCategory $guestCategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $guestCategory->update($validated);

        return redirect()
            ->route('dashboard.guest-categories.index')
            ->with('success', 'Kategori tamu berhasil diperbarui');
    }

    public function destroy(GuestCategory $guestCategory)
    {
        $guestCategory->delete();

        return redirect()
            ->route('dashboard.guest-categories.index')
            ->with('success', 'Kategori tamu berhasil dihapus');
    }
}
