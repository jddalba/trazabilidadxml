<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET CONSTRAINTS ALL DEFERRED');

        // LIMPIAR TABLAS
        DB::table('calibres_maestras')->truncate();
        DB::table('compradores')->truncate();
        DB::table('conservaciones_maestras')->truncate();
        DB::table('especies')->truncate();
        DB::table('especies_maestras')->truncate();
        DB::table('frescura_maestras')->truncate();
        DB::table('instalaciones')->truncate();
        DB::table('metodos_produccion_maestras')->truncate();
        DB::table('paises_maestras')->truncate();
        DB::table('presentaciones_maestras')->truncate();
        DB::table('vendedores')->truncate();

        // CALIBRES
        DB::table('calibres_maestras')->insert([
            ['id'=>1,'codigo'=>'1'],
            ['id'=>2,'codigo'=>'2'],
            ['id'=>3,'codigo'=>'3'],
            ['id'=>4,'codigo'=>'3a'],
            ['id'=>5,'codigo'=>'3b'],
            ['id'=>6,'codigo'=>'4'],
            ['id'=>7,'codigo'=>'4a'],
            ['id'=>8,'codigo'=>'4b'],
            ['id'=>9,'codigo'=>'4c'],
            ['id'=>10,'codigo'=>'5'],
            ['id'=>11,'codigo'=>'6'],
            ['id'=>12,'codigo'=>'7'],
            ['id'=>13,'codigo'=>'7a'],
            ['id'=>14,'codigo'=>'7b'],
            ['id'=>15,'codigo'=>'8'],
        ]);

        // COMPRADORES
        DB::table('compradores')->insert([
            [
                'id'=>1,
                'nif'=>'B84603349',
                'nombre'=>'PESQUERÍAS LUBIMAR SL',
                'direccion'=>'CALLE,LAGASCA,88,4,28001,MADRID,MADRID'
            ]
        ]);

        // CONSERVACIONES
        DB::table('conservaciones_maestras')->insert([
            ['id'=>1,'codigo'=>'ALI','descripcion'=>'VIVO'],
            ['id'=>2,'codigo'=>'BOI','descripcion'=>'COCIDO'],
            ['id'=>3,'codigo'=>'DRI','descripcion'=>'DESHIDRATADO (SECO)'],
            ['id'=>4,'codigo'=>'FRE','descripcion'=>'FRESCO O REFRIGERADO'],
            ['id'=>5,'codigo'=>'FRO','descripcion'=>'CONGELADO'],
            ['id'=>6,'codigo'=>'SAL','descripcion'=>'SALADO'],
            ['id'=>7,'codigo'=>'SMO','descripcion'=>'AHUMADO'],
        ]);

        // FRESCURA
        DB::table('frescura_maestras')->insert([
            ['id'=>1,'codigo'=>'A'],
            ['id'=>2,'codigo'=>'B'],
            ['id'=>3,'codigo'=>'E'],
            ['id'=>4,'codigo'=>'V'],
        ]);

        // PAISES
        DB::table('paises_maestras')->insert([
            ['id'=>1,'nombre'=>'ESPAÑA','codigo_al3'=>'ESP']
        ]);

        // MÉTODOS
        DB::table('metodos_produccion_maestras')->insert([
            ['id'=>1,'descripcion'=>'CAPTURADO'],
            ['id'=>2,'descripcion'=>'DE CRÍA'],
            ['id'=>3,'descripcion'=>'RECOLECCION'],
            ['id'=>4,'descripcion'=>'CAPTURADO EN AGUA DULCE'],
        ]);

        // PRESENTACIONES
        DB::table('presentaciones_maestras')->insert([
            ['id'=>1,'codigo'=>'WHL','descripcion'=>'ENTERO'],
            ['id'=>2,'codigo'=>'GUT','descripcion'=>'EVISCERADO'],
            ['id'=>3,'codigo'=>'FIL','descripcion'=>'FILETEADO'],
            ['id'=>4,'codigo'=>'FIS','descripcion'=>'FILETEADO SIN PIEL'],
            ['id'=>5,'codigo'=>'FSB','descripcion'=>'FILETEADO CON PIEL Y CON ESPINAS'],
        ]);

        // VENDEDORES
        DB::table('vendedores')->insert([
            [
                'id'=>1,
                'nombre'=>'CULTIVOS PISCICOLAS DE BARBATE SL',
                'tipo_documento'=>2,
                'nif'=>'B11539228',
                'direccion'=>'CALLE,LAGASCA,88,4,28001,MADRID,MADRID'
            ],
            [
                'id'=>2,
                'nombre'=>'SERVICIOS ACUICOLAS DEL PIEDRA SLU',
                'tipo_documento'=>2,
                'nif'=>'B84603349',
                'direccion'=>'CALLE,FAISAN,15,21450,CARTAYA,HUELVA'
            ],
            [
                'id'=>3,
                'nombre'=>'AQUICANELA SL',
                'tipo_documento'=>2,
                'nif'=>'B21583687',
                'direccion'=>'CALLE,LIMACOLAS,11,1B,21400,AYAMONTE,HUELVA'
            ],
        ]);

        // INSTALACIONES
        DB::table('instalaciones')->insert([
            ['id'=>1,'nombre'=>'ISLETA','codigo_rega'=>'ES110070050003','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>2,'nombre'=>'DELTA','codigo_rega'=>'ES110070050002','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>3,'nombre'=>'DELTA NORTE','codigo_rega'=>'ES110070050007','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>4,'nombre'=>'M.CASETA','codigo_rega'=>'ES110070050005','establecimiento_venta'=>'12.021107/CA'],
        ]);
    }
}
