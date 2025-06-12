<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RegionalDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionalDeviceController extends Controller
{
    public function index()
    {
        $regionalDevices = RegionalDevice::latest()->paginate(10);
        return view('dashboard.regional-devices.index', compact('regionalDevices'));
    }

    public function create()
    {
        return view('dashboard.regional-devices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'address'     => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $path                   = $request->file('logo')->store('regional-devices', 'public');
            $validated['logo_path'] = $path;
        }

        RegionalDevice::create($validated);

        return redirect()->route('dashboard.regional-devices.index')
            ->with('success', 'Perangkat daerah berhasil ditambahkan');
    }

    public function edit(RegionalDevice $regionalDevice)
    {
        return view('dashboard.regional-devices.edit', compact('regionalDevice'));
    }

    public function update(Request $request, RegionalDevice $regionalDevice)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'address'     => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($regionalDevice->logo_path) {
                Storage::disk('public')->delete($regionalDevice->logo_path);
            }
            $path                   = $request->file('logo')->store('regional-devices', 'public');
            $validated['logo_path'] = $path;
        }

        $regionalDevice->update($validated);

        return redirect()->route('dashboard.regional-devices.index')
            ->with('success', 'Perangkat daerah berhasil diperbarui');
    }

    public function destroy(RegionalDevice $regionalDevice)
    {
        if ($regionalDevice->logo_path) {
            Storage::disk('public')->delete($regionalDevice->logo_path);
        }

        $regionalDevice->delete();

        return redirect()->route('dashboard.regional-devices.index')
            ->with('success', 'Perangkat daerah berhasil dihapus');
    }
}
