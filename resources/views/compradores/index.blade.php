@extends('layouts.app')

@section('content')

    <div style="
max-width:1100px;
margin:auto;
">

        <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    ">

            <h1 style="margin:0;">Compradores</h1>

            <a href="{{ route('compradores.create') }}"
               class="btn">
                + Nuevo Comprador
            </a>

        </div>

        <div style="
    overflow-x:auto;
    border-radius:16px;
    ">

            <table>

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>NIF</th>
                    <th>Dirección</th>
                    <th style="width:180px;">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($compradores as $c)

                    <tr>

                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nombre }}</td>
                        <td>{{ $c->nif }}</td>
                        <td>{{ $c->direccion }}</td>

                        <td>

                            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                                <a href="{{ route('compradores.edit',$c->id) }}"
                                   class="btn">
                                    Editar
                                </a>

                                <form action="{{ route('compradores.destroy',$c->id) }}"
                                      method="POST"
                                      style="margin:0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger"
                                            onclick="return confirm('¿Seguro que deseas borrar este comprador?')">
                                        Borrar
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                @if($compradores->isEmpty())
                    <tr>
                        <td colspan="5" style="text-align:center; color:#64748b;">
                            No hay compradores registrados
                        </td>
                    </tr>
                @endif

                </tbody>

            </table>

        </div>

    </div>

@endsection
