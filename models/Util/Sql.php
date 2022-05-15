<?php
namespace app\models\Util;

use Yii;

class Sql{

    private $con;

    public function __construct(){
        $this->con = Yii::$app->db;
    }
    
    public function select_cabecera_orden_trabajo($id){    
        $query = 'select 	cab.id as cabecera_id
                            ,c.nombre 
                            ,v.placa 
                    from	cabecera_orden_trabajo cab
                            inner join vehiculo v on v.id = cab."idVehiculo" 
                            inner join asesor a on a.id = cab."idAsesor" 
                            inner join cliente c on c.id = v."idCliente" 
                    where 	cab.id = '.$id;
        $res = $this->con->createCommand($query)->queryOne();
        return $res;
    }
}


?>