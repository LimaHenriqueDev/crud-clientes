@extends('layouts.app')

@section('content')
<div class="container mt-5 col-6">
    <h2>Cadastrar Cliente</h2>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required
                 placeholder="Digite um nome"
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
                value="{{ old('email') }}"
                required
                placeholder="Digite seu email"
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
                value="{{ old('phone') }}"
                data-inputmask="'mask': '(99) 99999-9999'"
                required
                placeholder="(99) 99999-9999"
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
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
@push('scripts')
  <script src="{{ asset('js/mask.js') }}"></script>
@endpush
