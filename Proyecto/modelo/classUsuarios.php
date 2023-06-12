<?php

class Usuarios extends Modelo {
    
   


public function registrarse($user,$pass,$email){
    // $result2 = $this->conexion->beginTransaction();
    
    
    $consulta = " INSERT INTO usuarios (nombre, contraseñaEncriptada, correo) VALUES (:user, :pass, :email)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':user', $user);
        $result->bindParam(':pass', $pass);
        $result->bindParam(':email', $email);
        $result->execute();
        // $result2 = $this->conexion->commit();
        return $result; 
}

public function insertarP($titulo,$imagen,$contenido,$fechaini,$fechafin){
  
    
    
    $consulta = " INSERT INTO post (titulo, imagen, contenido,fechainicio,fechafin) VALUES (:titulo, :imagen, :contenido,:fechaini,:fechafin)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':imagen', $imagen);
        $result->bindParam(':contenido', $contenido);
        $result->bindParam(':fechaini', $fechaini);
        $result->bindParam(':fechafin', $fechafin);
        $result->execute();
      
        return $result; 
} 



public function eliminarP($titulo){
  
    
    
    $consulta = " DELETE FROM post where titulo=?";
        $result = $this->conexion->prepare($consulta);
     
        $result->bindParam(1, $titulo);

        $result->execute();
      
        return $result; 
} 
      
public function consultarUsuario($user) {
    $consulta = "SELECT * FROM usuarios where nombre=:user";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':user', $user);
    $result->execute();
    // $resultadoUsuario = $result->fetchAll();
    // return $resultadoUsuario;
    $resultadoUsuario=$result;
    foreach ($resultadoUsuario as $row) {
        $nivel= $row['nivel'] ;
    }
    return $nivel;
    // return $result->fetch(PDO::FETCH_ASSOC);
}

public function actualizainfo($email, $usuario)
        {
           
          $consulta="UPDATE `usuarios` SET  `correo` = ? WHERE nombre = ?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $email);
        
            $resultado->bindParam(2, $usuario);
            $resultado->execute();
        }

        public function checkEmail($email)
        {
            $consulta = "SELECT * FROM usuarios WHERE correo=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $email);
            $resultado->execute();

            foreach($resultado as $result){
                if($email === $result['correo']){
                    return true;
                } else{
                    return false;
                }
            }
        }


  


public function getLevel($nameUser){
    $consulta="SELECT * FROM `usuarios`where nombre=?;";
    $stmt=$this->conexion->prepare($consulta);
    $stmt->bindParam(1,$nameUser);
    $stmt->execute();
    $resultado=$stmt;
    foreach($resultado as $result){
       $numero=$result['nivel'];
    
   }
   return $numero;
}

public function getIDUser($nameUser){
    $consulta="SELECT * FROM `usuarios`where nombre=?;";
    $stmt=$this->conexion->prepare($consulta);
    $stmt->bindParam(1,$nameUser);
    $stmt->execute();
    $resultado=$stmt;
    foreach($resultado as $result){
       $numero=$result['id'];
    
   }
   return $numero;
}



public function getUser($user)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=:user";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':user', $user);
            $result->execute();
            $resultadoUsuario = $result;

            foreach ($resultadoUsuario as $row) {
                $nameUser= $row['nombre'] ;
            }
            return $nameUser;
        }

