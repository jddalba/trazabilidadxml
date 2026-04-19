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

            <h2 style="margin:0;">Especies Maestra</h2>

            <a href="{{ route('especies-maestra.create') }}"
               style="
                background:#1565c0;
                color:white;
                padding:10px 16px;
                border-radius:10px;
                text-decoration:none;
                font-size:14px;
                font-weight:bold;
           ">
                + Nueva especie
            </a>

        </div>

        <div style="
        background:white;
        border-radius:14px;
        overflow:hidden;
        box-shadow:0 10px 25px rgba(0,0,0,.05);
    ">

            <table width="100%" style="border-collapse:collapse;">

                <tr style="background:#f8fafc;">

                    <th style="padding:14px; text-align:left;">ID</th>
                    <th style="padding:14px; text-align:left;">Comercial</th>
                    <th style="padding:14px; text-align:left;">Científico</th>
                    <th style="padding:14px; text-align:left;">AL3</th>
                    <th style="padding:14px; text-align:left; width:180px;">Acciones</th>

                </tr>

                @foreach($especies as $e)

                    <tr style="border-top:1px solid #e5e7eb;">

                        <td style="padding:14px;">{{ $e->id }}</td>
                        <td style="padding:14px;">{{ $e->nombre_comercial }}</td>
                        <td style="padding:14px;">{{ $e->nombre_cientifico }}</td>
                        <td style="padding:14px;">{{ $e->codigo_al3 }}</td>

                        <td style="padding:14px;">

                            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                                <a href="{{ route('especies-maestra.edit',$e->id) }}"
                                   style="
                                    background:#2563eb;
                                    color:white;
                                    padding:7px 12px;
                                    border-radius:8px;
                                    text-decoration:none;
                                    font-size:13px;
                               ">
                                    Editar
                                </a>

                                <form action="{{ route('especies-maestra.destroy',$e->id) }}"
                                      method="POST"
                                      style="margin:0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('¿Seguro que deseas borrar esta especie?')"
                                            style="
                                            background:#dc2626;
                                            color:white;
                                            border:none;
                                            padding:7px 12px;
                                            border-radius:8px;
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

    </div>

@endsection
