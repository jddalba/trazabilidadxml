@extends('layouts.app')

@section('content')

    <h1 style="margin-bottom:25px;">Editar Calibre</h1>

    <form method="POST" action="{{ route('calibres.update',$calibre->id) }}">

        @csrf
        @method('PUT')

        <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
        gap:18px;
    ">

            <div>
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       value="{{ $calibre->codigo }}">
            </div>

        </div>

        <div style="
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        margin-top:25px;
    ">

            <button type="submit" style="background:#16a34a;">
                Actualizar
            </button>

            <a href="{{ route('calibres.index') }}"
               class="btn"
               style="background:#6b7280;">
                Volver
            </a>

        </div>

    </form>

@endsection
