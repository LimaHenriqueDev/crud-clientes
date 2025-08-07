@extends('layouts.app')

@section('content')
<div class="container mt-5 col-6">
    <h2>Atualizar Cliente</h2>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control @error('name') is-invalid @enderror"
                value="{{ $client->name }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control @error('email') is-invalid @enderror"
                value="{{ $client->email }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                class="form-control @error('phone') is-invalid @enderror"
                value="{{ $client->phone }}"
                data-inputmask="'mask': '(99) 99999-9999'"
                required
            >
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select 
                name="status" 
                id="status" 
                class="form-select @error('status') is-invalid @enderror"
                required
            >
                <option value="" disabled selected>Selecione o status</option>
                <option value="1" {{ $client->status == '1' ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ $client->status == '0' ? 'selected' : '' }}>Inativo</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
  <script src="{{ asset('js/mask.js') }}"></script>
  <script src="{{ asset('js/clearAlerts.js') }}"></script>
@endpush

