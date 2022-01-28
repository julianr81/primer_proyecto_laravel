@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">
        <h1>Listado de clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Clientes</a>

        @if (Session::has('message'))
            <div class="alert alert-success my-5">{{ Session::get('message') }}</div>
            
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td scope="row">{{ $client->name }}</td>
                        <td>{{ $client->due }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">Editar</a>
                            
                            <form action="{{ route('client.destroy', $client) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Estas seguro que quieres eliminar?')">Eliminar</button>
                            </form>    
                            
                        </td>
                    </tr>
                    
                @empty
                    <tr>
                        <td scope="row" colspan="3">No hay datos</td>
                        
                    </tr>
                @endforelse                
                
            </tbody>
        </table>
        
        @if ($clients->count())
            {{ $clients->links() }}            
        @endif
        
    </div>


@endsection