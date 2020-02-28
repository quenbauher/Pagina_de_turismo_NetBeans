



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Proyecto en costrucion</title>

        <link rel="stylesheet" href="../css/index_style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src='../js/script.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        

    <!--<link rel="stylesheet" type="text/css" href="css/estiloFondoImagenes.css" />-->
    <script type="text/javascript" src="../js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css"/>
</head>

   
<body>
    
    <div  class="flechaAbajo"><i class="fa fa-angle-double-down" style="font-size:48px;"></i>
     </div>   
        
    <header>
        
        <nav>
                    	
                <img  id='logo' src='../imagenes/logo-valle-gobernacion.jpg'/>
                
                

                
                          <ul>
                              <a href='index.php'><li><b>Inicio</b></li></a>
                                <a href='indexlogin.php'><li><b> Login</b></li></a>
                              <!--  <a href='index.php'><li><b>Inicio</b></li></a>
                                <a href='index.php'><li><b>Inicio</b></li></a>-->
				<a href='viajes.php'><li><b>Nosotros</b></li></a>
				<a href='itinerario.php'><li><b>Itinerario de Viajes Valle Del Cauca</b></li></a>
				 <!--<a href='registro.php'><li><b>Registro</b></li></a>
                              <!--  <a href='login.php'><li><b>Login</b></li></a>-->
				
			</ul>
    
		</nav>
           
          
            
       
	</header>
    
    <div class="jumbotron text-center">
        
        
	<section id='banner_principal'>
		
        </section>

	<section id='body'>
	
	      <div class="container">
		<div class="col-md-12">
			<div id="carousel-1" class="carousel slide" data-ride="carousel">
                            
				<!-- Indicadores -->
                                <div class="colorfuente">
                                    <ul class="carousel-indicators" id="puntos"  >
                    <li id="colorfuentepuntos" data-target="#carousel-1" data-slide-to="0" class="active"  ></li>
					<li id="colorfuentepuntos" data-target="#carousel-1" data-slide-to="1"	></li>
					<li id="colorfuentepuntos" data-target="#carousel-1" data-slide-to="2"	></li>
				</ul>
                                    </div>
                                
				<!-- contenedor de los slide -->
				
				<div class="carousel-inner" role="listbox">
					<!-- #1 -->
					<div class="item active">
                                            <img id="imagenSlider" src="../imagenes/Hacienda_El_Paraiso.jpg" class="img-responsive" alt="Cargando"  ></img> <!-- style="width:822px;height:322px;" --> <!-- YA ME QUEDO CLARO POR QUE TODAS LAS IMAGENES MISMO TAMAÑO -->
						
                                            
                                            <div class="carousel-caption hidden-xs hidden-sm">
							<!-- <h3>Este es nuestro Slide #1</h3>
							<p>Lorem ipsum dolor sit amet.</p> -->
						</div>
					</div>
					<!-- #2 -->
					<div class="item ">
                                            <img id="imagenSlider" src="../imagenes/Ciclomontañismo_en_el_Valle_del_Cauca.JPG" class="img-responsive" alt="Cargando"  ></img>
						<div class="carousel-caption hidden-xs hidden-sm">
							<!-- <h3>Este es nuestro Slide #2</h3>
							<p>Lorem ipsum dolor sit amet.</p> -->
						</div>
					</div>
					<!-- #3 -->
					<div class="item">
                                            <img id="imagenSlider" src="../imagenes/rioCali3.jpg" class="img-responsive" alt="Cargando" ></img>
						<div class="carousel-caption hidden-xs hidden-sm">
			   				<!-- <h3>Este es nuestro Slide #3</h3>
							<p>Lorem ipsum dolor sit amet.</p> -->
						</div>
					</div>
				</div>
				<!-- Controles -->
				<div class="container-fluid" >

                
                 <div class="container" > 
                    
                     <a  class="boton1"  href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                                <!--     <i id="btnSig" class="fa fa-chevron-right" style="font-size:48px;color:red"></i>-->
					<span class="fa fa-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				
				</div>
				</div>
                                <div class="container" >

                				
				 <a class="boton2" href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
					<span class="fa fa-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>
				</div>
                                
                                <script>
$(document).ready(function(){
    $(".carousel-inner").mouseenter(function(){
        $(".carousel-inner").css("background-color", "rgb(230, 247, 243)");//color de fondo del marco del slider
    });
    $(".carousel-inner").mouseleave(function(){
        $(".carousel-inner").css("background-color", "White");
    });
});
</script>
                               
				</div>
				</div>
                                </div>
            </section>
			</div>
    
    
		
	
	
	
	
       
       
   
           <img id='logo' style="background-image:url('../imagenes/background.jpg')"/> <!--src='../imagenes/background.jpg'    <body style="background-image:url('clouds.jpg')">-->	
	
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Jquery/jquery-3.2.1.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>  

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!--<script type="text/javascript" src="Jquery/slider_del_medio.js"></script>-->
</body>
<div class="container" >
<h2>Image Gallery</h2>
  <p>The .thumbnail class can be used to display an image gallery.</p>
  <p>The .caption class adds proper padding and a dark grey color to text inside thumbnails.</p>
  <p>Click on the images to enlarge them.</p>
  <div class="row">
    <div class="col-md-4">
        <div id="div1" class="thumbnail">
            <style> 

         /*codigo que permite que cuando paso el maus la imagen cresca*/       
    #div1 {
    width: 280px;
    height: 206px;
    background: E5F1FF;
    -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
    transition: width 2s;
}

#div1:hover {
    width: 300px;
}
</style>
        <a href="imagenes/lights.jpg" target="_blank">
            <!-- <img id="imagenSlider" src="../imagenes/rioCali3.jpg" class="img-responsive" alt="Cargando" ></img>-->
            <img src="../imagenes/lights.jpg" alt="Lights" width="304" height="236">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div id="div1" class="thumbnail">
        <a href="imagenes/nature.jpg" target="_blank">
          <img src="../imagenes/nature.jpg" alt="Nature" width="304" height="236">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div id="div1" class="thumbnail">
        <a href="imagenes/fjords.jpg" target="_blank">
          <img src="../imagenes/fjords.jpg" alt="Fjords" width="304" height="236"">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

  
 

</html>
