<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'technician_id' => 'nullable|exists:technicians,id',
            'type' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        Maintenance::create($validated);

        return redirect()->route('dashboard')->with('tab', 'historial')->with('success', 'Mantenimiento registrado.');
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'technician_id' => 'nullable|exists:technicians,id',
            'type' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $maintenance->update($validated);

        return redirect()->route('dashboard')->with('tab', 'historial')->with('success', 'Mantenimiento actualizado.');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('dashboard')->with('tab', 'historial')->with('success', 'Mantenimiento eliminado.');
    }
}
