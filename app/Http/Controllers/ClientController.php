<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Services\Client\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
     protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

   
    public function index(Request $request)
    {   
        $query = Client::where('user_id', Auth::id());

        if ($request->has('status')) {
            if($request->input('status') != ''){
                $status = $request->input('status');
                $query->where('status', $status);
            }
        }

        $clients = $query->paginate(3);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $storeClientRequest)
    {
        $this->clientService->create($storeClientRequest->validated());
        return redirect('/clients')->with('success', 'Cliente cadastrado com sucesso!');
    }

   
    public function edit(int $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }


    public function update(UpdateClientRequest $updateClientRequest, int $id)
    {
        $client = Client::findOrFail($id);
        $this->clientService->update($updateClientRequest->validated(), $client);
        $page = request()->get('page', 1);

        return redirect()
            ->route('clients.index', ['page' => $page])
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $page = request()->get('page', 1);
        $this->clientService->delete($id);
        return redirect()
        ->route('clients.index', ['page' => $page])
        ->with('success', 'Cliente deletado com sucesso!');
    }
}
