@extends('layouts.app')

@section('content')

    <div style="
    max-width:900px;
    margin:auto;
">

        <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    ">

            <h2 style="margin:0;">Frescura</h2>

            <a href="{{ route('frescura.create') }}"
               style="
                background:#1565c0;
                color:white;
                padding:10px 16px;
                border-radius:10px;
                text-decoration:none;
                font-size:14px;
                font-weight:bold;
           ">
                + Nueva frescura
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
                    <th style="padding:14px; text-align:left;">Código</th>
                    <th style="padding:14px; text-align:left; width:180px;">Acciones</th>
                </tr>

                @foreach($frescura as $f)

                    <tr style="border-top:1px solid #e5e7eb;">

                        <td style="padding:14px;">{{ $f->id }}</td>
                        <td style="padding:14px;">{{ $f->codigo }}</td>

                        <td style="padding:14px;">

                            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                                <a href="{{ route('frescura.edit',$f->id) }}"
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

                                <form action="{{ route('frescura.destroy',$f->id) }}"
                                      method="POST"
                                      style="margin:0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('¿Seguro que deseas borrar este registro?')"
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
