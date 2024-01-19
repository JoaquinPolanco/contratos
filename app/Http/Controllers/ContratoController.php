<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Location;
use App\Models\ClientContract;
use App\Models\ContractService;
use App\Models\CategoriesService;


class ContratoController extends Controller
{
    

    public function index()
    {
        $contratos = Contract::paginate(50);
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $locations = Location::all();
        $services = CategoriesService::all(); // Corregido el nombre aquí
        return view('contratos.create', compact('locations', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_number' => 'required|unique:contract,contract_number',
            'user_id' => 'required|numeric',
            'revised' => 'boolean',
            'location' => 'required|numeric', 
            'principal' => 'boolean', 
            'service_id' => 'required|numeric', 


        ]);
   
        $data = $request->all();
        $data['location'] = $request->input('location');

        $contract = Contract::create($data);
        $clientContractData = [
            'contract' => $contract->id,
            'client' => $request->input('user_id'),
            'principal' => $request->input('principal'),

        ];

        ClientContract::create($clientContractData);

        $contractServiceData = [
            'contract' => $contract->id,
            'service' => $request->input('service_id'),  // Asegúrate de usar 'service_id'
            
        ];

        ContractService::create($contractServiceData);
    
        return redirect()->route('contratos.index')->with('success', 'Contrato creado exitosamente');
    }

    public function paginate()
    {
        $contratos = Contract::paginate(50);
        return view('contratos.paginate', compact('contratos'));
    }

    
}
