@extends('layouts.app')

@section('content')

    <div style="
    max-width:650px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
">

        <h2 style="margin-top:0; margin-bottom:25px;">
            Editar Frescura
        </h2>

        @if ($errors->any())

            <div style="
            background:#fee2e2;
            color:#991b1b;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        ">

                <strong>Revisa los siguientes errores:</strong>

                <ul style="margin-top:10px; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form method="POST" action="{{ route('frescura.update',$frescura->id) }}">

            @csrf
            @method('PUT')

            <div style="margin-bottom:22px;">

                <label style="font-weight:bold;">Código</label>

                <input type="text"
                       name="codigo"
                       value="{{ old('codigo', $frescura->codigo) }}"
                       style="
                        width:100%;
                        padding:10px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:8px;
                   ">

            </div>

            <div style="display:flex; gap:10px;">

                <button type="submit"
                        style="
                        background:#2563eb;
                        color:white;
                        border:none;
                        padding:12px 18px;
                        border-radius:10px;
                        cursor:pointer;
                        font-weight:bold;
                    ">
                    Actualizar
                </button>

                <a href="{{ route('frescura.index') }}"
                   style="
                    background:#6b7280;
                    color:white;
                    padding:12px 18px;
                    border-radius:10px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                    Volver
                </a>

            </div>

        </form>

    </div>

@endsection
