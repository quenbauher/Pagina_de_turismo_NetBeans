<?php

include 'conexion.php'; 

class interConexion extends conexion {
        
        private $fila; 
	private $user ; 
	private $password;
	private $consulta ;
        private $consultar ;

	private $conexion;
	private $row, $roww, $pas1 , $pas2;
        private $penombre, $peapellido, $peusuario, $pepassword, $verificar ; 

	public function interConexion(){

	$conect = new conexion();//instancia de conexion mejor dicho un objeto
	$this->conexion = $conect -> conectar();
	$conect -> seleccion_db();  

	}
//aqui esta funcion publica resibe las dos variables, usuario y pasword
	public  function login($usuario, $pass){
		$this->user = $usuario;
		$this->password= $pass;
//se almacena en consultaun un query con las especificciones de que corresponda a los mismos campos de usuario y password que se encuentran registrados n la bse de datos               
		
         // $this->consultar= "SELECT usuario , password FROM registro_administrador where usuario = '".$this->user."' and  password = '".$this->password."'";
                $this->consulta=mysqli_query($this->conexion,"SELECT usuario , password FROM registro_administrador where usuario = '".$this->user."' and  password = '".$this->password."'"); 
  //    if (!$this->consulta) {
   // printf("Error: %s\n", mysqli_error($this->conexion));
    //exit();


// se almacena en row la cosulta              
                if($this->row = mysqli_fetch_array($this->consulta)){
                //    arranca la seccion
                    session_start();
                    $this->consulta = mysqli_query($this->conexion,"SELECT * FROM registro_administrador where usuario = '".$this->user."' ");  
                    $this->row = mysqli_fetch_array($this->consulta);
                    //Id
                    $this->id = $this->row['id'];
                    $_SESSION['id'] = $this->id;
                    $this->ini = 1;
                    //Nombre
                    $this->id = $this->row['nombre'];
                    $_SESSION['name'] = $this->id; 
                    //apellido
                    $this->id = $this->row['apellido'];
                    $_SESSION['apellido'] = $this->id; 
                    //si las claves coinciden te lleva al menu
                         header("Location: ../vista/index.php");      
                }else{
                        echo " usuario o password incorrecto ";

                        
                }
                return $this->consulta ;
	}
        

