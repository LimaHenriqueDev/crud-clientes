<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
     protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
           $clients = Client::where('user_id', Auth::id())->get();
           return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $storeClientRequest)
    {
        $this->clientService->create($storeClientRequest->validated());
        return redirect('/clients')->with('success', 'Cadastro realizado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
