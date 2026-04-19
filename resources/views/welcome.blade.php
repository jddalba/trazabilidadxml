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

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f4f7fb;
            color:#1e293b;
        }

        .hero{
            background:linear-gradient(135deg,#0d47a1,#1565c0);
            color:white;
            padding:60px 30px;
            text-align:center;
        }

        .hero h1{
            font-size:42px;
            margin-bottom:12px;
        }

        .hero p{
            font-size:18px;
            opacity:.95;
            max-width:700px;
            margin:auto;
        }

        .hero-buttons{
            margin-top:30px;
            display:flex;
            justify-content:center;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            padding:12px 22px;
            border-radius:10px;
            text-decoration:none;
            font-weight:bold;
            font-size:14px;
            transition:.2s;
        }

        .btn-white{
            background:white;
            color:#1565c0;
        }

        .btn-white:hover{
            transform:translateY(-2px);
        }

        .btn-outline{
            border:2px solid white;
            color:white;
        }

        .btn-outline:hover{
            background:white;
            color:#1565c0;
        }

        .container{
            max-width:1200px;
            margin:auto;
            padding:40px 20px;
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
            gap:20px;
            margin-top:-45px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:16px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .card h3{
            color:#1565c0;
            margin-bottom:10px;
            font-size:18px;
        }

        .card p{
            color:#475569;
            font-size:14px;
            line-height:1.5;
        }

        .section-title{
            margin:50px 0 20px;
            font-size:28px;
            color:#0f172a;
        }

        .links{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
            gap:15px;
        }

        .links a{
            background:white;
            padding:16px;
            border-radius:12px;
            text-decoration:none;
            color:#1e293b;
            font-weight:bold;
            box-shadow:0 6px 18px rgba(0,0,0,.05);
            transition:.2s;
        }

        .links a:hover{
            background:#e3f2fd;
            color:#1565c0;
        }

        footer{
            text-align:center;
            padding:35px;
            color:#64748b;
            font-size:14px;
        }
    </style>
</head>

<body>

<section class="hero">

    <h1>Proyecto Trazabilidad</h1>

    <p>
        Sistema profesional de gestión, ventas y control de trazabilidad
        para productos pesqueros y comerciales.
    </p>

    <div class="hero-buttons">

        <a href="/ventas" class="btn btn-white">Entrar al sistema</a>

        <a href="/especies" class="btn btn-outline">Gestionar especies</a>

    </div>

</section>

<div class="container">

    <div class="grid">

        <div class="card">
            <h3>Ventas</h3>
            <p>Registro de ventas, líneas de producto, XML y descargas.</p>
        </div>

        <div class="card">
            <h3>Compradores</h3>
            <p>Gestión de clientes, operadores y destinatarios.</p>
        </div>

        <div class="card">
            <h3>Vendedores</h3>
            <p>Control de proveedores y emisores de mercancía.</p>
        </div>

        <div class="card">
            <h3>Trazabilidad</h3>
            <p>Seguimiento completo del lote desde origen hasta destino.</p>
        </div>

    </div>

    <h2 class="section-title">Accesos rápidos</h2>

    <div class="links">

        <a href="/ventas">Ventas</a>
        <a href="/instalaciones">Instalaciones</a>
        <a href="/especies">Especies</a>
        <a href="/balsas">Balsas</a>
        <a href="/vendedores">Vendedores</a>
        <a href="/compradores">Compradores</a>
        <a href="/paises">Países</a>
        <a href="/calibres">Calibres</a>

    </div>

</div>

<footer>
    Proyecto Trazabilidad © {{ date('Y') }}
</footer>

</body>
</html>
