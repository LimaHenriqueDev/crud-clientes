<?php
namespace App\Services\Client;
use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Auth;

class ClientService
{

    protected $clientRepository;

    public function __construct(ClientRepository  $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
 

    public function create(array $data) {
        $data['user_id'] = Auth::id(); 
        return $this->clientRepository->create($data);
    }

    public function update(array $data, Client $client)
    {
        return $this->clientRepository->update($client, $data);
    }

     public function delete($id)
    {
        $client = Client::findOrFail($id);
        return $this->clientRepository->delete($client);
    }

}