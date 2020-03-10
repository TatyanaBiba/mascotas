<?php
// CONTROLADOR AnuncioController
class MascotaController{
    
    // Operación por defecto
    public function index(){
        // Redirige a la lista de mascotas
        $this->list();
    }
    
    // Operación para listar todas las mascotas
    public function list(){
        // Recuperar la lista de mascotas
        $mascotas = Mascota::get();
        
        // Cargar la vista que muestra el listado
        include 'views/mascota/lista.php';
    }
    
    // Método para mostrar los detalles de una mascota
    public function show(int $id=0){
        // Comprobar que recibimos el id de la mascota por parámetro
        if(!$id)
            throw new Exception("No se indicó la mascota.");
        
        // Recuperar la mascota con dicho identificador
        $mascota = Mascota::getMascota($id);
        
        // Comprobar que la mascota se haya recuperado correctamente de la BDD
        if(!$mascota)
            throw new Exception("No se ha encontrado la mascota $id.");
        
        // Recuperar las fotos de la mascota
        $fotos = $mascota->getFotos();
        
        // Cargar la vista de detalles
        include 'views/mascota/detalles.php';
    }
    
    // GUARDAR SE HACE EN DOS PASOS
    // PASO 1: Muestra el formulario de nueva mascota
    public function create(){
        
        // Debes ser administrador o usuario registrado
        if(! (Login::isAdmin() || Login::get()))
            throw new Exception('No tienes permiso para hacer esto');
        
        $razas = Raza::get();    
            
        
        include 'views/mascota/nuevo.php';
    }
    
    // PASO 2: Guarda la nueva mascota
    public function store(){
        
        // Debes ser administrador o usuario registrado
        if(! (Login::isAdmin() || Login::get()))
            throw new Exception('No tienes permiso para hacer esto');
        
        // Comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
        
        // Crea una nueva mascota
        $mascota = new Mascota();
        
        // Recupera los datos del formulario que llegan por POST
        $mascota->nombre = $_POST['nombre'];
        $mascota->sexo = $_POST['sexo'];
        $mascota->fechanacimiento = $_POST['fechanacimiento'];
        $mascota->fechafallecimiento = $_POST['fechafallecimiento'];
        $mascota->biografia = $_POST['biografia'];
        $mascota->idusuario = Login::get()->id;
        $mascota->idraza = $_POST['idraza'];
        
        // $mascota->idusuario = Login::get()->id;
        
        
       
        // Guarda el anuncio en la BDD
        if(!$mascota->guardar()){
            // Si no se pudo guardar
            throw new Exception("No se pudo guardar $mascota->nombre");
        }  
        
        $mensaje="Guardado de la mascota $mascota->nombre correcto.";
        // Muestra la vista de éxito
        include 'views/exito.php';
    }
    
    // ACTUALIZAR SE HACE EN DOS PASOS
    // PASO 1: Muestra el formulario de edición de una mascota
    public function edit(int $id=0){
        
        // Comprueba que llega el id de la mascota a editar
        if(!$id)
            throw new Exception("No se indicó la mascota.");
        
        // Recupera la mascota con dicho identificador
        $mascota=Mascota::getMascota($id);
        
        // Comprueba que la mascota se pudo recuperar de la BDD
        if(!$mascota)
            throw new Exception("No existe la mascota $id.");
        
        // Esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(!Login::isAdmin() && Login::get()->id != $mascota->idusuario)
            throw new Exception('No tienes los permisos necesarios');
        
        // Recupera razas    
        $razas = Raza::get();
        
        // Carga la vista del formulario
        include 'views/mascota/actualizar.php';
    }
    
    // PASO 2: Aplica los cambios a la mascota
    public function update(){
        // Comprueba que llega el formulario con los datos
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');
        
        // Recuperar la mascota de la BDD
        $mascota = Mascota::getMascota(intval($_POST['id']));
        
        // Comprobar que existe la mascota
        if(!$mascota)
            throw new Exception('No existe la mascota.');
        
        // Esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(!Login::isAdmin() && Login::get()->id != $mascota->idusuario)
            throw new Exception('No tienes los permisos necesarios');
        
        // Recuperar el resto de campos
        $mascota->nombre = $_POST['nombre'];
        $mascota->sexo = $_POST['sexo'];
        $mascota->fechanacimiento = $_POST['fechanacimiento'];
        $mascota->fechafallecimiento = $_POST['fechafallecimiento'];
        $mascota->biografia = $_POST['biografia'];
        $mascota->idusuario = Login::get()->id;
        $mascota->idraza = $_POST['idraza'];
        
        // Intenta realizar la actualización de datos
        if($mascota->actualizar()===false){
            // Si falla la actualización       
            
            throw new Exception("No se pudo actualizar $mascota->nombre");
        }
        
        // Prepara un mensaje
        $GLOBALS['mensaje'] = "Actualización de la mascota $mascota->nombre correcta.";
        
        // Repite la operación edit, así mantendrá al usuario en la vista de edición.
        $this->edit($mascota->id);
        
        // NOTA 1: Ponemos $mensaje global para no tener que pasarla al método edit
        // NOTA 2: tenemos que retocar la vista con el formulario para que se muestre el mensaje
        // NOTA 3: cuando se hagan test, probar a cambiar edit por "show" o "list"...
    }
    
    // ELIMINAR SE HACE EN DOS PASOS
    // (Si queremos hacerlo con formulario de confirmación)
    
    // PASO 1: Muestra el formulario de confirmación de eliminación
    public function delete(int $id=0){
        // Comprueba que me llega el identificador
        if(!$id)
            throw new Exception("No se indicó la mascota a borrar.");
        
        // Recupera la mascota con dicho identificador
        $mascota = Mascota::getMascota($id);
        
        // Comprueba que la mascota existe
        if(!$mascota)
            throw new Exception("No existe la mascota $id.");
        
        // Esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(!Login::isAdmin() && Login::get()->id != $mascota->idusuario)
            throw new Exception('No tienes los permisos necesarios');
        
        // Lleva al formulario de confirmación
        include 'views/mascota/borrar.php';
    }
    
    // PASO 2: Elimina la mascota
    public function destroy(){
        // Comprueba que llegue el formulario de confirmación
        if(empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');
        
        // Recupera el identificador vía POST
        $id = intval($_POST['id']);
        
        // Para poder borrar la imagen del servidor, necesitamos recuperar
        // la mascota antes de borrarla (necesito al campo imagen)
        if(!$mascota = Mascota::getMascota($id))
            throw new Exception('No existe la mascota indicado');
        
        // Esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(!Login::isAdmin() && Login::get()->id != $mascota->idusuario)
            throw new Exception('No tienes los permisos necesarios');
            
        // Intenta borrar la mascota de la BDD
        if(Mascota::borrar($id)===false)
            throw new Exception('No se pudo borrar');
        
        // Muestra la vista de éxito
        $mensaje="Borrado de la mascota $id correcto.";
        // Mostrar éxito
        include 'views/exito.php';
    }
    
    // BUSCADOR MASCOTAS
    // Método para buscar anuncios
    public function buscar(){
        // Toma los valores que llegan del formulario de búsqueda
        $campo=empty($_POST['campo'])? 'titulo' : $_POST['campo'];
        $valor=empty($_POST['valor'])? '' : $_POST['valor'];
        $orden=empty($_POST['orden'])? 'id' : $_POST['orden'];
        $sentido=empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        // Recupera la lista de mascotas
        $anuncios=Anuncio::getFiltered($campo, $valor, $orden, $sentido);
        
        // Carga la vista para mostrar la lista
        require_once 'views/mascota/lista.php';
    }
}