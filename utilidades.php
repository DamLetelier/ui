<?php


class utilidades
{
    private $m;

    private function conexion(){
        $this->m = new MySQLi("localhost","root","","sbsystem");
        if($this->m->connect_errno){
            die("Error de Conexion:" . $this->m->connect_error);
        }
    }
    private function desconexion(){
        $this->m->close();
    }

    public function validar($log, $pas)
    {
        $this->conexion();
        $sql = "select * from usuarios where rut='$log' and PASSWORD='$pas'";
        $ejecutar = $this->m->query($sql);
        if ($rs = $ejecutar->fetch_array(MYSQLI_BOTH)) {
            // necesario crear las sesiones
            session_start();
            $_SESSION['LOGIN'] = $log;
            $_SESSION['logged'] = true;
            // redireccionar la pagina hacia personas.php (Response.Redirect())
            $this->desconexion();

            if ($rs[3] == "admin") {
                header("location:adminindex.php");
            } else if ($rs[3] == "Apoderado") {
                header("location:apo.php");
            } else if ($rs[3] == "Asistente") {
                header("location:asis.php");
            } else if ($rs[3] == "Chofer") {
                header("location:chof.php");
            } else {
                ?>
                <h3>
                    <center> <?php echo "Error al Iniciar sesion, intente nuevamente"; ?>
                </h3></center>
                <?php
            }
            $this->desconexion();
        } else {
            ?>
            <h3>
                <center> <?php echo "Error al Iniciar sesion, intente nuevamente"; ?>
            </h3></center>
            <?php
        }
    }

    public function consultarasistente($rut){
        $this->conexion();
        $sql = "select rut,nombre,apellido,direccion,PASSWORD,telefono,info,causal from asistente where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        $rs = $ejecutar->fetch_array(MYSQLI_BOTH);
        $this->desconexion();
        return $rs;
    }

    public function consultarchoferes($rut){
        $this->conexion();
        $sql = "select rut,nombre,apellido,direccion,PASSWORD,telefono,info,causal from choferes where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        $rs = $ejecutar->fetch_array(MYSQLI_BOTH);
        $this->desconexion();
        return $rs;
    }