public function checkPasswordAntiguo($user, $password)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $user);
            $resultado->execute();
           
            foreach($resultado as $result){
               
                if($password === $result['contraseñaEncriptada']){
                    return true;
                } else{
                    return false;
                }
            }
        }



        public function getUserByMail($mail){
            $consulta = "SELECT * FROM usuarios WHERE correo=:mail";
            $result =$this->conexion->prepare($consulta);
            $result->bindParam(':mail', $mail);
            $result->execute();
            $resultadoUsuario = $result;
            foreach ($resultadoUsuario as $row) {
                $nameUser= $row['nombre'];
            }
            return $nameUser;
        }

       


        public function getPassword($email)
        {
            $consulta = "SELECT * FROM usuarios WHERE correo=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $email);
            $resultado->execute();

            foreach($resultado as $result){
                $contraseñaGet=$result['contraseñaEncriptada'];
            }
            return $contraseñaGet;
        }



        public function getEmail($usuario)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $usuario);
            $resultado->execute();

            foreach($resultado as $result){
                $emailBuscado=$result['correo'];
                
            }
            return $emailBuscado;
        }
        public function getIdPost($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            foreach($resultado as $result){
                $id=$result['id'];
                
            }
            return $id;
        }

        public function getIdPostValidar($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            $verdad=false;
            foreach($resultado as $result){
                $id=$result['id'];
                $verdad=true;
            }
            return $verdad;
        }





        public function getTitulo($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            foreach($resultado as $result){
                $titulo=$result['titulo'];
                
            }
            return $titulo;
        }
        public function getImagen($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            foreach($resultado as $result){
                $imagen=$result['imagen'];
                
            }
            return $imagen;
        }
        public function getContenido($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            foreach($resultado as $result){
                $contenido=$result['contenido'];
                
            }
            return $contenido;
        }


        public function getFechaFin($id){
            $consulta="SELECT * FROM post WHERE id=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->execute();
            foreach($resultado as $result){
                $fechafin=$result['fechafin'];
                
            }
            return $fechafin;
        }

        public function sacarordenPost(){
            $consulta="SELECT * FROM post  order by SUBSTRING(fechafin, 4, 2) desc,SUBSTRING(fechafin, 1, 2) desc,SUBSTRING(fechafin, 7, 4) desc"  ;
            $resultado=$this->conexion->prepare($consulta);
           
            $resultado->execute();
            $array=$resultado->fetchAll();
          
            return $array;
        }


        public function contadorPost(){
            $consulta="SELECT MAX(id) FROM post";
            $resultado=$this->conexion->prepare($consulta);
            $resultado->execute();
            foreach($resultado as $result){
                $numero=$result['MAX(id)'];
                
            }
            return $numero;
        }

    


        public function getIdProducto($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $id=$result['id'];
                
            }
            return $id;
        }

        public function getIdProductoValidar($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            $verdad=false;
            foreach($resultado as $result){
                $id=$result['id'];
                $verdad=true;
            }
            return $verdad;
        }





        public function getTituloProducto($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $titulo=$result['titulo'];
                
            }
            return $titulo;
        }
        public function getImagenProducto($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $imagen=$result['imagen'];
                
            }
            return $imagen;
        }
        public function getContenidoProducto($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $contenido=$result['contenido'];
                
            }
            return $contenido;
        }
        public function getprecioProducto($id,$genero){
            $consulta="SELECT * FROM productos WHERE id=? and genero=?"  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $id);
            $resultado->bindParam(2, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $contenido=$result['precio'];
                
            }
            return $contenido;
        }


       

        public function contadorProductos($genero){
            $consulta="SELECT MAX(id) FROM productos WHERE  genero=?";
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $genero);
            $resultado->execute();
            foreach($resultado as $result){
                $numero=$result['MAX(id)'];
                
            }
            return $numero;
        }


        public function checkPassword($user, $password)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $user);
            $resultado->execute();
            foreach($resultado as $result){
                $checkPass = crypt($password, $result['contraseñaEncriptada']);
                if($checkPass === $result['contraseñaEncriptada']){
                    return true;
                } else{
                    return false;
                }
            }
        }

      
        public function insertarCarrito($idProducto,$idUsuario,$tituloProducto,$fechaCompra,$estadoPedido,$precio,$cantidad){
  
    
    
            $consulta = " INSERT INTO carrito (idProducto, idUsuario, tituloProducto,fechaCompra,estadoPedido,precio,cantidad) VALUES (:idProducto, :idUsuario, :tituloProducto,:fechaCompra,:estadoPedido,:precio,:cantidad)";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(':idProducto', $idProducto);
                $result->bindParam(':idUsuario', $idUsuario);
                $result->bindParam(':tituloProducto', $tituloProducto);
                $result->bindParam(':fechaCompra', $fechaCompra);
                $result->bindParam(':estadoPedido', $estadoPedido);
                $result->bindParam(':precio', $precio);
                $result->bindParam(':cantidad', $cantidad);
      
                $result->execute();
              
                return $result; 
        } 





        public function insertarProducto($genero,$titulo,$imagen,$contenido,$precio){
  
    
    
            $consulta = " INSERT INTO productos (genero, titulo,imagen,contenido,precio) VALUES (:genero, :titulo, :imagen,:contenido,:precio)";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(':genero', $genero);
                $result->bindParam(':titulo', $titulo);
                $result->bindParam(':imagen', $imagen);
                $result->bindParam(':contenido', $contenido);
                $result->bindParam(':precio', $precio);
                $result->execute();
              
                return $result; 
        } 


        public function eliminarProducto($genero,$titulo){
  
    
    
            $consulta = " DELETE FROM productos  where genero=? and titulo=?";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(1, $genero);
                $result->bindParam(2, $titulo);
      
                $result->execute();
              
                return $result; 
        } 


        public function editarPrecioProducto( $precio,$genero,$titulo)
        {
           
          $consulta="UPDATE `productos` SET `precio` = ? WHERE  genero=? and titulo=?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $precio);
        
            $resultado->bindParam(2, $genero);
            $resultado->bindParam(3, $titulo);
           
            $resultado->execute();
        }


        public function subirNivelAdmin( $nivel,$nombre)
        {
           
          $consulta="UPDATE `usuarios` SET `nivel` = ? WHERE  nombre=?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $nivel);
        
            $resultado->bindParam(2, $nombre);
            
           
            $resultado->execute();
        }



        public function BorrarElementoCarrito($tituloProducto,$estado,$idUsu){
            
    
    
            $consulta = " DELETE FROM carrito  where  tituloProducto=? and estadoPedido=? and idUsuario=?";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(1,$tituloProducto);
                $result->bindParam(2,$estado);
                $result->bindParam(3,$idUsu);
                $result->execute();
              
                return $result; 
        } 








        public function getTituloProductoCarrito($idUsu,$pendiente){
            $consulta="SELECT tituloProducto FROM carrito WHERE idUsuario=? and estadoPedido=? "  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idUsu);
            $resultado->bindParam(2, $pendiente);
            $resultado->execute();
            $array=$resultado->fetchAll();
          
            return $array;
        }

        public function getPrecioProductoCarrito($idUsu,$pendiente){
            $consulta="SELECT precio FROM carrito WHERE idUsuario=? and estadoPedido=? "  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idUsu);
            $resultado->bindParam(2, $pendiente);
            $resultado->execute();
            $array=$resultado->fetchAll();
          
            return $array;
        }


        public function getCantidadProductoCarrito($idUsu,$pendiente){
            $consulta="SELECT cantidad FROM carrito WHERE idUsuario=? and estadoPedido=? "  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idUsu);
            $resultado->bindParam(2, $pendiente);
            $resultado->execute();
            $array=$resultado->fetchAll();
          
            return $array;
        }



        public function getCarrito($idUsu,$pendiente){
            $consulta="SELECT * FROM carrito WHERE idUsuario=? and estadoPedido=? "  ;
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idUsu);
            $resultado->bindParam(2, $pendiente);
            $resultado->execute();
            $array=$resultado->fetchAll();
          
            return $array;
        }



        public function actualizaCarrito( $precio,$cantidad,$estadoCambiado,$estado,$idUsu)
        {
           
          $consulta="UPDATE `carrito` SET `precio` = ?, `cantidad` = ?,`estadoPedido`=? WHERE  estadoPedido=? and idUsuario=?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $precio);
        
            $resultado->bindParam(2, $cantidad);
            $resultado->bindParam(3, $estadoCambiado);
           
            $resultado->bindParam(4, $estado);
            $resultado->bindParam(5, $idUsu);
            $resultado->execute();
        }
        public function darseAlta($baja,$idusu)
        {
           
          $consulta="UPDATE `usuarios` SET `baja` = ? WHERE  nombre=?";
          $resultado = $this->conexion->prepare($consulta);
        
          $resultado->bindParam(1, $baja);
            $resultado->bindParam(2, $idusu);
          
            $resultado->execute();
        }

        public function getContrasenya($correo){
            $contrasenya="";
            $consulta="SELECT * FROM usuarios WHERE  correo=?";
            $resultado=$this->conexion->prepare($consulta);
            $resultado->bindParam(1, $correo);
            $resultado->execute();
            foreach($resultado as $result){
                
                if($result != ""){
                  return  $contrasenya=$result['contraseñaEncriptada'];
                } else{
                    return false;
                }
            }
            // return $contrasenya;
        }


        public function actualizaContrasenya($emailRecuperar, $contrasenyaNueva)
        {
           
          $consulta="UPDATE `usuarios` SET `contraseñaEncriptada` = ? WHERE correo = ?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $contrasenyaNueva);
        
            $resultado->bindParam(2, $emailRecuperar);
            $resultado->execute();
        }
    
}





?>