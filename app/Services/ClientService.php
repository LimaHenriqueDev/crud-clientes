<?php
namespace App\Services;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    public function create(array $data) {
        $data['user_id'] = Auth::id(); 
        return Client::create($data);
    }


}