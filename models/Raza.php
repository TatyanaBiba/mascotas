<?php
class Raza{
    // PROPIEDADES
    public $id=0, $nombre='', $descripcion='', $idtipo='';
    
    // MÉTODOS DEL CRUD
    // recuperar todas las razas
    public static function get():array{
        $consulta="SELECT t.nombre AS tipo, r.id, r.nombre AS raza
                    FROM razas r
                    INNER JOIN tipos t ON r.idtipo=t.id;"; // prerarar la consulta
        return DB::selectAll($consulta, self::class);
    }
}