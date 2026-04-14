<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'control_number' => 'required|string|max:255|unique:equipment',
            'type' => 'required|string|max:255',
            'status' => 'required|string',
            'health' => 'required|integer|min:0|max:100',
        ]);

        Equipment::create($validated);

        return redirect()->route('dashboard')->with('tab', 'equipos')->with('success', 'Equipo ingresado correctamente.');
    }

    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'control_number' => 'required|string|max:255|unique:equipment,control_number,' . $equipment->id,
            'type' => 'required|string|max:255',
            'status' => 'required|string',
            'health' => 'required|integer|min:0|max:100',
        ]);

        $equipment->update($validated);

        return redirect()->route('dashboard')->with('tab', 'equipos')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('dashboard')->with('tab', 'equipos')->with('success', 'Equipo eliminado.');
    }
}
