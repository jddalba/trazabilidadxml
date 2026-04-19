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

            <h1 style="margin:0;">Balsas</h1>

            <a href="{{ route('balsas.create') }}"
               class="btn">
                + Nueva balsa
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
                    <th>Instalación</th>
                    <th style="width:180px;">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($balsas as $b)

                    <tr>

                        <td>{{ $b->id }}</td>
                        <td>{{ $b->nombre }}</td>
                        <td>{{ $b->instalacion->nombre ?? '' }}</td>

                        <td>

                            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                                <a href="{{ route('balsas.edit',$b->id) }}"
                                   class="btn">
                                    Editar
                                </a>

                                <form action="{{ route('balsas.destroy',$b->id) }}"
                                      method="POST"
                                      style="margin:0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger"
                                            onclick="return confirm('¿Seguro que deseas borrar esta balsa?')">
                                        Borrar
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                @if($balsas->isEmpty())
                    <tr>
                        <td colspan="4" style="text-align:center; color:#64748b;">
                            No hay balsas registradas
                        </td>
                    </tr>
                @endif

                </tbody>

            </table>

        </div>

    </div>

@endsection
