@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-success" href="{{ route('admin.customers.create') }}">Crea Nuovo Cliente</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->surname }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->email }}</td>
                        <td class="d-flex align-items-center justify-content-around">
                            <a href="{{ route('admin.customers.show', $customer->id) }}">
                                <i class="fa-solid fa-eye mx-1 fa-xl"></i>
                            </a>
                            <a href="{{ route('admin.customers.edit', $customer->id) }}">
                                <i class="fa-solid fa-pen mx-1 fa-xl"></i>
                            </a>
                            <button type="submit" class="btn" data-target="#deliteModal{{ $customer->id }}"
                                data-toggle="modal">
                                <i class="fa-solid fa-trash mx-1 fa-xl"></i>
                            </button>
                            {{-- MODALE ELIMINAZIONE --}}
                            <div class="modal" tabindex="-1" id="deliteModal{{ $customer->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminazione Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di eliminare il cliente {{ $customer->name }}
                                                {{ $customer->surname }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">
                                                    Conferma
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
            </tbody>
        @empty
            <h1>Non ci sono clienti da visualizzare</h1>
            @endforelse
        </table>
    </div>
@endsection
