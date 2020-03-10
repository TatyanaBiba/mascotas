<?php
class Foto{
    
    // PROPIEDADES
    public $id=0, $fichero=0, $ubicacion=0, $idmascota=0;
    
    // Recuperar una foto por su id
    public static function get(int $id=0):?Foto{
        $consulta = "SELECT * FROM fotos WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    // Recuperar la mascota al que pertenece la foto
    public function getMascota():?Mascota{
        $consulta = "SELECT * FROM mascotas WHERE id=$this->idmascota";
        return DB::select($consulta, 'Mascota');
    }
    
    // Nueva foto
    public function guardar(){
        $consulta="INSERT INTO fotos(fichero, ubicacion, idmascota)
                    VALUES('$this->fichero', '$this->ubicacion', $this->idmascota)";
        return DB::insert($consulta);
    }
    
    // Borrar foto
    public static function borrar(int $id){
        $consulta="DELETE FROM fotos WHERE id=$id";
        return DB::delete($consulta);
    }
    
    // toString
    public function __toString():string{
        return "$this->id: $this->idmascota";
    }
}