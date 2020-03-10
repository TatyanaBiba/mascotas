<?php
class Mascota{
    // PROPIEDADES
    public $id=0, $nombre='', $sexo='', $biografia=0, $fechanacimiento='', 
            $fechafallecimiento='', $idusuario=0, $idraza=0;
    
    // MÉTODOS DEL CRUD
    // Recuperar todos los anuncios
    public static function get():array{
        // Preparar la consulta
        $consulta="SELECT * FROM mascotas";
        return DB::selectAll($consulta, self::class);
    }
    
    // Recuperar mascotas con un filtro avanzado
    public static function getFiltered(string $campo='titulo', string $valor='', 
        string $orden='id', string $sentido='ASC'):array{
            
            $consulta="SELECT *
                      FROM mascotas
                      WHERE $campo LIKE '%$valor%'
                      ORDER BY $orden $sentido";
            
            return DB::selectAll($consulta, self::class);                
    }
    
    // recuperar un mascota concreto por id
    public static function getMascota(int $id):?Mascota{
        // Preparar la consulta
        $consulta="SELECT * FROM mascotas WHERE id=$id";
        // Ejecutar y retornar el resultado
        return DB::select($consulta, self::class);
    }
    
    // Insertar una nueva mascota
    public function guardar(){
        if(empty($this->fechafallecimiento)){
            
            // Preparar la consulta
            $consulta = "INSERT INTO mascotas(nombre, sexo, biografia, fechanacimiento, fechafallecimiento, idusuario, idraza)
                        VALUES('$this->nombre', '$this->sexo', 
                        '$this->biografia', '$this->fechanacimiento', NULL, $this->idusuario, $this->idraza)";
            }else{
                $consulta = "INSERT INTO mascotas(nombre, sexo, biografia, fechanacimiento, fechafallecimiento, idusuario, idraza)
                        VALUES('$this->nombre', '$this->sexo',
                        '$this->biografia', '$this->fechanacimiento', '$this->fechafallecimiento', $this->idusuario, $this->idraza)";
        }
        return DB::insert($consulta);
    }
    
    // Borrar una mascota por id
    public static function borrar(int $id){
        // Preparar la consulta
        $consulta="DELETE FROM mascotas WHERE id=$id";
        // Ejecutar consulta
        return DB::delete($consulta);
    }
    
    // Actualizar una mascota
    public function actualizar(){
        if(empty($this->fechafallecimiento)){
        
        // Preparar la consulta
        $consulta="UPDATE mascotas SET
                    nombre='$this->nombre',
                    sexo='$this->sexo',
                    biografia='$this->biografia',
                    fechanacimiento='$this->fechanacimiento',
                    fechafallecimiento=NULL,
                    idraza=$this->idraza
                  WHERE id=$this->id";
        return DB::update($consulta); 
        }else{
        $consulta="UPDATE mascotas SET
                    nombre='$this->nombre',
                    sexo='$this->sexo',
                    biografia='$this->biografia',
                    fechanacimiento='$this->fechanacimiento',
                    fechafallecimiento='$this->fechafallecimiento',
                    idraza=$this->idraza
                  WHERE id=$this->id";
        return DB::update($consulta);
        }
    }
    
    
    // método de objeto que recupera los ejemplares de un libro
    public function getFotos():array{
        $consulta = "SELECT * FROM fotos WHERE idmascota=$this->id";
        return DB::selectAll($consulta, 'Foto');
    }
      
    // __toString
    public function __toString():string{
        return "$this->id $this->nombre, $this->biografia" ;
    }
}