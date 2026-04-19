@extends('layouts.app')

@section('content')

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
">

        <h2 style="margin:0;">Vendedores</h2>

        <a href="{{ route('vendedores.create') }}"
           style="
            background:#1565c0;
            color:white;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:bold;
       ">
            + Nuevo vendedor
        </a>

    </div>

    <div style="
    background:white;
    border-radius:14px;
    overflow:auto;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
">

        <table width="100%" style="min-width:1000px; margin:0;">

            <tr>
                <th width="70">ID</th>
                <th>Nombre</th>
                <th width="180">Tipo Documento</th>
                <th width="180">Documento</th>
                <th>Dirección</th>
                <th width="180">Acciones</th>
            </tr>

            @foreach($vendedores as $v)

                <tr>

                    <td>{{ $v->id }}</td>
                    <td>{{ $v->nombre }}</td>
                    <td>{{ $v->tipo_documento_texto }}</td>
                    <td>{{ $v->nif }}</td>
                    <td>{{ $v->direccion }}</td>

                    <td>

                        <div style="display:flex; gap:8px; flex-wrap:wrap;">

                            <a href="{{ route('vendedores.edit',$v->id) }}"
                               style="
                                background:#2563eb;
                                color:white;
                                padding:7px 10px;
                                border-radius:7px;
                                text-decoration:none;
                                font-size:13px;
                           ">
                                Editar
                            </a>

                            <form action="{{ route('vendedores.destroy',$v->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar este vendedor?')"
                                        style="
                                        background:#dc2626;
                                        color:white;
                                        border:none;
                                        padding:7px 10px;
                                        border-radius:7px;
                                        cursor:pointer;
                                        font-size:13px;
                                    ">
                                    Borrar
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

        </table>

    </div>

@endsection
