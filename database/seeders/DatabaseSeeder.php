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

        // INSTALACIONES (12)
        DB::table('instalaciones')->insert([
            ['id'=>1,'nombre'=>'ISLETA','codigo_rega'=>'ES110070050003','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>2,'nombre'=>'DELTA','codigo_rega'=>'ES110070050002','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>3,'nombre'=>'DELTA NORTE','codigo_rega'=>'ES110070050007','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>4,'nombre'=>'M.CASETA','codigo_rega'=>'ES110070050005','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>5,'nombre'=>'ALBINAS','codigo_rega'=>'ES110070050004','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>6,'nombre'=>'SAN JAIME','codigo_rega'=>'ES110280000308','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>7,'nombre'=>'SAN FEDERICO','codigo_rega'=>'ES110150050002','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>8,'nombre'=>'SANCTI PETRI','codigo_rega'=>'ES110150000601','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>9,'nombre'=>'LDH','codigo_rega'=>'ES210210050009','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>10,'nombre'=>'SAN MIGUEL','codigo_rega'=>'ES210210050011','establecimiento_venta'=>'12.021107/CA'],
            ['id'=>11,'nombre'=>'CANELA','codigo_rega'=>'ES210100055011','establecimiento_venta'=>'00.ACUI64/H'],
            ['id'=>12,'nombre'=>'PIEDRA','codigo_rega'=>'ES210210050012','establecimiento_venta'=>'00.ACUI40/H'],
        ]);

        // ESPECIES MAESTRAS (12)
        DB::table('especies_maestras')->insert([
            ['id'=>1,'nombre_comercial'=>'DORADA','nombre_cientifico'=>'SPARUS AURATA','codigo_al3'=>'SBG'],
            ['id'=>2,'nombre_comercial'=>'ALBUR/MUGIL','nombre_cientifico'=>'MUGIL CEPHALUS','codigo_al3'=>'MUF'],
            ['id'=>3,'nombre_comercial'=>'LUBINA','nombre_cientifico'=>'DICENTRARCHUS LABRAX','codigo_al3'=>'BSS'],
            ['id'=>4,'nombre_comercial'=>'LENGUADO','nombre_cientifico'=>'SOLEA SENEGALENSIS','codigo_al3'=>'OAL'],
            ['id'=>5,'nombre_comercial'=>'CAMARON','nombre_cientifico'=>'PALAEMON VARIANS','codigo_al3'=>'PVR'],
            ['id'=>6,'nombre_comercial'=>'SARGO','nombre_cientifico'=>'DIPLODUS SARGUS','codigo_al3'=>'SWA'],
            ['id'=>7,'nombre_comercial'=>'BAILA','nombre_cientifico'=>'DICENTRARCHUS PUNTACTUS','codigo_al3'=>'SPU'],
            ['id'=>8,'nombre_comercial'=>'CORVINA','nombre_cientifico'=>'ARGYROSOMUS REGIUS','codigo_al3'=>'MGR'],
            ['id'=>9,'nombre_comercial'=>'MERO','nombre_cientifico'=>'EPINEPHELUS MARGINATUS','codigo_al3'=>'GPD'],
            ['id'=>10,'nombre_comercial'=>'LANGOSTINO','nombre_cientifico'=>'PENAEUS JAPONICUS','codigo_al3'=>'KUP'],
            ['id'=>11,'nombre_comercial'=>'PARGO','nombre_cientifico'=>'DENTEX AURATA','codigo_al3'=>'DEP'],
            ['id'=>12,'nombre_comercial'=>'ANGUILA','nombre_cientifico'=>'ANGUILLA ANGUILLA','codigo_al3'=>'ELE'],
        ]);

        // ESPECIES (14)
        DB::table('especies')->insert([
            ['id'=>1,'codigo'=>'01','especie_comercial'=>'DORADA','especie_cientifica'=>'SPARUS AURATA','especie_al3'=>'SBG','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>2,'codigo'=>'02','especie_comercial'=>'ALBUR/MUGIL','especie_cientifica'=>'MUGIL CEPHALUS','especie_al3'=>'MUF','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>3,'codigo'=>'03','especie_comercial'=>'LUBINA','especie_cientifica'=>'DICENTRARCHUS LABRAX','especie_al3'=>'BSS','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>4,'codigo'=>'04','especie_comercial'=>'LENGUADO','especie_cientifica'=>'SOLEA SENEGALENSIS','especie_al3'=>'OAL','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>5,'codigo'=>'05','especie_comercial'=>'CAMARON','especie_cientifica'=>'PALAEMON VARIANS','especie_al3'=>'PVR','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>6,'codigo'=>'06','especie_comercial'=>'SARGO','especie_cientifica'=>'DIPLODUS SARGUS','especie_al3'=>'SWA','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>7,'codigo'=>'07','especie_comercial'=>'BAILA','especie_cientifica'=>'DICENTRARCHUS PUNTACTUS','especie_al3'=>'SPU','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>8,'codigo'=>'08','especie_comercial'=>'CORVINA','especie_cientifica'=>'ARGYROSOMUS REGIUS','especie_al3'=>'MGR','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>9,'codigo'=>'09','especie_comercial'=>'MERO','especie_cientifica'=>'EPINEPHELUS MARGINATUS','especie_al3'=>'GPD','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>10,'codigo'=>'10','especie_comercial'=>'LANGOSTINO','especie_cientifica'=>'PENAEUS JAPONICUS','especie_al3'=>'KUP','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>11,'codigo'=>'11','especie_comercial'=>'DORADA','especie_cientifica'=>'SPARUS AURATA','especie_al3'=>'SBG','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'GUT'],
            ['id'=>12,'codigo'=>'12','especie_comercial'=>'PARGO','especie_cientifica'=>'DENTEX AURATA','especie_al3'=>'DEP','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>13,'codigo'=>'13','especie_comercial'=>'ANGUILA','especie_cientifica'=>'ANGUILLA ANGUILLA','especie_al3'=>'ELE','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'WHL'],
            ['id'=>14,'codigo'=>'31','especie_comercial'=>'LUBINA','especie_cientifica'=>'DICENTRARCHUS LABRAX','especie_al3'=>'BSS','pais_al3'=>'ESP','metodo_produccion'=>'2','cod_conservacion'=>'FRE','cod_presentacion'=>'GUT'],
        ]);
    }
}
