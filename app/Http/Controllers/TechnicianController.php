<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'level' => 'required|string',
            'status' => 'required|string',
        ]);

        Technician::create($validated);

        return redirect()->route('dashboard')->with('tab', 'tecnicos')->with('success', 'Técnico registrado.');
    }

    public function update(Request $request, Technician $technician)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'level' => 'required|string',
            'status' => 'required|string',
        ]);

        $technician->update($validated);

        return redirect()->route('dashboard')->with('tab', 'tecnicos')->with('success', 'Técnico actualizado.');
    }

    public function destroy(Technician $technician)
    {
        $technician->delete();
        return redirect()->route('dashboard')->with('tab', 'tecnicos')->with('success', 'Técnico eliminado.');
    }
}
