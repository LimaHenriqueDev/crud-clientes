@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
@endif
 


<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Clientes</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-success">Novo Cliente</a>
    </div>
       <form method="GET" action="{{ route('clients.index') }}" class="mb-3 d-flex" style="gap: 10px;">
        <select name="status" class="form-select" style="max-width: 200px;">
            <option value="">Todos</option>
            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Ativos</option>
            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inativos</option>
        </select>

        <button type="submit" class="btn btn-dark">Filtrar</button>
    </form>

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
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('clients.edit', ['id' => $client->id, 'page' => request('page')] ) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                          <form id="delete-form-{{ $client->id }}" action="{{ route('clients.delete',  ['id' => $client->id, 'page' => request('page')]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-client-id="{{ $client->id }}">
                                    Excluir
                                </button>
                          </form>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
    @endif
       <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete-button">Excluir</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Paginação -->
        <div class="d-flex justify-content-endmt-3">
          {{ $clients->appends(request()->query())->links() }}
        </div>
</div>
     
@endsection

@push('scripts')
  <script src="{{ asset('js/client.js') }}"></script>
@endpush



