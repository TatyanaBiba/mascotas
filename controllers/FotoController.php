<?php
// CONTROLADOR EjemplarController
class FotoController{
    
    // Muestra el formulario de nueva foto
    public function create(int $idmascota=0){
        
        // Recupera la mascota para mostrar información en la vista
        $mascota = Mascota::getMascota($idmascota);
        
        // Si no hay mascota...
        if(!$mascota)
            throw new Exception("No se encontró la mascota.");
        
        // Carga la vista para crear fotos
        include 'views/foto/nuevo.php';
    }
    
    // Guarda la nueva foto
    public function store(){
        
        // Comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
        
        // Crea una nueva foto
        $foto = new Foto();
        
        // Recupera los datos del formulario que llega por POST
        $foto->ubicacion = $_POST['ubicacion'];
        $foto->idmascota = intval($_POST['idmascota']);
        
        // Tratamiento del fichero de imagen
        if(Upload::llegaFichero('imagen'))
            $foto->fichero = Upload::procesar($_FILES['imagen'], 'imagenes/mascotas', true, 0, 'image/*');
       
        
        // Guarda la foto en la BDD
        if(!$foto->guardar()){
            // Si no se pudo guardar
            @unlink($foto->imagen); // borra la imagen recién subida
            throw new Exception("No se pudo guardar");
        }
            
        
        // Redireccionar a MascotaController::show($id);
        // para ver de nuevo los detalles de la mascota
        (new MascotaController())->show($foto->idmascota);  
    }
    
    // Muestra el formulario de confirmación de eliminación
    public function delete(int $id=0){
        
        // Recupera la foto para poder mostrar la info
        if(!$foto=Foto::get($id))
            throw new Exception("No se encontró la foto $id.");
        
        // Recupera la mascota para poder mostrar la info
        $mascota=$foto->getMascota();
        
        include 'views/foto/borrar.php';
    }
    
    // Elimina la foto
    public function destroy(){
        
        // Comprueba que llegue el formulario de confirmación
        if(empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');
        
        // Recupera el identificador vía POST
        $id=intval($_POST['id']);
        
        // Recupera la foto para poder mostrar info
        if(!$foto=Foto::get($id))
            throw new Exception("No se encontró la foto $id.");
        
        // Recupera la mascota para poder mostrar info
        $mascota=$foto->getMascota();
        
        // Recuperar la foto
        $foto = Foto::get($id);
        
        // Intenta borrar la foto de la BDD
        if(Foto::borrar($id)===false)
            throw new Exception('No se pudo borrar');
        
        @unlink($foto->fichero);    
            
        // Redireccionar a MascotaController::show($id);
        (new MascotaController())->show($foto->idmascota);
    }
}