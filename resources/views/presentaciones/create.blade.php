@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Nueva Presentación</h2>

    <div style="max-width:550px;">

        <form method="POST" action="{{ route('presentaciones.store') }}">

            @csrf

            <div style="margin-bottom:18px;">

                <label>Código</label>

                <input
                    type="text"
                    name="codigo"
                    value="{{ old('codigo') }}"
                    required
                    placeholder="Ej: WHL"
                >

            </div>

            <div style="margin-bottom:18px;">

                <label>Descripción</label>

                <input
                    type="text"
                    name="descripcion"
                    value="{{ old('descripcion') }}"
                    required
                    placeholder="Ej: Entero"
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
                    Guardar
                </button>

                <a href="{{ route('presentaciones.index') }}"
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
