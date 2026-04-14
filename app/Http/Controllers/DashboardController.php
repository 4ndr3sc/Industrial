<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Technician;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        $technicians = Technician::all();
        $maintenances = Maintenance::with(['equipment', 'technician'])->latest()->get();

        $activeEquipments = Equipment::where('status', 'Operativo')->count();
        $pendingOrders = Maintenance::where('status', 'Pendiente')->count();
        $criticalAlerts = Maintenance::where('type', 'Crítico')->where('status', '!=', 'Completado')->count();

        return view('dashboard', compact(
            'equipments', 
            'technicians', 
            'maintenances',
            'activeEquipments',
            'pendingOrders',
            'criticalAlerts'
        ));
    }
}