    public function modificarchoferes($rut, $nom, $ape,$dir,$pass,$fon,$info,$pat,$cau){
        $this->conexion();
        $sql = "update choferes set nombre='$nom',apellido='$ape',direccion='$dir',PASSWORD='$pass',telefono='$fon',info='$info',pat_chof='$pat',causal='$cau' where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE MODIFICO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO MODIFICAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }
    public function modificarasistente($rut, $nom, $ape,$dir,$pass,$fon,$info,$pat,$cau){
        $this->conexion();
        $sql = "update asistente set nombre='$nom',apellido='$ape',direccion='$dir',PASSWORD='$pass',telefono='$fon',info='$info',pat_asis='$pat',causal='$cau' where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE MODIFICO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO MODIFICAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }
    public function consultarapoderados($rut){
        $this->conexion();
        $sql = "select rut,nombre,apellido,direccion,PASSWORD,telefono,pago,causal from apoderados where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        $rs = $ejecutar->fetch_array(MYSQLI_BOTH);
        $this->desconexion();
        return $rs;
    }
    public function consultaralumno($rut){
        $this->conexion();
        $sql = "select rut,nombre,apellido,fecha,direccion,rut_apo,colegio,coordenadas,causal from alumnos where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        $rs = $ejecutar->fetch_array(MYSQLI_BOTH);
        $this->desconexion();
        return $rs;
    }

    public function modicarapoderado($rut, $nom, $ape, $dir, $pass, $fon, $pag,$cau){
        $this->conexion();
        $sql = "update apoderados set nombre='$nom',apellido='$ape',direccion='$dir',PASSWORD='$pass',telefono='$fon',pago='$pag',causal='$cau' where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE MODIFICO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO MODIFICAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }

    public function modificaralumno($rut, $nom, $ape,$fecha, $dir,$apo,$col,$cor,$cau){
        $this->conexion();
        $sql = "update alumnos set nombre='$nom',apellido='$ape',fecha='$fecha',direccion='$dir',rut_apo='$apo',colegio='$col',coordenadas='$cor',causal='$cau' where rut='$rut'";
        $ejecutar = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE MODIFICO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO MODIFICAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }

    public function regasis($rut, $nom, $ape,$dir,$pass,$fon,$info,$pat,$nombre_img){
        $this->conexion();
        $sql = "insert into asistente values('$rut','$nom','$ape','$dir','$pass','$fon','$info','$pat','$nombre_img','SIN CAUSAL','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();



    }
    public function regusuasis($rut,$pass){
        $this->conexion();
        $sql = "insert into usuarios values(NULL ,'$rut','$pass','Asistente','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){


        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();



    }
    public function regusuchof($rut,$pass){
        $this->conexion();
        $sql = "insert into usuarios values(NULL ,'$rut','$pass','Chofer','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){


        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();



    }
    public function regusuapo($rut,$pass){
        $this->conexion();
        $sql = "insert into usuarios values(NULL ,'$rut','$pass','Apoderado','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){


        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();



    }

    public function registrarpatente($num,$nombre_imagen){
        $this->conexion();
        $sql = "insert into patentes values('$num','$nombre_imagen')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();



    }


    public function registrochofer($rut, $nom, $ape,$dir,$pass,$fon,$info,$pat,$nombre_img){
        $this->conexion();
        $sql = "insert into choferes values('$rut','$nom','$ape','$dir','$pass','$fon','$info','$pat','$nombre_img','SIN CAUSAL','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();


    }
    public function registrarcolegio($nom,$dir,$cor){
        $this->conexion();
        $sql = "insert into colegio (nom_col,des_col,coordenadas) values ('$nom','$dir','$cor') ";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }


    public function registrarapoderado($rut, $nom, $ape,$dir,$pass,$fon,$pag){
        $this->conexion();
        $sql = "insert into apoderados values ('$rut','$nom','$ape','$dir','$pass','$fon','$pag','0','Sin Causal','ACTIVO')";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }


    public function registrarabono($rut,$abono){
            $this->conexion();
            $sql = "update apoderados set abono='$abono' where rut='$rut'";
            $ejecutar = $this->m->query($sql);
            if($this->m->affected_rows > 0){
            }
            $this->desconexion();
            }
    public function registrarabono2($rut,$abono){
        $this->conexion();
        $sql = "insert into abono values (NULL,'$rut','$abono') ";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";

        }
        $this->desconexion();
    }
    public function sumaabonos($rut){
        $this->conexion();
        $sql ="SELECT sum(monto_abono)from abono where rut_apo='$rut'";
        $ejecutar = $this->m->query($sql);
        while($rs = $ejecutar->fetch_array(MYSQLI_BOTH)){
            return $rs;
         
        }
        $this->desconexion();
    }



    public function registraralumno($rut,$nom,$ape,$fech,$dir,$aporut,$col,$coor){
        $this->conexion();
        $sql = "insert into alumnos values ('$rut','$nom','$ape','$fech','$dir','$aporut',$col,'$coor','Sin Causal','ACTIVO') ";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";

        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE  </div>";

        }
        $this->desconexion();
        
    }



    public function listarapoderado(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,pago from apoderados";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";

            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listaralumno(){
        $this->conexion();
        $sql = "select alumnos.rut, alumnos.nombre, alumnos.apellido,alumnos.fecha, alumnos.direccion,alumnos.rut_apo,colegio.nom_col from alumnos,colegio where alumnos.colegio=colegio.id";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\" >";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";

            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listaralumno2(){
        $this->conexion();
        $sql = "select alumnos.rut, alumnos.nombre, alumnos.apellido,alumnos.fecha, alumnos.direccion,alumnos.rut_apo,colegio.nom_col from alumnos,colegio where alumnos.colegio=colegio.id";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='alueli.php?ruteli=$rs[0]'>".$rs[7]."</a></td>";

            echo "</tr>";
        }
        $this->desconexion();
    }
    public function consulatarapoderado($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,pago,estado from apoderados where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            //echo "<td><a href='personas.php?ruteli=$rs[0]'>AQUI</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function consulatarapoderadoabono($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido,telefono,pago,abono,estado from apoderados where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function consulatarapoderadomoroso($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido,telefono,pago,abono,estado,(pago-abono) from apoderados where rut=$rut and estado='ACTIVO' and pago>abono ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid darkred\">";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid darkred\">" . $rs[7] . "</td>";

            echo "</tr>";
        }
        $this->desconexion();
    }


    
    
    public function consultarapoderado2($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,pago,estado from apoderados where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='apoeli.php?ruteli=$rs[0]'>. $rs[7] .</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }


    public function listarapoderado2(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,pago,estado from apoderados";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='apoeli.php?ruteli=$rs[0]'>".$rs[7]."</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listarapoderadoabono(){
        $this->conexion();
        $sql = "select rut, nombre, apellido,telefono,pago,abono,estado from apoderados WHERE estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";


            echo "</tr>";
        }
        $this->desconexion();
    }
    public function listarapoderadomorosos(){
        $this->conexion();
        $sql = "select rut, nombre, apellido,telefono,pago,abono,estado,(pago-abono) from apoderados where estado='ACTIVO' and pago>abono ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr >";
            echo "<td >" . $rs[0] . "</td>";
            echo "<td >" . $rs[1] . "</td>";
            echo "<td >" . $rs[2] . "</td>";
            echo "<td >" . $rs[3] . "</td>";
            echo "<td>" . $rs[4] . "</td>";
            echo "<td>" . $rs[5] . "</td>";
            echo "<td >" . $rs[7] . "</td>";
//style="border: 2px solid darkred"

            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listarasistente(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,imagen_nombre from asistente where estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\"><a href='/pagina2/img/$rs[7]' target='_blank'>Ver Archivo</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }
    
    public function listarasistente2(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,estado from asistente";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='asiseli.php?ruteli=$rs[0]'>".$rs[7]."</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listarchoferes2(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,estado from choferes";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='chofeli.php?ruteli=$rs[0]'>".$rs[7]."</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }
    public function consultarchofer($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,estado from choferes where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            //echo "<td><a href='personas.php?ruteli=$rs[0]'>AQUI</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function consultaralumnos1($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido,fecha, direccion,rut_apo,colegio from alumnos where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            //echo "<td><a href='personas.php?ruteli=$rs[0]'>AQUI</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }
    public function consultaralumnos2($rut){
        $this->conexion();
        $sql = "select alumnos.rut, alumnos.nombre, alumnos.apellido,alumnos.fecha, alumnos.direccion,alumnos.rut_apo,colegio.nom_col from alumnos,colegio where alumnos.colegio=colegio.id and alumnos.rut='$rut' and alumnos.estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[4] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='alueli.php?ruteli=$rs[0]'>".$rs[7]."</a></td>";
            echo "</tr>";
        }
$this->desconexion();
}

public function listarchoferes(){
    $this->conexion();
    $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info from choferes where estado='ACTIVO' ";
    $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";

            echo "</tr>";
        }
        $this->desconexion();
    }

    public function consultarasis($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,imagen_nombre from asistente where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\"><a href='/pagina2/img/$rs[7]' target='_blank'>Ver Archivo</a></td>";
            //echo "<td><a href='personas.php?ruteli=$rs[0]'>AQUI</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }
    public function consultarasistente2($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,estado from asistente where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='asiseli.php?ruteli=$rs[0]'>. $rs[7] .</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }
    public function consultarchofer2($rut){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion,PASSWORD, telefono,info,estado from choferes where rut='$rut' and estado='ACTIVO' ";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[5] . "</td>";
            //echo "<td>" . $rs[5] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[6] . "</td>";
            echo "<td><a href='chofeli.php?ruteli=$rs[0]'>. $rs[7] .</a></td>";
            echo "</tr>";
        }
        $this->desconexion();
    }



    public function estadoasides($rut){
        $this->conexion();
        $sql = "update asistente set estado='DESVINCULADO' where rut='$rut'";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "Se cambio de estado satisfactoriamente";
        }else{

            echo "No se pudo cambiar de estado, intente nuevamente";
        }
        $this->desconexion();
    }


