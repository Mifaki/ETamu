<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FieldPurpose;
use Illuminate\Http\Request;

class FieldPurposeController extends Controller
{
    public function index()
    {
        $fieldPurposes = FieldPurpose::latest()->paginate(10);
        return view('dashboard.field-purposes.index', compact('fieldPurposes'));
    }

    public function create()
    {
        return view('dashboard.field-purposes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        FieldPurpose::create($validated);

        return redirect()
            ->route('dashboard.field-purposes.index')
            ->with('success', 'Tujuan bidang berhasil ditambahkan');
    }

    public function edit(FieldPurpose $fieldPurpose)
    {
        return view('dashboard.field-purposes.edit', compact('fieldPurpose'));
    }

    public function update(Request $request, FieldPurpose $fieldPurpose)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $fieldPurpose->update($validated);

        return redirect()
            ->route('dashboard.field-purposes.index')
            ->with('success', 'Tujuan bidang berhasil diperbarui');
    }

    public function destroy(FieldPurpose $fieldPurpose)
    {
        $fieldPurpose->delete();

        return redirect()
            ->route('dashboard.field-purposes.index')
            ->with('success', 'Tujuan bidang berhasil dihapus');
    }
}
