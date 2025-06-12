<?php
namespace App\Http\Controllers;

use App\Models\RegionalDevice;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $regionalDevices = RegionalDevice::latest()->paginate(8);
        return view('reservation.index', compact('regionalDevices'));
    }

    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('reservation.index')->with('success', 'Reservation created successfully');
    }

    public function show($id)
    {
        return view('reservation.show', ['id' => $id]);
    }

    public function questionnaire($id)
    {
        return view('reservation.questionnaire', ['id' => $id]);
    }
}
