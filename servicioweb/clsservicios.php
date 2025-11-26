<?php
// NOMBRE DE LA CLASE 
class clsServicios
{
    // VISTA vwCartaPedidos
    public function vwCartaPedidos()
    {
        // Variable para recepción de estatus+datos
        $datos = array();

        // Se estructura el comando SQL para ejecutar 
        $cmdSql = "select * from vwCartaPedidos order by clave;";

        $i = 0; // <------ variable para controlar los registros del arreglo

        if($conn = mysqli_connect("127.0.0.1", "root", "root", "BD_CONTACTOS", 3306) ){
        //if ($conn = mysqli_connect("dbproweb.c0fwxjrgyi8c.us-east-1.rds.amazonaws.com", "admin", "ProgWeb_25.", "BD_PROSOFT", 3306)) {
            // Ejecución del comando SQL y recibir resultados (recordset)
            $renglon = mysqli_query($conn, $cmdSql);

            // Ciclo para lectura de registros

            while ($resultado = mysqli_fetch_assoc($renglon)) {
                // Vaciado de datos en el arreglo de salida                
                $datos[$i]["clave"] = $resultado["clave"];
                $datos[$i]["nombre"] = $resultado["nombre"];
                $datos[$i]["descripcion"] = $resultado["descripcion"];
                $datos[$i]["existencias"] = $resultado["existencias"];
                $datos[$i]["precio"] = $resultado["precio"];
                $datos[$i]["foto"] = $resultado["foto"];
                $i++;
            }
            // Cerrar conexión
            mysqli_close($conn);
        } else {
            die("Error de conexión: " . mysqli_connect_error());
        }
        // Retornar el arreglo formateado y con los datos de resultado
        return $datos;
    }



// En la clase de tu servicio web (servicioweb.php)
public function vwDestacado()
{
    $datos = array();
    $cmdSql = "select * from destacado;"; // Llama a la nueva vista
    $i=0;
    // ... (código de conexión a BD_CONTACTOS) ...
    if($conn = mysqli_connect("127.0.0.1", "root", "root", "BD_CONTACTOS", 3306) ){
    $renglon = mysqli_query($conn, $cmdSql);

    while ($resultado = mysqli_fetch_assoc($renglon)) {
        // Vaciado de datos con los alias de la vista
        $datos[$i]["clave"] = $resultado["clave"];
        $datos[$i]["nombre"] = $resultado["nombre"];
        $datos[$i]["descripcion"] = $resultado["descripcion"];
        $datos[$i]["precio"] = $resultado["precio"];
        $datos[$i]["foto"] = $resultado["foto"];
        $i++;
    }
    mysqli_close($conn);
}
    return $datos;
}


    public function spMostrarProductos(int $cveProducto)
{
    $datos = array();
    $cmdSql = "CALL spMostrarProductos($cveProducto);";
    $i = 0;
    if ($conn = mysqli_connect("127.0.0.1", "root", "root", "BD_CONTACTOS", 3306)) {
        $renglon = mysqli_query($conn, $cmdSql);
        if ($renglon) {
            while ($resultado = mysqli_fetch_assoc($renglon)) {
                $datos[$i]["clave"] = $resultado["CLAVE"];       
                $datos[$i]["cve_usu"] = $resultado["CVE_USU"];
                $datos[$i]["producto"] = $resultado["PRODUCTO"];  
                $datos[$i]["costo"] = $resultado["COSTO"];       
                $datos[$i]["foto_pro"] = $resultado["FOTO_PRO"];
                $datos[$i]["descripcion"] = $resultado["DESCRIPCION"];
                $datos[$i]["usuario"] = $resultado["USUARIO"]; 
                $datos[$i]["alias"] = $resultado["ALIAS"];       
                $datos[$i]["telefono"] = $resultado["TELEFONO"];
                $datos[$i]["foto_usu"] = $resultado["FOTO"];      
                $i++;
            }
        }
        mysqli_close($conn);
    } else {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    return $datos;
}

}