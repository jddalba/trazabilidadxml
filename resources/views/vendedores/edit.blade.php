@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Editar Vendedor</h2>

    <div style="max-width:600px;">

        <form method="POST" action="{{ route('vendedores.update',$vendedor->id) }}">

            @csrf
            @method('PUT')

            <div style="margin-bottom:18px;">

                <label>Nombre</label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ old('nombre', $vendedor->nombre) }}"
                    required
                >

            </div>

            <div style="margin-bottom:18px;">

                <label>Tipo Documento</label>

                <select name="tipo_documento" required>
                    <option value="1" {{ old('tipo_documento', $vendedor->tipo_documento) == 1 ? 'selected' : '' }}>CIF</option>
                    <option value="2" {{ old('tipo_documento', $vendedor->tipo_documento) == 2 ? 'selected' : '' }}>NIF</option>
                    <option value="3" {{ old('tipo_documento', $vendedor->tipo_documento) == 3 ? 'selected' : '' }}>NIE</option>
                </select>

            </div>

            <div style="margin-bottom:18px;">

                <label>Documento</label>

                <input
                    type="text"
                    name="nif"
                    value="{{ old('nif', $vendedor->nif) }}"
                    required
                >

            </div>

            <div style="margin-bottom:18px;">

                <label>Dirección</label>

                <input
                    type="text"
                    name="direccion"
                    value="{{ old('direccion', $vendedor->direccion) }}"
                    required
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

                <a href="{{ route('vendedores.index') }}"
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
