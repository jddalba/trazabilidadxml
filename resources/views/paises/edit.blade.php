@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Editar País</h2>

    <div style="max-width:550px;">

        <form method="POST" action="{{ route('paises.update',$pais->id) }}">

            @csrf
            @method('PUT')

            <div style="margin-bottom:18px;">

                <label>Nombre País</label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ old('nombre', $pais->nombre) }}"
                    required
                >

            </div>

            <div style="margin-bottom:18px;">

                <label>Código AL3</label>

                <input
                    type="text"
                    name="codigo_al3"
                    value="{{ old('codigo_al3', $pais->codigo_al3) }}"
                    required
                    maxlength="3"
                    style="text-transform:uppercase;"
                >

            </div>

            <div style="display:flex; gap:10px; margin-top:25px;">

                <button type="submit"
                        style="
                        background:#059669;
                        color:white;
                        border:none;
                        padding:12px 18px;
                        border-radius:8px;
                        cursor:pointer;
                        font-weight:bold;
                    ">
                    Actualizar
                </button>

                <a href="{{ route('paises.index') }}"
                   style="
                    background:#64748b;
                    color:white;
                    padding:12px 18px;
                    border-radius:8px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                    Volver
                </a>

            </div>

        </form>

    </div>

@endsection