        public function registrar($nom, $ape, $use, $pass){
            
            $this->penombre = $nom;
            $this->peapellido = $ape;
            $this->peusuario = $use;
            $this->pepassword = $pass;
            
            $this->verificar = mysqli_query($this->conexion,"SELECT usuario FROM registro_administrador where usuario = '".$this->peusuario."' "  );

            if($this->row = mysqli_fetch_array($this->verificar)){
                
                echo "<h1>EL USUARIO QUE ACABA DE INGRESAR YA EXISTE</h1>";  
                
            }else if(!$this->row = mysqli_fetch_array($this->verificar)){
            
                mysqli_query($this->conexion,"INSERT INTO registro_administrador(nombre, apellido, usuario, password) values('$this->penombre', '$this->peapellido', '$this->peusuario' , '$this->pepassword')" );
                
              
                
               header("location: ../vista/index.php");
            
            }
            
            
            
            
            
            
        }
        
        
        public function verificar($pass1 , $pass2){
            
            $this->fine = false;
            
            $this->pas1 = $pass1;
            $this->pas2 = $pass2;
            
            
            if($this->pas1 == $this->pas2){
                
                $this->fine = true ; 
                
                
            }
            
            
            return $this->fine ; 
        }
        
        
        
public function registro_usuario($documento, $tipo_doc, $fecha, $gen, $prinom, $segnom, $priape, $segape,
        $naci, $lugnaci, $esta, $didom, $ba, $tedom,  $eva, $nivel_academico_actual){
           
           
           $this->documento = $documento;                           
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           $this->genk=$gen;
           $this->prinomk = $prinom;
            $this->segnomk = $segnom;
            $this->priapek = $priape;
            $this->segapek = $segape;
            $this->nacik = $naci;

            $this->lugnacik= $lugnaci;
            $this->estak = $esta;
            $this->didomk = $didom;
            $this->bak =$ba;
             $this->tedomk =$tedom;

             
             
             
             $this->evak =$eva;
           $this->nivel_academico_actual =$nivel_academico_actual;
           
        
          
           
           session_start();
           
           
    $this->veri = mysqli_query($this->conexion,"SELECT num_documento FROM registro_usuario where num_documento ='".$this->documento."' and  wisher_id = '".$_SESSION['id']."'");
           
//si no existe lo crea
  if(mysqli_num_rows($this->veri)==0){
               
      mysqli_query($this->conexion,"INSERT INTO registro_usuario(num_documento, tipo_doc, fecha, genero, primer_nombre, segundo_nombre, primer_apellido, 
          segundo_apellido, fch_nacimiento, lugar_nacimiento, estado_civil, 
          direccion_domicilio, barrio, tel_domicilio,   
           evaluador, nivel_academico_actual,wisher_id) values('$this->documento' , '$this->tipo_doc' , '$this->fechak', '$this->genk', '$this->prinomk',  '$this->segnomk', '$this->priapek', '$this->segapek',
              '$this->nacik', '$this->lugnacik', '$this->estak', '$this->didomk', '$this->bak', '$this->tedomk',
                '$this->evak','$this->nivel_academico_actual', '$_SESSION[id]')");
           
            header("Location: ../vistas/menu.php");
          
                 
           
  }else{
               
            echo "YA EXISTE...EL USUARIO CON EL NUMERO DE IDENTIFICACION... YA EXISTE";
  }
           
     
            
          

           
        
          
           
   }
   
   
   public function consultaUsuario($documento, $tipo_doc, $fecha, $gen, $prinom, $segnom, $priape, $segape,
        $naci, $ed, $lugnaci, $esta, $didom, $ba, $tedom, $celdom, $ep, $ar, $fonpen, $cacom, $nomconta,
                $paren, $telf, $celf, $nomem, $tel, $ofiha, $depor, $eva){
       
       
       $this->documento = $documento; 
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           $this->genk=$gen;
           $this->prinomk = $prinom;
            $this->segnomk = $segnom;
            $this->priapek = $priape;
            $this->segapek = $segape;
            $this->nacik = $naci;
            $this->edk = $ed;
            $this->lugnacik= $lugnaci;
            $this->estak = $esta;
            $this->didomk = $didom;
            $this->bak =$ba;
             $this->tedomk =$tedom;
             $this->celdomk =$celdom;
             $this->epk =$ep;
             $this->ark =$ar;
             $this->fonpenk =$fonpen;
             $this->cacomk =$cacom;
             $this->nomcontak =$nomconta;
             $this->parenk =$paren;
             $this->telfk =$telf;
             $this->celfk =$celf;
              $this->nomemk =$nomem;
              $this->telk =$tel;
             $this->ofihak =$ofiha;
              $this->depork =$depor;
             $this->evak =$eva;
             
             $this->consultar= mysqli_query($this->conexion,"SELECT num_documento FROM registro_usuario where num_documento = '".$this->documento."'"); 

                   if($this->row = mysqli_fetch_array($this->consultar)){
                    session_start();
                     $this->consultar = mysqli_query($this->conexion,"SELECT * FROM resgistro_usuario where num_documento = '".$this->documento."' ");  
                    $this->row = mysqli_fetch_array($this->consultar);
                     //Id
                    $this->id = $this->row['id'];
                    $_SESSION['id'] = $this->id;
                    $this->ini = 1;
                    //Numero de documento
                    $this->id = $this->row['num_documento'];
                    $_SESSION['documento'] = $this->id; 
                    //tipo documento
                    $this->id = $this->row['tipo_doc'];
                    $_SESSION['tipo_doc'] = $this->id; 
                     //fecha
                    $this->id = $this->row['fecha'];
                    $_SESSION['fechak'] = $this->id; 
                     //genero
                    $this->id = $this->row['genero'];
                    $_SESSION['genk'] = $this->id; 
                         header("Location: ../vistas/agregar_usuario.php");      
                }else{
                        echo " usuario incorrecto ";

                        
                }
                return $this->consulta ;
	
                    
                    
    /*         		$this->consulta= mysql_query("SELECT num_documento FROM registro_usuario where documento = '".$this->tipo_doc."'", $this->conexion); 

       if($this->row = mysql_fetch_array($this->consulta)){
                    session_start();
                    
                    $this->consulta = mysql_query("SELECT * FROM wisher where usuario = '".$this->user."' ",  $this->conexion);  
                    $this->row = mysql_fetch_array($this->consulta);
                    $this->consulta = mysql_query("SELECT num_documento, tipo_doc, fecha, genero, primer_nombre, segundo_nombre, primer_apellido, 
          segundo_apellido, fch_nacimiento, edad, lugar_nacimiento, estado_civil, 
          direccion_domicilio, barrio, tel_domicilio, cel_domicilio, eps, arl, 
          fondo_pensiones, caja_compensacion, nom_cntcto_fmliar, parentesco, 
          tel_fmliar, cel_fmliar, nombre_empresa, telefono, oficio_habitual,  
          deporte_practicar, evaluador FROM resistro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);  
                    $this->row = mysql_fetch_array($this->consulta);

       
    /*   //Id
                    $this->id = $this->row['id'];
                    $_SESSION['id'] = $this->id;
                    $this->ini = 1;
                    //Nombre
                    $this->id = $this->row['num_doci'];
                    $_SESSION['name'] = $this->id; 
                    //apellido
                    $this->id = $this->row['apellido'];
                    $_SESSION['apellido'] = $this->id; 
                         header("Location: ../vistas/agregar_usuario.php");      
                }else{
                        echo " usuario o password incorrecto ";

                        
                }
                return $this->consulta ;
	}
*/
       
      /*  $this->con= mysql_query("SELECT num_documento, tipo_doc, fecha, genero, primer_nombre, segundo_nombre, primer_apellido, 
          segundo_apellido, fch_nacimiento, edad, lugar_nacimiento, estado_civil, 
          direccion_domicilio, barrio, tel_domicilio, cel_domicilio, eps, arl, 
          fondo_pensiones, caja_compensacion, nom_cntcto_fmliar, parentesco, 
          tel_fmliar, cel_fmliar, nombre_empresa, telefono, oficio_habitual,  
          deporte_practicar, evaluador FROM resistro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
           
           while($this->row = mysql_fetch_array($this->con)){
               
              
               echo "<tr>";
               
               echo "<td>",$this->row['documento'],"</td><td>", $this->row['tipo_doc'],"</td>
                       <td>",$this->row['fecha'],"</td><td>", $this->row['genero'],"</td>
                       <td>",$this->row['primer_nombre'],"</td><td>", $this->row['segundo_nombre'],"</td>
                       <td>",$this->row['primer_apellido'],"</td><td>", $this->row['segundo_apellido'],"</td>
                       <td>",$this->row['fch_nacimiento'],"</td><td>", $this->row['edad'],"</td>
                       <td>",$this->row['lugar_nacimiento'],"</td><td>", $this->row['estado_civil'],"</td>
                       <td>",$this->row['direccion_domicilio'],"</td><td>", $this->row['barrio'],"</td>
                       <td>",$this->row['tel_domicilio'],"</td><td>", $this->row['cel_domicilio'],"</td>
                       <td>",$this->row['eps'],"</td><td>", $this->row['arl'],"</td>
                       <td>",$this->row['fondo_pensiones'],"</td><td>", $this->row['caja_compensacion'],"</td>
                       <td>",$this->row['nom_cntcto_fmliar'],"</td><td>", $this->row['parentesco'],"</td>
                       <td>",$this->row['tel_fmliar'],"</td><td>", $this->row['cel_fmliar'],"</td>
                       <td>",$this->row['nombre_empresa'],"</td><td>", $this->row['telefono'],"</td>
                       <td>",$this->row['oficio_habitual'],"</td><td>", $this->row['deporte_practicar'],"</td>
                       <td>",$this->row['evaluador'],"</td>";


                       
               
               echo "</tr>";
              

            */   
           
   


}


public function busca_Med_laboral($documento, $pre){
    $this->documento = $documento; 
           $this->pre = $pre; 
   

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 
           
$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'");
          
          /* if(mysql_num_rows($this->veri)>0){

           $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
while($this->row = mysql_fetch_array($this->con)){
   
while($this->row = mysql_fetch_array($this->con)){
*/
if(mysqli_num_rows($this->con)>0){
    
    while($this->row = mysqli_fetch_array($this->con)){
        
        
        
        echo "
<div align='center'> 
        <link rel='stylesheet' type ='text/css' href='../vistas/css/add_wish.css'>

    <table  class='ocho' border='0'  style='font-family: Verdana; font-size: 8pt'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Actualice los datos del VOTANTE</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores actuales,  
            si no se cambian los valores se mantienen iguales.</td> 
        </tr>    


        <form method='POST' action='../controlador/editar.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Numero de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
        </tr> 
        
        <tr> 
            <td width='50%'><p align='center'><b>Tipo de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tipo_doc' size='20' value='".$this->row['tipo_doc']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Fecha</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fecha' size='20' value='".$this->row['fecha']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Genero </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='genero' size='20' value='".$this->row['genero']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Primer nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Primer apellido </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_apellido' size='20' value='".$this->row['segundo_apellido']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Fecha de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fch_nacimiento' size='20' value='".$this->row['fch_nacimiento']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Edad </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='edad' size='20' value='".$this->row['edad']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Lugar de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='lugar_nacimiento' size='20' value='".$this->row['lugar_nacimiento']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Estado civil </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='estado_civil' size='20' value='".$this->row['estado_civil']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Direccion domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='direccion_domicilio' size='20' value='".$this->row['direccion_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Barrio</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='barrio' size='20' value='".$this->row['barrio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Telefono domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tel_domicilio' size='20' value='".$this->row['tel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Celular </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='cel_domicilio' size='20' value='".$this->row['cel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>EPS </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='eps' size='20' value='".$this->row['eps']."'></td> 
        </tr>
        
         <tr> 
            <td width='50%'><p align='center'><b>Evaluador </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
        </tr>
        <tr> 
            
      
        
  <tr>            <td width='100%' colspan='2'> 

         <center>  <input type='submit' value='Actualizar datos'></center></tr>

        </form>  
    </table> 
</div> 
"; 
}
        
        
        
       



    

  
    

    }else 
    echo "Debes escribir un numero de documento existente";
}

  }
  

  
  
public function busca_Med_laboral_Eliminar($documento, $pre){
    $this->documento = $documento; 
           $this->pre = $pre; 
   

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 
           
$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'" );
          
          /* if(mysql_num_rows($this->veri)>0){

           $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
while($this->row = mysql_fetch_array($this->con)){
   
while($this->row = mysql_fetch_array($this->con)){
*/
if(mysqli_num_rows($this->con)>0){
    
    while($this->row = mysqli_fetch_array($this->con)){
        
        
        
        echo "
<div align='center'> 
        <link rel='stylesheet' type ='text/css' href='../vistas/css/add_wish.css'>

    <table  class='ocho' border='0'  style='font-family: Verdana; font-size: 8pt'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Elimine Votante </h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>Esta a punto de Eliminar Votante.</td> 
        </tr>    


        <form method='POST' action='../controlador/editarCopia.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Numero de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
        </tr> 
        
        <tr> 
            <td width='50%'><p align='center'><b>Tipo de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tipo_doc' size='20' value='".$this->row['tipo_doc']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Fecha</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fecha' size='20' value='".$this->row['fecha']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Genero </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='genero' size='20' value='".$this->row['genero']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Primer nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Primer apellido </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_apellido' size='20' value='".$this->row['segundo_apellido']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Fecha de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fch_nacimiento' size='20' value='".$this->row['fch_nacimiento']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Edad </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='edad' size='20' value='".$this->row['edad']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Lugar de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='lugar_nacimiento' size='20' value='".$this->row['lugar_nacimiento']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Estado civil </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='estado_civil' size='20' value='".$this->row['estado_civil']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Direccion domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='direccion_domicilio' size='20' value='".$this->row['direccion_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Barrio</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='barrio' size='20' value='".$this->row['barrio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Telefono domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tel_domicilio' size='20' value='".$this->row['tel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Celular </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='cel_domicilio' size='20' value='".$this->row['cel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>EPS </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='eps' size='20' value='".$this->row['eps']."'></td> 
        </tr>
        
         <tr> 
            <td width='50%'><p align='center'><b>Evaluador </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
        </tr>
        <tr> 
            
       <tr><td>  
        <input type='hidden' name='documento'> 
        <tr> 
            <td colspan='2'>Esta a punto de Eliminar Votante.</td> 
        </tr> 
        
  <tr>            <td width='100%' colspan='2'> 

         <center>  <input type='submit' value='ELIMINAR'></center></tr>

        </form>  
    </table> 
</div> 
"; 
}
        
        
        
       



    

  
    

    }else 
    echo "Debes escribir un numero de documento existente";
}

  }
  

  
  
public function Model_Busca_Eliminacion($documento, $pre){
    $this->documento = $documento; 
           $this->pre = $pre; 
   

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 
                    //   "SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'" ,$this->conexion
$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'");
          
          /* if(mysql_num_rows($this->veri)>0){

           $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
while($this->row = mysql_fetch_array($this->con)){
   
while($this->row = mysql_fetch_array($this->con)){
*/
if(mysqli_num_rows($this->con)>0){
    
    while($this->row = mysqli_fetch_array($this->con)){
        
        
        
        echo "
<div align='center'> 
        <link rel='stylesheet' type ='text/css' href='../vistas/css/add_wish.css'>

    <table  class='ocho' border='0'  style='font-family: Verdana; font-size: 8pt'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Actualice los datos que considere</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores actuales,  
            si no se cambian los valores se mantienen iguales.</td> 
        </tr>    


        <form method='POST' action='../controlador/Controlador_Eliminar.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Numero de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
        </tr> 
        
        <tr> 
            <td width='50%'><p align='center'><b>Tipo de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tipo_doc' size='20' value='".$this->row['tipo_doc']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Fecha</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fecha' size='20' value='".$this->row['fecha']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Genero </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='genero' size='20' value='".$this->row['genero']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Primer nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Primer apellido </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_apellido' size='20' value='".$this->row['segundo_apellido']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Fecha de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fch_nacimiento' size='20' value='".$this->row['fch_nacimiento']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Edad </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='edad' size='20' value='".$this->row['edad']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Lugar de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='lugar_nacimiento' size='20' value='".$this->row['lugar_nacimiento']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Estado civil </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='estado_civil' size='20' value='".$this->row['estado_civil']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Direccion domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='direccion_domicilio' size='20' value='".$this->row['direccion_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Barrio</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='barrio' size='20' value='".$this->row['barrio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Telefono domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tel_domicilio' size='20' value='".$this->row['tel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Celular </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='cel_domicilio' size='20' value='".$this->row['cel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>EPS </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='eps' size='20' value='".$this->row['eps']."'></td> 
        </tr>
        
         <tr> 
            <td width='50%'><p align='center'><b>Evaluador </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
        </tr>
        <tr> 
            
       <tr><td>  
        <input type='hidden' name='documento'> 
        </tr></td> 
            
            
             
        </tr>
        
  <tr>            <td width='100%' colspan='2'> 

         <center>  <input type='submit' name='pre' value='ELIMINAR VOTANTE'></center></tr>

        </form>  
    </table> 
</div> 
"; 
}
        
        
        
       



    

  
    

    }else 
    echo "Debes escribir un numero de documento existente";
}

  }
  
  
  
  

public function modeloConsultaLider($evaluador, $nivel_academico_actual, $pre ){
    $this->evaluador = $evaluador; 
     $this->nivel_academico_actual = $nivel_academico_actual; 
           $this->pre = $pre; 
           

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 //("SELECT * FROM registro_usuario where evaluador = '".$this->evaluadorChek."' and wisher_id = '".$_SESSION['id']."'" ,$this->conexion);
                   //      ("SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'" ,$this->conexion);
      
                         //("select * from calif where id_usuario=$id",$c);    SELECT * FROM `productos`WHERE `SECCIÓN`="DEPORTES" AND `PAÍSDEORIGEN`="USA"
$this->con = mysqli_query ($this->conexion,"SELECT * FROM registro_usuario where evaluador = '".$this->evaluador."'and nivel_academico_actual = '".$this->nivel_academico_actual."'" );
        //("select * from registro_usuario INNER JOIN registro_administrador ON registro_usuario.wisher_id= registro_administrador.id'".$_SESSION['id']."'",$this->conexion);
// wisher_id='".$this->wisher_id."',
// //("select * from registro_usuario INNER JOIN registro_administrador ON registro_usuario.wisher_id  = registro_administrador.id='".$_SESSION['id']."'",$this->conexion);
                   //    (select * from registro_usuario INNER JOIN registro_administrador ON registro_usuario.wisher_id  = registro_administrador.id                                                             
          /* if(mysql_num_rows($this->veri)>0){

           $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
while($this->row = mysql_fetch_array($this->con)){
   
while($this->row = mysql_fetch_array($this->con)){
*/
 
if(mysqli_num_rows($this->con)>0){
    
    while($this->row = mysqli_fetch_array($this->con)){
        
         {
        
        echo "
            <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 1px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>      

    
             
  </TABLE>  
<div > 

    <table  > 
          


        <form method='POST' action='../controlador/controladorEditar2.php'> 
       
        
         <table>
  <tr>    
  
  <th>Nombre de Lider<input class=''  type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></th>
      <th>Cedula Lider<input class=''  type='text' name='nivel_academico_actual' size='20' value='".$this->row['nivel_academico_actual']."'></th>
          <th>wisher_id<input class=''  type='text' name='wisher_id' size='20' value='".$this->row['wisher_id']."'></th>
    <th>Votante.<input class='' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></th>
            <th>Votante.<input class='' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></th>
    <th>Votante.<input class='' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></th>
    <th>Votante.<input class='' type='text' name='segundo_apellido' size='20' value='".$this->row['segundo_apellido']."'></th>

    <th>Fecha Naci.<input class='' type='text' name='fch_nacimiento' size='20' value='".$this->row['fch_nacimiento']."'></th>
     <th>Lugar de Naci.<input class='' type='text' name='lugar_nacimiento' size='20' value='".$this->row['lugar_nacimiento']."'></th>
    <th>Barrio<input class='' type='text' name='estado_civil' size='20' value='".$this->row['estado_civil']."'></th>
    <th>Zona<input class='' type='text' name='direccion_domicilio' size='20' value='".$this->row['direccion_domicilio']."'></th>
            <th>Zona<input class='' type='text' name='barrio' size='20' value='".$this->row['barrio']."'></th>
    <th>Zona<input class='' type='text' name='tel_domicilio' size='20' value='".$this->row['tel_domicilio']."'></th>

</tr>
           
        
        
       
         </table>    
            
             
        
      

        </form>  
    </table> 
</div> 
"; 
}
    }
        
        
        
       



    

  
    

    }else 
    echo "Debes escribir un numero de documento existente";
}

  }
  
   
           
              
              
              
  public function editar($documento, $tipo_doc, $fecha, $genero, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
        $fch_nacimiento, $edad, $lugar_nacimiento, $estado_civil, $direccion_domicilio, $barrio, $tel_domicilio, $cel_domicilio, $eps,  $evaluador){
       
       
       $this->documento = $documento; 
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           
           $this->genk=$genero;
           $this->prinomk = $primer_nombre;
            $this->segnomk = $segundo_nombre;
            $this->priapek = $primer_apellido;
            $this->segapek = $segundo_apellido;
            $this->nacik = $fch_nacimiento;
            $this->edk = $edad;
            $this->lugnacik= $lugar_nacimiento;
            $this->estak = $estado_civil;
            $this->didomk = $direccion_domicilio;
            $this->bak =$barrio;
             $this->tedomk =$tel_domicilio;
             $this->celdomk =$cel_domicilio;
             $this->epk =$eps;
             
             $this->evak =$evaluador;
             
   

              
                     
              

           
           
    mysqli_query($this->conexion,"UPDATE registro_usuario SET tipo_doc='".$this->tipo_doc."', fecha='".$this->fechak."', genero='".$this->genk."', primer_nombre='".$this->prinomk."',segundo_nombre='".$this->segnomk."',primer_apellido='".$this->priapek."',       
    segundo_apellido='".$this->segapek."', fch_nacimiento='".$this->nacik."',edad='".$this->edk."',lugar_nacimiento='".$this->lugnacik."',estado_civil='".$this->estak."',
    direccion_domicilio='".$this->didomk."', barrio='".$this->bak."',tel_domicilio='".$this->tedomk."',cel_domicilio='".$this->celdomk."',eps='".$this->epk."',evaluador='".$this->evak."'           

    where num_documento = '".$this->documento."'");
echo " 
<p>Los datos han sido actualizados con exito.</p>
            <a href ='../vistas/consulta.php' class = 'uno'>Volver...</a>"    

    ; 

           
              }  
              
               public function editar_Eliminar($documento, $tipo_doc, $fecha, $genero, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
        $fch_nacimiento, $edad, $lugar_nacimiento, $estado_civil, $direccion_domicilio, $barrio, $tel_domicilio, $cel_domicilio, $eps,  $evaluador){
       
       
       $this->documento = $documento; 
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           
           $this->genk=$genero;
           $this->prinomk = $primer_nombre;
            $this->segnomk = $segundo_nombre;
            $this->priapek = $primer_apellido;
            $this->segapek = $segundo_apellido;
            $this->nacik = $fch_nacimiento;
            $this->edk = $edad;
            $this->lugnacik= $lugar_nacimiento;
            $this->estak = $estado_civil;
            $this->didomk = $direccion_domicilio;
            $this->bak =$barrio;
             $this->tedomk =$tel_domicilio;
             $this->celdomk =$cel_domicilio;
             $this->epk =$eps;
             
             $this->evak =$evaluador;
             
   

              
                     
              

           
           
   mysqli_query($this->conexion,"DELETE FROM registro_usuario WHERE num_documento = '".$this->documento."' and evaluador='".$this->evak."'");
echo " 
<p>Los datos han sido ELIMINADOS con exito.</p>
            <a href ='../vistas/consulta.php' class = 'uno'>Volver...</a>"    

    ; 

           
              }   
              
              
  public function modeloEditarLider($evaluadorChek, $wisher_id, $primer_nombre, $genero)  {
     
           $this->evaluador = $evaluadorChek; 
           $this->wisher_id = $wisher_id;
           
           $this->primer_nombre=$primer_nombre;
           $this->genero = $genero;
           //UPDATE `registro_usuario` SET `id`=[value-1],`num_documento`=[value-2],`tipo_doc`=[value-3],`fecha`=[value-4],
  mysqli_query($this->conexion,"UPDATE registro_usuario SET evaluador='".$this->evaluador."', wisher_id='".$this->wisher_id."', primer_nombre='".$this->primer_nombre."', genero='".$this->genero."'
    where evaluador = '".$this->evaluador."' ");
echo " 
<p>Los datos han sido actualizados con exito.</p>
            <a href ='../vistas/consulta.php' class = 'uno'>Volver...</a>"    

    ; 

           
   }    
              
              
               public function modeloEditarLider2($evaluador,$nivel_academico_actual,$wisher_id,
                       $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fch_nacimiento,$lugar_nacimiento,
        $estado_civil,$direccion_domicilio,$barrio,$tel_domicilio)   {
     
           $this->evaluador = $evaluador; 
           $this->nivel_academico_actual = $nivel_academico_actual; 
           $this->wisher_id = $wisher_id;
           
           $this->primer_nombre=$primer_nombre;
           $this->segundo_nombre = $segundo_nombre;
           $this->primer_apellido = $primer_apellido;
           $this->segundo_apellido = $segundo_apellido;
           $this->fch_nacimiento = $fch_nacimiento;
           $this->lugar_nacimiento = $lugar_nacimiento;
           $this->estado_civil = $estado_civil;
           $this->direccion_domicilio = $direccion_domicilio;
           $this->bar = $barrio;
                      $this->tel_domicilio = $tel_domicilio;

                                

           
  mysqli_query($this->conexion,"select registro_usuario SET  wisher_id='".$this->wisher_id."',primer_nombre='".$this->primer_nombre."',segundo_nombre='".$this->segundo_nombre."',primer_apellido='".$this->primer_apellido."',segundo_apellido='".$this->segundo_apellido."',fch_nacimiento='".$this->fch_nacimiento."',lugar_nacimiento='".$this->lugar_nacimiento."',estado_civil='".$this->estado_civil."',direccion_domicilio='".$this->direccion_domicilio."',barrio='".$this->bar."',tel_domicilio='".$this->tel_domicilio."'where nivel_academico_actual = '".$this->nivel_academico_actual."'AND evaluador='".$this->evaluador."'");
echo " 
<p>Los datos han sido actualizados con exito.</p>
            <a href ='../vistas/consulta.php' class = 'uno'>Volver...</a>"    

    ; 

           
              }  
              
              
                          
              
              
 
              
     public function certificado_ocupacional_pdf($documento, $pre){
    $this->documento = $documento; 
           $this->pre = $pre; 
   

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 
           
$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'");
          
          /* if(mysql_num_rows($this->veri)>0){

           $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
while($this->row = mysql_fetch_array($this->con)){
   º
while($this->row = mysql_fetch_array($this->con)){
*/
if(mysqli_num_rows($this->con)>0){
    
    while($this->row = mysqli_fetch_array($this->con)){
        
        
        
        echo "
<div align='center'> 
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
        <!--<link rel='stylesheet' type ='text/css' href='../vistas/css/editar.css'>-->
<!--<link rel='stylesheet' type ='text/css' href='../vistas/css/editar_2.css'>-->
<link rel='stylesheet' type ='text/css' href='../vistas/css/add_wish.css'>
    <table border='0' class='ocho' width='600' style='font-family: Verdana; font-size: 8pt'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Genere PDF de Votante</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores actuales,  
            si DESEA Puede Generar un arcivo PDF</td> 
        </tr> 
        



<script language='javascript'>
//el nombre de nustra funcion 'Totales'
 function Totales() {
   with (document.forms['Miformularionombre']) // el nombre del formulario
   {
  var totalResult = Number( caja1.value ) + Number( caja2.value );
  //sumamos las cajas con los nombres
  total.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }

  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ '' ;
  if(num.indexOf('.') == -1)
    num += '.' ;
  while(num.length - num.indexOf('.') - 1 < pow)
    num += '0' ;

  return num;
}
</script>









        <form name='Miformularionombre' method='POST' action='../controlador/generar.php'> 
       
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Numero de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
        </tr> 
        
        <tr> 
            <td width='50%'><p align='center'><b>Tipo de documento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tipo_doc' size='20' value='".$this->row['tipo_doc']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Fecha</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fecha' size='20' value='".$this->row['fecha']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Genero </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='genero' size='20' value='".$this->row['genero']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Primer nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Primer apellido </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 
        </tr>
        
<tr> 
            <td width='50%'><p align='center'><b>Segundo nombre </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_apellido' size='20' value='".$this->row['segundo_apellido']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Fecha de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='fch_nacimiento' size='20' value='".$this->row['fch_nacimiento']."'></td> 
        </tr>
        


<tr> 
            <td width='50%'><p align='center'><b>Edad </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='edad' size='20' value='".$this->row['edad']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Lugar de nacimiento </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='lugar_nacimiento' size='20' value='".$this->row['lugar_nacimiento']."'></td> 
        </tr>
        

<tr> 
            <td width='50%'><p align='center'><b>Estado civil </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='estado_civil' size='20' value='".$this->row['estado_civil']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Direccion domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='direccion_domicilio' size='20' value='".$this->row['direccion_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Barrio</b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='barrio' size='20' value='".$this->row['barrio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Telefono domicilio </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='tel_domicilio' size='20' value='".$this->row['tel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>Celular </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='cel_domicilio' size='20' value='".$this->row['cel_domicilio']."'></td> 
        </tr>
        <tr> 
            <td width='50%'><p align='center'><b>EPS </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='eps' size='20' value='".$this->row['eps']."'></td> 
        </tr>
        
         <tr> 
            <td width='50%'><p align='center'><b>Evaluador </b></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
        </tr>
        
 
	




<br>
<br>

<tr>





    




<!--<p align='center'><b>Dorso y Columna</b> </p>
Caja 1<input onKeyUp='Totales()' type='text' name='caja1'  >--> <!-- CAjas de tecto nommal-->
  <!-- solo que usuaremos el evento 'onKeyUp este evento hace que una ves que den click  a la caja de texto
  y salgan se ejecuta el evento y manda a traer la funcion Totales TOTALES ES UNA FUNCION el nombre de la
  caja es importante que tambien lo ocuparemos en este caso se llamca caja 1 y el de abajo caja2'--->
<!--<BR>-->
 <!-- Caja 2<input onKeyUp='Totales()' type='text' name='caja2' > --><!-- CAjas de tecto nommal-->
<!--<BR>-->
 <!-- Total:<input type=text name='total' readonly > --><!-- CAjas de tecto nommal y esta caja se llama-->
  <!--TOTAL donde se imprime el resultado-->



     <tr>       <table>     <td width='100%' colspan='2'> 

         <center>  <input class='uno' type='submit'  value='Generar PDF'></center></tr>
         

        </form>  
    </table> 
</div> 




"; 
}
        
        
        
       



    

  
    

    }else 
    echo "Debes escribir un numero de documento existente";
}

  }  
  
  
  
   public function certificado_ocupacional_pdf_2($documento, $pre){
    $this->documento = $documento; 
           $this->pre = $pre; 
   

  if(isset($this->pre))
  { 
          
           
        
          
           
                   //  $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
 
           ////SELECT * FROM `productos` where `SECCIÓN`= 'DEPORTES' OR `SECCIÓN`='CERAMICA' ORDER BY `SECCIÓN`
      
//$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where num_documento = '".$this->documento."' and wisher_id = '".$_SESSION['id']."'");
      
$this->con = mysqli_query($this->conexion,"SELECT * FROM registro_usuario where nivel_academico_actual = '".$this->documento."'and wisher_id = '".$_SESSION['id']."'");
          
          //if(mysql_num_rows($this->veri)>0){

       ////    $this->con= mysql_query("SELECT * FROM registro_usuario WHERE wisher_id='".$_SESSION['id']."'" , $this->conexion);
     
//while($this->row = mysql_fetch_array($this->con)){
   
while($this->row = mysqli_fetch_array($this->con)){


//if(mysqli_num_rows($this->con)>0){
     
   // while($this->row = mysqli_fetch_array($this->con)){
        
    //    for((mysqli_num_rows($this->con)>0); $this->row = mysqli_fetch_array($this->con); $this->row++) 
       // {
                        
           
        echo "
<script language='javascript'>
//el nombre de nustra funcion 'Totales'
 function Totales() {
   with (document.forms['Miformularionombre_2']) // el nombre del formulario
   {
  var totalResult = Number( caja1.value ) + Number( caja2.value );
  //sumamos las cajas con los nombres
  total.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }

  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ '' ;
  if(num.indexOf('.') == -1)
    num += '.' ;
  while(num.length - num.indexOf('.') - 1 < pow)
    num += '0' ;

  return num;
}
</script>



<fieldset>
<table>
  <tr>
    <th>Cedula Lider</th>
    <th>Nombre Lider</th>
    <th>1-Nombre Adscrito  lider</th>
    <th>2-Nombre</th>
     <th>1-Apellido</th>
     <th>2-Apellido</th>
    
  </tr>
              <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 


  </tr>
  </table>

    

   <tr>          
 </fieldset>
    


       
      
<!--<p align='center'><b>Dorso y Columna</b> </p>
Caja 1<input onKeyUp='Totales()' type='text' name='caja1'  >--> <!-- CAjas de tecto nommal-->
  <!-- solo que usuaremos el evento 'onKeyUp este evento hace que una ves que den click  a la caja de texto
  y salgan se ejecuta el evento y manda a traer la funcion Totales TOTALES ES UNA FUNCION el nombre de la
  caja es importante que tambien lo ocuparemos en este caso se llamca caja 1 y el de abajo caja2'--->
<!--<BR>-->
 <!-- Caja 2<input onKeyUp='Totales()' type='text' name='caja2' > --><!-- CAjas de tecto nommal-->
<!--<BR>-->
 <!-- Total:<input type=text name='total' readonly > --><!-- CAjas de tecto nommal y esta caja se llama-->
  <!--TOTAL donde se imprime el resultado-->



    

          
 
  
         





";
       if(isset($this->pre))
  { 
        
 echo "<form name='Miformularionombre' method='POST' action='../controlador/generar.php'> 
       

         <td width='50%'><p align='center'><input class='ocho'  type='text' name='num_documento' size='20' value='".$this->row['num_documento']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='evaluador' size='20' value='".$this->row['evaluador']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_nombre' size='20' value='".$this->row['primer_nombre']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='segundo_nombre' size='20' value='".$this->row['segundo_nombre']."'></td> 
            <td width='50%'><p align='center'><input class='ocho' type='text' name='primer_apellido' size='20' value='".$this->row['primer_apellido']."'></td> 
        
        ";
       
 echo " <center>  <input class='uno' type='submit'  value='Generar PDF'></center></tr>";


    
  
  
    

    }else 
    echo "Debes escribir un numero de documento existente";

   } }}
  
   public function editar_pdf($documento, $tipo_doc, $fecha, $genero, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
        $fch_nacimiento, $edad, $lugar_nacimiento, $estado_civil, $direccion_domicilio, $barrio, $tel_domicilio, $cel_domicilio, $eps, $evaluador

           ){
       
       
       $this->documento = $documento; 
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           
           $this->genk=$genero;
           $this->prinomk = $primer_nombre;
            $this->segnomk = $segundo_nombre;
            $this->priapek = $primer_apellido;
            $this->segapek = $segundo_apellido;
            $this->nacik = $fch_nacimiento;
            $this->edk = $edad;
            $this->lugnacik= $lugar_nacimiento;
            $this->estak = $estado_civil;
            $this->didomk = $direccion_domicilio;
            $this->bak =$barrio;
             $this->tedomk =$tel_domicilio;
             $this->celdomk =$cel_domicilio;
             $this->epk =$eps;
             
             $this->evak =$evaluador;
              

 


           
    mysqli_query("UPDATE registro_usuario SET tipo_doc='".$this->tipo_doc."', fecha='".$this->fechak."', genero='".$this->genk."', primer_nombre='".$this->prinomk."',segundo_nombre='".$this->segnomk."',primer_apellido='".$this->priapek."',       
    segundo_apellido='".$this->segapek."', fch_nacimiento='".$this->nacik."',edad='".$this->edk."',lugar_nacimiento='".$this->lugnacik."',estado_civil='".$this->estak."',
    direccion_domicilio='".$this->didomk."', barrio='".$this->bak."',tel_domicilio='".$this->tedomk."',cel_domicilio='".$this->celdomk."',eps='".$this->epk."',evaluador='".$this->evak."'

    where num_documento = '".$this->documento."'", $this->conexion);
echo " 
<p >Los datos han sido actualizados con exito.</p>
            <a href ='../vistas/menu.php' class = 'uno'>Volver...</a>"    

    ; 

           
              }
              
  
   public function editar_pdf_2($documento, $tipo_doc, $fecha, $genero, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
        $fch_nacimiento, $edad, $lugar_nacimiento, $estado_civil, $direccion_domicilio, $barrio, $tel_domicilio, $cel_domicilio, $eps, $evaluador

           ){
       
       
       $this->documento = $documento; 
           $this->tipo_doc = $tipo_doc; 
           $this->fechak = $fecha;
           
           $this->genk=$genero;
           $this->prinomk = $primer_nombre;
            $this->segnomk = $segundo_nombre;
            $this->priapek = $primer_apellido;
            $this->segapek = $segundo_apellido;
            $this->nacik = $fch_nacimiento;
            $this->edk = $edad;
            $this->lugnacik= $lugar_nacimiento;
            $this->estak = $estado_civil;
            $this->didomk = $direccion_domicilio;
            $this->bak =$barrio;
             $this->tedomk =$tel_domicilio;
             $this->celdomk =$cel_domicilio;
             $this->epk =$eps;
             
             $this->evak =$evaluador;
              

 


           
    mysqli_query("UPDATE registro_usuario SET tipo_doc='".$this->tipo_doc."', fecha='".$this->fechak."', genero='".$this->genk."', primer_nombre='".$this->prinomk."',segundo_nombre='".$this->segnomk."',primer_apellido='".$this->priapek."',       
    segundo_apellido='".$this->segapek."', fch_nacimiento='".$this->nacik."',edad='".$this->edk."',lugar_nacimiento='".$this->lugnacik."',estado_civil='".$this->estak."',
    direccion_domicilio='".$this->didomk."', barrio='".$this->bak."',tel_domicilio='".$this->tedomk."',cel_domicilio='".$this->celdomk."',eps='".$this->epk."',evaluador='".$this->evak."'

    where num_documento = '".$this->documento."'", $this->conexion);
echo " 
<p >Los datos han sido actualizados con exito.</p>
            <a href ='../vistas/menu.php' class = 'uno'>Volver</a>"    

    ; 

           
              }
              
  
  
  
           }
  
           

      
          
                


?>
