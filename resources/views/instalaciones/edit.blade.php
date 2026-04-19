@extends('layouts.app')

@section('content')

    <div style="
    max-width:700px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
">

        <h1 style="margin-top:0; margin-bottom:25px;">
            Editar Instalación
        </h1>

        <form method="POST" action="{{ route('instalaciones.update',$instalacion->id) }}">

            @csrf
            @method('PUT')

            <label style="font-weight:bold;">Nombre</label>
            <input type="text"
                   name="nombre"
                   value="{{ $instalacion->nombre }}"
                   style="
                    width:100%;
                    padding:10px;
                    margin-top:6px;
                    margin-bottom:18px;
                    border:1px solid #ccc;
                    border-radius:8px;
               ">

            <label style="font-weight:bold;">Código REGA</label>
            <input type="text"
                   name="codigo_rega"
                   value="{{ $instalacion->codigo_rega }}"
                   style="
                    width:100%;
                    padding:10px;
                    margin-top:6px;
                    margin-bottom:18px;
                    border:1px solid #ccc;
                    border-radius:8px;
               ">

            <label style="font-weight:bold;">Establecimiento Venta</label>
            <input type="text"
                   name="establecimiento_venta"
                   value="{{ $instalacion->establecimiento_venta }}"
                   style="
                    width:100%;
                    padding:10px;
                    margin-top:6px;
                    margin-bottom:25px;
                    border:1px solid #ccc;
                    border-radius:8px;
               ">

            <div style="display:flex; gap:10px;">

                <button type="submit"
                        style="
                    background:#16a34a;
                    color:white;
                    border:none;
                    padding:10px 18px;
                    border-radius:8px;
                    cursor:pointer;
                    font-weight:bold;
                ">
                    Actualizar
                </button>

                <a href="{{ route('instalaciones.index') }}"
                   style="
                    background:#6b7280;
                    color:white;
                    padding:10px 18px;
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
