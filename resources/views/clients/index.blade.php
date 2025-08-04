@extends('layouts.app')

@section('content')
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}">Novo Cliente</a>
    <ul>
        @foreach($clients as $client)
            <li>
                {{ $client->name }} ({{ $client->email }})
                <a href="{{ route('clients.edit', $client) }}">Editar</a>
                <form action="{{ route('clients.delete', $client) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
