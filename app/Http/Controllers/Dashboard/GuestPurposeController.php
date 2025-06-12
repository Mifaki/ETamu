<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GuestPurpose;
use Illuminate\Http\Request;

class GuestPurposeController extends Controller
{
    public function index()
    {
        $guestPurposes = GuestPurpose::latest()->paginate(10);
        return view('dashboard.guest-purposes.index', compact('guestPurposes'));
    }

    public function create()
    {
        return view('dashboard.guest-purposes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        GuestPurpose::create($validated);

        return redirect()
            ->route('dashboard.guest-purposes.index')
            ->with('success', 'Keperluan tamu berhasil ditambahkan');
    }

    public function edit(GuestPurpose $guestPurpose)
    {
        return view('dashboard.guest-purposes.edit', compact('guestPurpose'));
    }

    public function update(Request $request, GuestPurpose $guestPurpose)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $guestPurpose->update($validated);

        return redirect()
            ->route('dashboard.guest-purposes.index')
            ->with('success', 'Keperluan tamu berhasil diperbarui');
    }

    public function destroy(GuestPurpose $guestPurpose)
    {
        $guestPurpose->delete();

        return redirect()
            ->route('dashboard.guest-purposes.index')
            ->with('success', 'Keperluan tamu berhasil dihapus');
    }
}
