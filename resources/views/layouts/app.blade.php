<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Trazabilidad</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html,body{
            height:100%;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f1f5f9;
            color:#1e293b;
            overflow:hidden;
        }

        a{
            text-decoration:none;
        }

        /* LAYOUT GENERAL */
        .wrapper{
            display:flex;
            height:100vh;
            width:100%;
            overflow:hidden;
        }

        /* SIDEBAR */
        .sidebar{
            width:260px;
            min-width:260px;
            background:linear-gradient(180deg,#0f172a,#1e293b);
            color:white;
            padding:20px 15px;
            overflow-y:auto;
            overflow-x:hidden;
        }

        .logo{
            font-size:24px;
            font-weight:bold;
            margin-bottom:5px;
        }

        .subtitle{
            font-size:13px;
            color:#cbd5e1;
            margin-bottom:25px;
        }

        .menu-title{
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:1px;
            color:#94a3b8;
            margin:18px 0 10px;
        }

        .sidebar a{
            display:block;
            color:#e2e8f0;
            padding:10px 12px;
            border-radius:10px;
            margin-bottom:6px;
            transition:.2s;
            font-size:14px;
        }

        .sidebar a:hover{
            background:#334155;
        }

        .sidebar a.active{
            background:#2563eb;
            color:white;
        }

        /* MAIN */
        .main{
            width:calc(100% - 260px);
            height:100vh;
            display:flex;
            flex-direction:column;
            overflow:hidden;
        }

        /* TOPBAR */
        .topbar{
            background:white;
            border-bottom:1px solid #e2e8f0;
            padding:15px 25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            min-height:65px;
        }

        .topbar h1{
            font-size:22px;
        }

        .user-box{
            font-size:14px;
            color:#64748b;
        }

        /* CONTENT */
        .content{
            flex:1;
            padding:20px;
            overflow:auto;
        }

        .card{
            background:white;
            border-radius:16px;
            padding:20px;
            box-shadow:0 10px 25px rgba(0,0,0,.05);
            width:100%;
        }

        /* TABLAS */
        table{
            width:100%;
            border-collapse:collapse;
            table-layout:auto;
        }

        table th{
            background:#eff6ff;
            color:#1e3a8a;
            padding:12px;
            text-align:left;
        }

        table td{
            padding:12px;
            border-top:1px solid #e5e7eb;
        }

        table tr:hover{
            background:#f8fafc;
        }

        /* FORMULARIOS */
        input,select,textarea{
            width:100%;
            padding:10px 12px;
            border:1px solid #cbd5e1;
            border-radius:10px;
            margin-top:5px;
            margin-bottom:15px;
        }

        label{
            font-size:14px;
            font-weight:bold;
            color:#334155;
        }

        /* BOTONES */
        button,.btn{
            background:#2563eb;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:10px;
            cursor:pointer;
            font-size:14px;
            font-weight:bold;
        }

        button:hover,.btn:hover{
            background:#1d4ed8;
        }

        .btn-danger{
            background:#dc2626;
        }

        .btn-danger:hover{
            background:#b91c1c;
        }

        .btn-success{
            background:#059669;
        }

        .btn-success:hover{
            background:#047857;
        }

        /* RESPONSIVE */
        @media(max-width:900px){

            body{
                overflow:auto;
            }

            .wrapper{
                flex-direction:column;
                height:auto;
            }

            .sidebar{
                width:100%;
                min-width:100%;
                height:auto;
            }

            .main{
                width:100%;
                height:auto;
            }

            .content{
                overflow:visible;
            }

        }
    </style>
</head>

<body>

<div class="wrapper">

    <aside class="sidebar">

        <div class="logo">🐟 Trazabilidad</div>
        <div class="subtitle">Panel de gestión</div>

        <div class="menu-title">Principal</div>

        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">🏠 Inicio</a>
        <a href="/ventas" class="{{ request()->is('ventas*') ? 'active' : '' }}">💰 Ventas</a>

        <div class="menu-title">Gestión</div>

        <a href="/instalaciones" class="{{ request()->is('instalaciones*') ? 'active' : '' }}">🏭 Instalaciones</a>
        <a href="/balsas" class="{{ request()->is('balsas*') ? 'active' : '' }}">🌊 Balsas</a>
        <a href="/vendedores" class="{{ request()->is('vendedores*') ? 'active' : '' }}">🧑‍💼 Vendedores</a>
        <a href="/compradores" class="{{ request()->is('compradores*') ? 'active' : '' }}">🛒 Compradores</a>
        <a href="/especies" class="{{ request()->is('especies*') ? 'active' : '' }}">🐠 Especies</a>

        <div class="menu-title">Tablas maestras</div>

        <a href="/especies-maestra">📘 Especies Maestra</a>
        <a href="/paises">🌍 Países</a>
        <a href="/metodos-produccion">⚙️ Producción</a>
        <a href="/conservaciones">❄️ Conservación</a>
        <a href="/presentaciones">📦 Presentaciones</a>
        <a href="/frescura">🧊 Frescura</a>
        <a href="/calibres">📏 Calibres</a>

    </aside>

    <div class="main">

        <div class="topbar">
            <h1>@yield('title', 'Panel')</h1>
            <div class="user-box">Sistema activo ✅</div>
        </div>

        <div class="content">

            <div class="card">
                @yield('content')
            </div>

        </div>

    </div>

</div>

</body>
</html>