    public function estadochofer($rut){
        $this->conexion();
        $sql = "update choferes set estado='DESVINCULADO' where rut='$rut'";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "Se cambio de estado satisfactoriamente";
        }else{

            echo "No se pudo cambiar de estado, intente nuevamente";
        }
        $this->desconexion();
    }
    
    
    public function estadoapoderado($rut){
        $this->conexion();
        $sql = "update apoderados set estado='DESVINCULADO' where rut='$rut'";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "Se cambio de estado satisfactoriamente";
        }else{

            echo "No se pudo cambiar de estado, intente nuevamente";
        }
        $this->desconexion();
    }
    public function estadoalumno($rut){
        $this->conexion();
        $sql = "update alumnos set estado='DESVINCULADO' where rut='$rut'";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "Se cambio de estado satisfactoriamente";
        }else{

            echo "No se pudo cambiar de estado, intente nuevamente";
        }
        $this->desconexion();
    }

    public function llenarcombocolegio($com){
        $this->conexion();
        $sql = "select * from colegio";
        $ejecutar = $this->m->query($sql);
        while($rs = $ejecutar->fetch_array(MYSQLI_BOTH)){
            if($rs[0] == $com)echo "<option value='".$rs[0]."' selected>".$rs[1]."</option>";
            else echo "<option value='".$rs[0]."'>".$rs[1]."</option>";
        }
        $this->desconexion();
    }
    public function llenarcombopatente($pat){
        $this->conexion();
        $sql = "select * from patentes";
        $ejecutar = $this->m->query($sql);
        while($rs = $ejecutar->fetch_array(MYSQLI_BOTH)){
            if($rs[0] == $pat)echo "<option value='".$rs[0]."' selected>".$rs[0]."</option>";
            else echo "<option value='".$rs[0]."'>".$rs[0]."</option>";
        }
        $this->desconexion();
    }

    public function llenarcomborut($apo){
        $this->conexion();
        $sql = "select * from apoderados";
        $ejecutar = $this->m->query($sql);
        while($rs = $ejecutar->fetch_array(MYSQLI_BOTH)){
            if($rs[0] == $apo)echo "<option value='".$rs[0]."' selected>".$rs[0]."</option>";
            else echo "<option value='".$rs[0]."'>".$rs[0]."</option>";
        }
        $this->desconexion();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////


    public function regaler($alert, $obs){
        $this->conexion();
        $sql = "insert into alerta VALUES (NULL, $alert, '$obs', DATE_FORMAT(NOW(),'%d-%m-%Y %h:%i %p'))";
        $sentencia = $this->m->query($sql);
        if($this->m->affected_rows > 0){
            echo "<div class='card-panel default_color'>SE REGISTRO SATISFACTORIAMENTE </div>";
        }else{
            echo "<div class='card-panel red darken-1'>NO SE PUDO REGISTRAR, INTENTE NUEVAMENTE </div>";
        }
        $this->desconexion();
    }


    public function llenarcomboalerta($alert){
        $this->conexion();
        $sql = "select * from tipoalerta";
        $ejecutar = $this->m->query($sql);
        while($rs = $ejecutar->fetch_array(MYSQLI_BOTH)){
            if($rs[0] == $alert)echo "<option value='".$rs[0]."' selected>".$rs[1]."</option>";
            else echo "<option value='".$rs[0]."'>".$rs[1]."</option>";
        }
        $this->desconexion();
    }

    /////////////////////////////////////////////////////////////////////////////////////// LISTAR ALERTAS

    public function listaralertas(){
        $this->conexion();
        $sql = "SELECT tipoalerta.nombre, alerta.obs, fecha from tipoalerta, alerta where tipoalerta.id_tipoalerta = alerta.id_tipoalerta order by fecha desc limit 10";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function consultaralertas($alert){
        $this->conexion();
        $sql = "SELECT tipoalerta.nombre, alerta.obs, fecha from alerta, tipoalerta WHERE alerta.id_tipoalerta=tipoalerta.id_tipoalerta and tipoalerta.id_tipoalerta='$alert' order by fecha desc";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[0] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "</tr>";
        }
        $this->desconexion();
    }

    public function listaralumno3(){
        $this->conexion();
        $sql = "select rut, nombre, apellido, direccion from alumnos where estado='ACTIVO' limit 12";
        $sentencia = $this->m->query($sql);
        while($rs = $sentencia->fetch_array(MYSQLI_BOTH)){
            echo "<tr style=\"border: 2px solid royalblue\">";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[1] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[2] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\">" . $rs[3] . "</td>";
            echo "<td style=\"border: 2px solid royalblue\"><input type='checkbox' class='filled-in' id='. $rs[0] .' name='. $rs[0] .'><label for='. $rs[0] .'></td>";
        }
        $this->desconexion();
        return $sentencia;
    }

    public function escribirasistencia($recorrido, $datos, $POST) {
        $this->conexion();
        echo "hola";
        while($rs = $datos->fetch_array(MYSQLI_BOTH)){
            echo "hola1";
            $asistente = $POST[rs[0]];
            echo "hola1";
            $press = "Ausente";
                if ($asistente) {
                    $press = "Presente";
                }
            echo "hola2";
            $sql = "insert into asistencia VALUES (NULL, '. $rs[0] .', '.$press.', '.$recorrido.', DATE_FORMAT(NOW(),'%d-%m-%Y %h:%i %p'))";
            echo "hola3";
            $this->m->query($sql);
        }
        $this->desconexion();
    }

}
