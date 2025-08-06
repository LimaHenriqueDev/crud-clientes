@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Clientes</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Novo Cliente</a>
    </div>

    @if($clients->isEmpty())
        <div class="alert alert-info">Nenhum cliente cadastrado.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($clients as $client)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $client->name }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $client->email }}<br>
                                <strong>Telefone:</strong> {{ $client->phone ?? '—' }}<br>
                                <strong>Status:</strong> 
                                @if($client->status)
                                    <span class="badge bg-success">Ativo</span>
                                @else
                                    <span class="badge bg-secondary">Inativo</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form action="{{ route('clients.delete', $client) }}" method="POST" onsubmit="return confirm('Confirma exclusão deste cliente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
