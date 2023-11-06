
<?php
// INICIA LA SESION
session_start();
 
// VERIFICA QUE LA SESION ESTE INICIADA, DE LO CONTRARIO LO REENVIA A LA PAGINA DEL LOGIN
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: form.php");
    exit;
}
?>


<!DOCTYPE html>

<select name="" id="" hidden>
<?php
$pro = $_POST['pro'];
?>
</select>

<select name="" id="" hidden>
<?php
$suc = $_POST['suc'];
?>
</select>
<?php
    if (isset($_POST['inicial'])) {

      //TODAS SON VARIABLES QUE ESTAN ENLAZADAS POR MEDIO DEL POST CON SU RESPECTIVO INPUT O SELECT-OPTION
      //INSERTAR DATOS EN BASE DE DATOS 

      include("abrir.php");
      require('../fpdf/fpdf.php');
      date_default_timezone_set("America/Costa_Rica");
      $Fecha = date('Y-m-d H:i');
      $esfd = $_POST['esf_d'];
      $cild = $_POST['cil_d'];
      $ejed = $_POST['eje_d'];
      $addd = $_POST['add_d'];
      $avlejosd = $_POST['av_lejos_d'];
      $avcercad = $_POST['av_cerca_d'];
      $esfi = $_POST['esf_i'];
      $cili = $_POST['cil_i'];
      $ejei = $_POST['eje_i'];
      $addi = $_POST['add_i'];
      $avlejosi = $_POST['av_lejos_i'];
      $avcercai = $_POST['av_cerca_i'];
      $tipo = $_POST['tipo'];


      
      $esfd_ob = $_POST['esf_d_ob'];
      $cild_ob = $_POST['cil_d_ob'];
      $ejed_ob = $_POST['eje_d_ob'];
      $addd_ob = $_POST['add_d_ob'];
      $avlejosd_ob = $_POST['av_lejos_d_ob'];
      $avcercad_ob = $_POST['av_cerca_d_ob'];
      $esfi_ob = $_POST['esf_i_ob'];
      $cili_ob = $_POST['cil_i_ob'];
      $ejei_ob = $_POST['eje_i_ob'];
      $addi_ob = $_POST['add_i_ob'];
      $avlejosi_ob = $_POST['av_lejos_i_ob'];
      $avcercai_ob = $_POST['av_cerca_i_ob'];
      $tipo_ob = $_POST['tipo_ob'];


      $esfd_sub = $_POST['esf_d_sub'];
      $cild_sub = $_POST['cil_d_sub'];
      $ejed_sub = $_POST['eje_d_sub'];
      $addd_sub = $_POST['add_d_sub'];
      $avlejosd_sub = $_POST['av_lejos_d_sub'];
      $avcercad_sub = $_POST['av_cerca_d_sub'];
      $esfi_sub = $_POST['esf_i_sub'];
      $cili_sub = $_POST['cil_i_sub'];
      $ejei_sub = $_POST['eje_i_sub'];
      $addi_sub = $_POST['add_i_sub'];
      $avlejosi_sub = $_POST['av_lejos_i_sub'];
      $avcercai_sub = $_POST['av_cerca_i_sub'];
      $tipo_sub = $_POST['tipo_sub'];

      $esfd_f = $_POST['esf_d_f'];
      $cild_f = $_POST['cil_d_f'];
      $ejed_f = $_POST['eje_d_f'];
      $addd_f = $_POST['add_d_f'];
      $avccd = $_POST['av_cc_d'];
      $avcci = $_POST['av_cc_i'];
      $esfi_f = $_POST['esf_i_f'];
      $cili_f = $_POST['cil_i_f'];
      $ejei_f = $_POST['eje_i_f'];
      $addi_f = $_POST['add_i_f'];
      $dnpi = $_POST['dnp_i'];
      $dnpd = $_POST['dnp_d'];
      $alturai = $_POST['altura_i'];
      $alturad = $_POST['altura_d'];
      $tipo_f = $_POST['tipo_f'];
  
      $cover_test = $_POST['cover_test'];
      $observaciones_clinicas = $_POST['observaciones_clinicas'];
      $dist_vert = $_POST['dist_vert'];
      $ang_pant = $_POST['ang_pant'];
      $ang_facial = $_POST['ang_facial'];
      $radio = $_POST['radio'];
      $diagnostico = $_POST['diagnostico'];



      $nombre = $_POST['nombre'];
      $edad = $_POST['edad'];
      $numero = $_POST['numero'];
      $email = $_POST['email'];
      $ocupacion = $_POST['ocupacion'];
      $cedula = $_POST['cedpaciente2'];
      $direccion = $_POST['direccion'];
      $fecha_nacimiento = $_POST['fecha_nacimiento'];
      $salud_general = $_POST['salud_general'];
      $alergias = $_POST['alergias'];
      $toma_medicamentos = $_POST['toma_medicamentos'];
      $cirugias_oculares = $_POST['cirugias_oculares'];
      $tratamiento = $_POST['tratamiento_oftalmologico'];
      $observaciones = $_POST['observaciones'];
      $motivo_consulta = $_POST['motivo_consulta'];
      $ultimo_examen = $_POST['ultimo_examen'];
      $sintomas_astenopticos = $_POST['sintomas_astenopticos'];
      $sucursal = $_POST['sucursal'];
      $cornea_i = $_POST['cornea_i'];
      $cornea_d = $_POST['cornea_d'];
      $cristalino_i = $_POST['cristalino_i'];
      $cristalino_d = $_POST['cristalino_d'];
      $fo_i = $_POST['fo_i'];
      $fo_d = $_POST['fo_d'];

      $aro = $_POST['aro'];
      $lentes = $_POST['lentes'];
      $ar_ultra = $_POST['ar_ultra'];

      $pro = $_POST['pro'];
    
      //CONSULTAS DE INSERCCIONQ QUE SE GENERAN UNA VEZ CUMPLIDA LA CONDICION 

      $paciente = $conexion->query("INSERT INTO paciente (nombre,edad,numero,email,ocupacion,cedula,direccion,fecha_nacimiento,sucursal,fecha_tratamiento,profesional) VALUES ('$nombre', '$edad', '$numero', '$email','$ocupacion','$cedula','$direccion','$fecha_nacimiento','$sucursal','$Fecha','$pro')");     
    if ($paciente == true) {
      $antecedentes = $conexion->query("INSERT INTO antecedentes (codigo_trata_antecedentes,salud_general,alergias,toma_medicamentos,cirugias_oculares,tratamiento_oftalmologico,observaciones,motivo_consulta,ultimo_examen,sintomas_astenopticos) VALUES (LAST_INSERT_ID(),'$salud_general','$alergias','$toma_medicamentos','$cirugias_oculares','$tratamiento','$observaciones','$motivo_consulta','$ultimo_examen','$sintomas_astenopticos')");     
    }
    if ($antecedentes == true) {
      $examen = $conexion->query("INSERT INTO examen_externo (codigo_trata_examen,cornea_i,cornea_d,cristalino_i,cristalino_d,fo_i,fo_d) VALUES (LAST_INSERT_ID(),'$cornea_i','$cornea_d','$cristalino_i','$cristalino_d','$fo_i','$fo_d')");     
    }
      if ($examen == true) {
        $lensometria_inicial = $conexion->query("INSERT INTO lensometria_inicial (codigo_trata,esf_d,cil_d,eje_d,add_d,av_lejos_d,av_cerca_d,esf_i,cil_i,eje_i,add_i,av_lejos_i,av_cerca_i,tipo) values (LAST_INSERT_ID(),'$esfd','$cild','$ejed','$addd','$avlejosd','$avcercad','$esfi','$cili','$ejei','$addi','$avlejosi','$avcercai','$tipo')"); 
    }
    if ($lensometria_inicial = true) {
        $lensometria_objetiva = $conexion->query("INSERT INTO lensometria_objetiva (codigo_trata_ob,esf_d_ob,cil_d_ob,eje_d_ob,add_d_ob,av_lejos_d_ob,av_cerca_d_ob,esf_i_ob,cil_i_ob,eje_i_ob,add_i_ob,av_lejos_i_ob,av_cerca_i_ob,tipo_ob) values (LAST_INSERT_ID(),'$esfd_ob','$cild_ob','$ejed_ob','$addd_ob','$avlejosd_ob','$avcercad_ob','$esfi_ob','$cili_ob','$ejei_ob','$addi_ob','$avlejosi_ob','$avcercai_ob','$tipo_ob') "); 
    }
      if ($lensometria_objetiva = true) {
        $lensometria_subjetiva = $conexion->query("INSERT INTO lensometria_subjetiva (codigo_trata_sub,esf_d_sub,cil_d_sub,eje_d_sub,add_d_sub,av_lejos_d_sub,av_cerca_d_sub,esf_i_sub,cil_i_sub,eje_i_sub,add_i_sub,av_lejos_i_sub,av_cerca_i_sub,tipo_sub) values (LAST_INSERT_ID(),'$esfd_sub','$cild_sub','$ejed_sub','$addd_sub','$avlejosd_sub','$avcercad_sub','$esfi_sub','$cili_sub','$ejei_sub','$addi_sub','$avlejosi_sub','$avcercai_sub','$tipo_sub') "); 
    }
       if ($lensometria_subjetiva = true) {
        $lensometria_receta_final = $conexion->query("INSERT INTO lensometria_receta_final (codigo_trata_f,esf_d_f,cil_d_f,eje_d_f,add_d_f,av_cc_d,dnp_d,altura_d,esf_i_f,cil_i_f,eje_i_f,add_i_f,av_cc_i,dnp_i,altura_i,tipo_f,diagnostico,aro,lentes,ar_ultra) values (LAST_INSERT_ID(),'$esfd_f','$cild_f','$ejed_f','$addd_f','$avccd','$dnpd','$alturad','$esfi_f','$cili_f','$ejei_f','$addi_f','$avcci','$dnpi','$alturai','$tipo_f','$diagnostico','$aro','$lentes','$ar_ultra') "); 
    }
    if ($lensometria_receta_final = true) {
        $lensometria = $conexion->query("INSERT INTO lensometria (codigo_trata_lensometria,dist_vert,ang_pant,ang_facial,cover_test,observaciones_clinicas,distancia_vista) values (LAST_INSERT_ID(),'$dist_vert','$ang_pant','$ang_facial','$cover_test','$observaciones_clinicas','$radio') "); 
    }
  
    //INICIO DE GENERACIUON DEL PDF
      ob_start();

      $pdf = new FPDF('P', 'mm', 'A4');
      $pdf->AddPage();
      
    
    //CONSULTAS PARA LLAMAR LOS REGISTROS DE LA BASE DE DATOS
      $paciente = "SELECT codigo_tratamiento,fecha_tratamiento,nombre,edad,numero,email,ocupacion,cedula,direccion,fecha_nacimiento,sucursal,profesional from paciente where nombre like '%" . $nombre . "%' and cedula = '" . $cedula . "'";
      $sql = mysqli_query($conexion, $paciente);
  
      $antecedentes = "SELECT salud_general,alergias,toma_medicamentos,cirugias_oculares,tratamiento_oftalmologico,observaciones,motivo_consulta,ultimo_examen,sintomas_astenopticos from antecedentes a inner join paciente p on p.codigo_tratamiento = a.codigo_trata_antecedentes where nombre like '%" . $nombre . "%' and cedula = '" . $cedula . "'";
      $sql3 = mysqli_query($conexion, $antecedentes);
  
      $examen = "SELECT cornea_i,cornea_d,cristalino_i,cristalino_d,fo_i,fo_d from examen_externo e inner join paciente p on p.codigo_tratamiento = e.codigo_trata_examen where nombre like '%" . $nombre . "%' and cedula = '" . $cedula . "'";
      $sql4 = mysqli_query($conexion, $examen);
  
      $receta_final = mysqli_query($conexion, "SELECT esf_d_f,cil_d_f,eje_d_f,add_d_f,av_cc_d,dnp_d,altura_d,esf_i_f,cil_i_f,eje_i_f,add_i_f,av_cc_i,dnp_i,altura_i,aro,lentes,ar_ultra from lensometria_receta_final f inner join paciente p on f.codigo_trata_f = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'");
      $filas = mysqli_num_rows($receta_final);
  
      $receta_inicial = mysqli_query($conexion, "SELECT esf_d,cil_d,eje_d,add_d,av_lejos_d,av_cerca_d,esf_i,cil_i,eje_i,add_i,av_lejos_i,av_cerca_i from lensometria_inicial i inner join paciente p on i.codigo_trata = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'");
      $filas2 = mysqli_num_rows($receta_inicial);
  
      $receta_objetiva = mysqli_query($conexion, "SELECT esf_d_ob,cil_d_ob,eje_d_ob,add_d_ob,av_lejos_d_ob,av_cerca_d_ob,esf_i_ob,cil_i_ob,eje_i_ob,add_i_ob,av_lejos_i_ob,av_cerca_i_ob from lensometria_objetiva o inner join paciente p on o.codigo_trata_ob = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'");
      $filas3 = mysqli_num_rows($receta_objetiva);
  
      $receta_subjetiva = mysqli_query($conexion, "SELECT esf_d_sub,cil_d_sub,eje_d_sub,add_d_sub,av_lejos_d_sub,av_cerca_d_sub,esf_i_sub,cil_i_sub,eje_i_sub,add_i_sub,av_lejos_i_sub,av_cerca_i_sub from lensometria_subjetiva s inner join paciente p on s.codigo_trata_sub = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'");
      $filas4 = mysqli_num_rows($receta_subjetiva);
  
      $lensometria = mysqli_query($conexion, "SELECT dist_vert,ang_pant,ang_facial,cover_test,observaciones_clinicas,distancia_vista from lensometria l inner join paciente p on l.codigo_trata_lensometria = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'");
      $filas5 = mysqli_num_rows($lensometria);
  
      $diagnostico = "SELECT diagnostico from lensometria_receta_final f inner join paciente p on p.codigo_tratamiento = f.codigo_trata_f where nombre like '%" . $nombre . "%' and cedula = '" . $cedula . "'";
      $sql2 = mysqli_query($conexion, $diagnostico);
      
      $profesional = "SELECT password,username from doctores  where username = '" . $pro . "'";
      $sql5 = mysqli_query($conexion, $profesional);

      $cod_lentes = "SELECT codigo from articulos  where descrip = '" . $aro . "'";
      $sql6 = mysqli_query($conexion, $cod_lentes);
      
      if ($row = mysqli_fetch_row($sql)) {
        if ($row3 = mysqli_fetch_row($sql3)) {
          if ($row4 = mysqli_fetch_row($sql4)) {
            if ($row5 = mysqli_fetch_row($sql5)) {
              if ($row6 = mysqli_fetch_row($sql6)) {
      $pdf->SetFont('Arial', '', '15');
      
      $pdf->SetTitle("OPTICAS MUNKEL");
      
      $pdf->SetTextColor(192, 57, 43);
      $pdf->SetTextColor('0', '0', '0');
      
      $pdf->Cell(162, 5, "", 0, 0);
      $pdf->Cell(58, 5, " " . str_replace('-', '/', date('d/m/Y', strtotime($row[1]))), 0, 1, 'L');
      $pdf->SetFont('Arial', '', '8'); 
      
      $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\munke.png', 10, 2, 35, 20, 'PNG');
      
      $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\Zeiss-Logo.png', 43, 1, 35, 20, 'PNG');
      
      
      $pdf->Ln(10);
      $pdf->Line(10, 25, 200, 25);
      
      
      
      
      $pdf->Ln(15);
      
      $pdf->Cell(5, -5, "", 0, 0);
      $pdf->Cell(11, -15, "Nombre: ", 0, 0);
      $pdf->Cell(104, -15, " " . wordwrap(utf8_decode($row[2])), 0, 0);
      $pdf->Line(27, 34, 130, 34);
      $pdf->Line(27, 34, 130, 34);
      $pdf->Cell(6, -15, "Edad: ", 0, 0);
      $pdf->Cell(58, -15, "   " . $row[3], 0, 1);
      $pdf->Line(139, 34, 200, 34);
      $pdf->Line(139, 34, 200, 34);
      
      $pdf->Ln(8);
      
      $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(8, 9, "Email: ", 0, 0);
            $pdf->Cell(107, 9, " " . wordwrap(utf8_decode($row[5])), 0, 0);
            $pdf->Line(24, 39, 130, 39);
            $pdf->Line(24, 39, 130, 39);

            $pdf->Cell(11, 9, "Numero: ", 0, 0);
            $pdf->Cell(103, 9, " " . $row[4], 0, 1);
            $pdf->Line(142, 39, 200, 39);
            $pdf->Line(142, 39, 200, 39);
            $pdf->Ln(8);


            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(14, -15, "Ocupacion: ", 0, 0);
            $pdf->Cell(101, -15, " " . wordwrap(utf8_decode($row[6])), 0, 0);
            $pdf->Line(30, 44, 130, 44);
            $pdf->Line(30, 44, 130, 44);
            $pdf->Cell(10, -15, "Cedula: ", 0, 0);
            $pdf->Cell(58, -15, " " . $row[7], 0, 1);
            $pdf->Line(141, 44, 200, 44);
            $pdf->Line(141, 44, 200, 44);
            $pdf->Ln(8);


            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(23, 9, "Fecha Nacimiento: ", 0, 0);
            $pdf->Cell(92, 9, " " . str_replace('-', '/', date('d/m/Y', strtotime($row[9]))), 0, 0);
            $pdf->Line(39, 49, 130, 49);
            $pdf->Cell(12, 9, "Sucursal: ", 0, 0);
            $pdf->Cell(66, 9, " " . wordwrap(utf8_decode(str_replace('_', ' ', strtoupper($row[10])))), 0, 1);
            $pdf->Line(200, 49, 142, 49);
            $pdf->Ln(8);


            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(12.5, -15, "Direccion: ", 0, 0);
            $pdf->Cell(85, -15, " " . wordwrap(utf8_decode($row[8])), 0, 0);
            $pdf->Line(29, 55, 200, 55);
            $pdf->Ln(-2);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(180, 5, "Antecedentes:", 0, 1, 'C');
            $pdf->SetFont('Arial', '', '8');
            $pdf->Ln(7);

            $pdf->Cell(5, -6, "", 0, 0);
            $pdf->Cell(19, -6, "Salud General: ", 0, 0);
            $pdf->Cell(96, -6, " " . wordwrap(utf8_decode($row3[0])), 0, 0);
            $pdf->Line(34, 69, 130, 69);
            $pdf->Cell(10, -6, "Alergias: ", 0, 0);
            $pdf->Cell(58, -6, "   " . wordwrap(utf8_decode($row3[1])), 0, 1);
            $pdf->Line(142, 69, 200, 69);
            $pdf->Ln(8);

            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(27, 1, "Toma Medicamentos: ", 0, 0);
            $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row3[2])), 0, 0);
            $pdf->Line(40, 74, 130, 74);
            $pdf->Cell(43, 1, "Esta en tratamiento oftalmologico: ", 0, 0);
            $pdf->Line(174, 74, 200, 74);
            $pdf->Cell(58, 1, " " . wordwrap(utf8_decode($row3[4])), 0, 1);
            $pdf->Ln(8);



            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(23, -7, "Cirugias Oculares: ", 0, 0);
            $pdf->Cell(92, -7, " " . wordwrap(utf8_decode($row3[3])), 0, 0);
            $pdf->Line(39, 79, 130, 79);
            $pdf->Cell(20, -7, "Ultimo Examen: ", 0, 0);
            $pdf->Cell(58, -7, " " . str_replace('-', '/', date('d/m/Y', strtotime($row3[7]))), 0, 1);
            $pdf->Line(151, 79, 200, 79);
            $pdf->Ln(8);

            $pdf->Cell(5, 1, "", 0, 0);
            $pdf->Cell(20, 1, "Observaciones: ", 0, 0);
            $pdf->Cell(83, 1, " " . wordwrap(utf8_decode($row3[5])), 0, 0);
            $pdf->Line(35, 84, 200, 84);
            $pdf->Cell(1, 1, "", 0, 1);
            $pdf->Ln(8);


            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(24, -7, "Motivo de consulta: ", 0, 0);
            $pdf->Cell(73, -7, " " . wordwrap(utf8_decode($row3[6])), 0, 0);
            $pdf->Line(40, 89, 200, 89);
            $pdf->Ln(10);

            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(30, -17, "Sintomas Astenopticos: ", 0, 0);
            $pdf->Cell(58, -17, " " . wordwrap(utf8_decode($row3[8])), 0, 1);
            $pdf->Line(45, 94, 200, 94);
            $pdf->Ln(15);



            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(180, 5, "Examen Externo / Medios Transparentes / Fondo de Ojo:", 0, 1, 'C');
            $pdf->SetFont('Arial', '', '8');
            $pdf->Ln(3);

            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "Cornea", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->Cell(35, -5, " " . wordwrap(utf8_decode($row4[0])), 0, 0, 'C');
            $pdf->Line(50, 111, 85, 111);
            $pdf->Cell(30, -5, " ", 0, 0);
            $pdf->Cell(37, -5, "   " . wordwrap(utf8_decode($row4[1])), 0, 1, 'C');
            $pdf->Line(115, 111, 152, 111);
            $pdf->Ln(8);

            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "Cristalino", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->Cell(35, -5, " " . wordwrap(utf8_decode($row4[2])), 0, 0, 'C');
            $pdf->Line(50, 120, 85, 120);
            $pdf->Cell(30, -5, " ", 0, 0);
            $pdf->Cell(37, -5, "   " . wordwrap(utf8_decode($row4[3])), 0, 1, 'C');
            $pdf->Line(115, 120, 152, 120);

            $pdf->Ln(8);

            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "FO", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->Cell(35, -5, " " . wordwrap(utf8_decode($row4[4])), 0, 0, 'C');
            $pdf->Line(50, 129, 85, 129);
            $pdf->Cell(30, -5, " ", 0, 0);
            $pdf->Cell(37, -5, "   " . wordwrap(utf8_decode($row4[5])), 0, 1, 'C');
            $pdf->Line(115, 129, 152, 129);
            $pdf->Ln(8);



            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(120, 5, "Refraccion Inicial", 0, 1, 'C');
            $pdf->SetTextColor('0', '0', '0');
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', '10');
            $pdf->SetTextColor(253, 254, 254);
            $pdf->Cell(13, 7, "", 0, 0, 'C', 0); //Celda que empuja la cabecera
            $pdf->SetFillColor(0, 0, 118);
            $pdf->Cell(15, 7, "Esf", 1, 0, 'C', true);
            $pdf->Cell(15, 7, "Cil", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Eje", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Add", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Lejos", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Cerca", 1, 0, 'C', true);
            $pdf->Cell(4, 7, "", 0, 0, 'C', 0); //Celda que separa la objetiva de observaciones
            $pdf->SetTextColor(0, 0, 0);


            for ($i = 0; $i < $filas2; $i++) {
              $campo2 = mysqli_fetch_assoc($receta_inicial);
              $pdf->Cell(14, 7, " ", 0, 1, 'C'); //Celda que baja la segunda fila
              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la derecha
              $pdf->Cell(11, 7, " D ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo2['esf_d'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo2['cil_d'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo2['eje_d'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo2['add_d'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo2['av_lejos_d'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo2['av_cerca_d'], 1, 0, 'C');
              $pdf->Cell(4, 7, " ", 0, 0, 'C'); //Celda que separa la objetiva de observaciones
              $pdf->Cell(75, 7, " ", 0, 1, 'C');


              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la izquierda
              $pdf->Cell(11, 7, " I ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo2['esf_i'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo2['cil_i'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo2['eje_i'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo2['add_i'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo2['av_lejos_i'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo2['av_cerca_i'], 1, 0, 'C');
              $pdf->Cell(4, 7, " ", 0, 0, 'C'); //Celda que separa la objetiva de observaciones

              $pdf->Cell(20, 7, " ", 0, 1, 'C'); //Celda final debajo de la celda de coveer

            }
            $pdf->Ln(2);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(120, 5, "Refraccion Objetiva", 0, 1, 'C');
            $pdf->SetTextColor('0', '0', '0');
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', '10');
            $pdf->SetTextColor(253, 254, 254);
            $pdf->Cell(13, 7, "", 0, 0, 'C', 0); //Celda que empuja la cabecera
            $pdf->SetFillColor(0, 0, 118);
            $pdf->Cell(15, 7, "Esf", 1, 0, 'C', true);
            $pdf->Cell(15, 7, "Cil", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Eje", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Add", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Lejos", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Cerca", 1, 0, 'C', true);
            $pdf->Cell(4, 7, "", 0, 0, 'C', 0); //Celda que separa la objetiva de observaciones
            $pdf->SetTextColor(0, 0, 0);


            for ($i = 0; $i < $filas3; $i++) {
              $campo3 = mysqli_fetch_assoc($receta_objetiva);
              $pdf->Cell(14, 7, " ", 0, 1, 'C'); //Celda que baja la segunda fila
              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la derecha
              $pdf->Cell(11, 7, " D ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo3['esf_d_ob'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo3['cil_d_ob'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo3['eje_d_ob'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo3['add_d_ob'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo3['av_lejos_d_ob'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo3['av_cerca_d_ob'], 1, 0, 'C');
              $pdf->Cell(4, 7, " ", 0, 0, 'C'); //Celda que separa la objetiva de observaciones
              $pdf->Cell(75, 7, " ", 0, 1, 'C');

              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la izquierda
              $pdf->Cell(11, 7, " I ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo3['esf_i_ob'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo3['cil_i_ob'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo3['eje_i_ob'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo3['add_i_ob'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo3['av_lejos_i_ob'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo3['av_cerca_i_ob'], 1, 1, 'C');
            }
            $pdf->Ln(2);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(120, 5, "Refraccion Subjetiva", 0, 1, 'C');
            $pdf->SetTextColor('0', '0', '0');
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', '10');
            $pdf->SetTextColor(253, 254, 254);
            $pdf->Cell(13, 7, "", 0, 0, 'C', 0); //Celda que empuja la cabecera
            $pdf->SetFillColor(0, 0, 118);
            $pdf->Cell(15, 7, "Esf", 1, 0, 'C', true);
            $pdf->Cell(15, 7, "Cil", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Eje", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Add", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Lejos", 1, 0, 'C', true);
            $pdf->Cell(20, 7, "AV Cerca", 1, 0, 'C', true);
            $pdf->SetTextColor(0, 0, 0);


            for ($i = 0; $i < $filas4; $i++) {
              $campo4 = mysqli_fetch_assoc($receta_subjetiva);
              $pdf->Cell(14, 7, " ", 0, 1, 'C'); //Celda que baja la segunda fila
              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la derecha
              $pdf->Cell(11, 7, " D ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo4['esf_d_sub'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo4['cil_d_sub'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo4['eje_d_sub'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo4['add_d_sub'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo4['av_lejos_d_sub'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo4['av_cerca_d_sub'], 1, 1, 'C');

              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la izquierda
              $pdf->Cell(11, 7, " I ", 0, 0, 'C');
              $pdf->Cell(15, 7, $campo4['esf_i_sub'], 1, 0, 'C');
              $pdf->Cell(15, 7, $campo4['cil_i_sub'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo4['eje_i_sub'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo4['add_i_sub'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo4['av_lejos_i_sub'], 1, 0, 'C');
              $pdf->Cell(20, 7, $campo4['av_cerca_i_sub'], 1, 1, 'C');
            }
            $pdf->Ln(2);


            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(120, 5, "Receta Final", 0, 1, 'C');
            $pdf->SetTextColor('0', '0', '0');
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', '10');
            $pdf->SetTextColor(253, 254, 254);
            $pdf->Cell(13, 7, "", 0, 0, 'C', 0); //Celda que empuja la cabecera
            $pdf->SetFillColor(0, 0, 118);
            $pdf->Cell(14, 7, "Esf", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Cil", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Eje", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Add", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "AV(cc)", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "DNP", 1, 0, 'C', true);
            $pdf->Cell(14, 7, "Altura", 1, 0, 'C', true);
            $pdf->SetTextColor(0, 0, 0);


            for ($i = 0; $i < $filas; $i++) {

              $campo = mysqli_fetch_assoc($receta_final);
              $pdf->Cell(14, 7, " ", 0, 1, 'C'); //Celda que baja la segunda fila
              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la derecha
              $pdf->Cell(11, 7, " D ", 0, 0, 'C');
              $pdf->Cell(14, 7, $campo['esf_d_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['cil_d_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['eje_d_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['add_d_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['av_cc_d'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['dnp_d'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['altura_d'], 1, 1, 'C');

              $pdf->Cell(2, 7, " ", 0, 0, 'C'); //Celda que empuja la izquierda
              $pdf->Cell(11, 7, " I ", 0, 0, 'C');
              $pdf->Cell(14, 7, $campo['esf_i_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['cil_i_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['eje_i_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['add_i_f'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['av_cc_i'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['dnp_i'], 1, 0, 'C');
              $pdf->Cell(14, 7, $campo['altura_i'], 1, 1, 'C');
            }


            $pdf->Ln(4);

            if ($row2 = mysqli_fetch_row($sql2)) {
              $pdf->Cell(5, 5, "", 0, 0);
              $pdf->Cell(19, 5, "Diagnostico: ", 0, 0);
              $pdf->Cell(105, 5, " " . wordwrap(utf8_decode($row2[0])), 0, 0);
              $pdf->Line(34, 258, 200, 258);

              $pdf->Line(150, 264, 200, 264);
              $pdf->SetFont('Arial', 'B', '7');
              $pdf->Ln(15);
              $pdf->Cell(150, 2, "", 0, 0);
              $pdf->Cell(19, 2, "Dr. ", 0, 0);
              $pdf->Cell(1, 2, " ", 0, 0);
              $pdf->Cell(19, 2, "Codigo ", 0, 0);

              $pdf->Ln(1);


              // Observaciones y Cover
              for ($i = 0; $i < $filas5; $i++) {
                $campo5 = mysqli_fetch_assoc($lensometria);
                $pdf->SetXY(132, 168);
                $pdf->SetFont('Arial', '', '10');
                $pdf->SetTextColor(253, 254, 254);
                $pdf->Cell(70, 7, "Observaciones Clinicas", 1, 0, 'C', true);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetXY(132, 175);
                $pdf->MultiCell(70, 4, wordwrap(utf8_decode($campo5['observaciones_clinicas'])), 0, 0);


                $pdf->SetXY(132, 138);
                $pdf->SetFont('Arial', '', '10');
                $pdf->SetTextColor(253, 254, 254);
                $pdf->Cell(70, 7, "Cover Test", 1, 0, 'C', true);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetXY(132, 145);
                $pdf->MultiCell(70, 4, wordwrap(utf8_decode($campo5['cover_test'])), 0, 0);


                //Cover cuadro de texto
                $pdf->SetXY(132, 145);
                $pdf->Cell(70, 14, " ", 1, 0);


                //Observaciones cuadro de texto
                $pdf->SetXY(132, 175);
                $pdf->Cell(70, 44, " ", 1, 0);

                //Dist.Vert, Ang.Pant, Ang.Facial
                $pdf->SetXY(132, 228);
                $pdf->SetTextColor(253, 254, 254);
                $pdf->Cell(30, 7, "Dist.Vert:", 1, 1, 'C', true);

                $pdf->SetXY(132, 235);
                $pdf->Cell(30, 7, "Ang.Pant:", 1, 1, 'C', true);


                $pdf->SetXY(132, 242);
                $pdf->Cell(30, 7, "Ang.Facial:", 1, 1, 'C', true);

                //Dist.Vert cuadro texto
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetXY(162, 228);
                $pdf->Cell(40, 7, $campo5['dist_vert'], 1, 1, 'C');

                //Ang.Pant cuadro texto
                $pdf->SetXY(162, 235);
                $pdf->Cell(40, 7, $campo5['ang_pant'], 1, 1, 'C');

                //Ang.Facial cuadro texto
                $pdf->SetXY(162, 242);
                $pdf->Cell(40, 7, $campo5['ang_facial'], 1, 1, 'C');


                $pdf->SetFont('Arial', 'B', '8');
                $pdf->SetXY(145, 247);
                $pdf->Cell(40, 7, "Distancia requerida para ver de cerca: ", 0, 0, 'C');
                $pdf->SetXY(190, 248);
                $pdf->Cell(10, 5, $campo5['distancia_vista'], 0, 0, 'C');
              }
              $pdf->SetXY(13, 269.5);
              $pdf->SetFont('Arial', '', '12');
              $pdf->SetTextColor(192, 57, 43);
              $pdf->Cell(160, 5, "", 0, 0);
              $pdf->Cell(9, 7, wordwrap(utf8_decode("Nº: ")), 0, 0);
              $pdf->Cell(52, 7, " " . $row[0], 0, 0);

              $pdf->SetXY(132, 145);
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\air.png', 10, 249, 40, 28, 'PNG');
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\trans.png', 14, 270, 30, 12, 'PNG');
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\xpe.png', 57, 258, 30, 12, 'PNG');
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\fre.png', 57, 270, 30, 12, 'PNG');


              $pdf->AddPage();



              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\trans.png', 170, 5, 30, 12, 'PNG');
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\munke2.png', 10, -5, 35, 32, 'PNG');


              $pdf->SetFillColor(150, 191, 255);
              $pdf->SetDrawColor(150, 191, 255);
              $pdf->SetXY(5, 25);
              $pdf->SetTextColor(255, 255, 255);
              $pdf->Cell(45, 10, "LIFE", 1, 0, 'C', true);

              $pdf->SetXY(57, 25);
              $pdf->Cell(45, 10, "ADVANCED", 1, 0, 'C', true);

              $pdf->SetXY(108, 25);
              $pdf->Cell(45, 10, "PREMIUM", 1, 0, 'C', true);

              $pdf->SetXY(160, 25);
              $pdf->Cell(45, 10, "INFINITY", 1, 0, 'C', true);
              $pdf->SetTextColor(0, 0, 0);

              //INICIO PRIMERA TABLA 
              //Primera Parte Primera Tabla
              $pdf->SetXY(5, 36);
              $pdf->Cell(45, 59, "", 1, 0, 'C');

              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(7, 36);
              $pdf->MultiCell(40, 4, utf8_decode("Lentes progresivos free form, hechos con tecnologia digital Alemana de alta definicion. Cada lente es unico, con estructura personalizada para su estilo de vida"), 0, 'C');


              $pdf->SetFont('Arial', 'b', '10');
              $pdf->SetXY(7.5, 64);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("119,800")), 0, 0, 'C');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 10, 72, 35, 22, 'JPG');


              //Segunda Parte Primera Tabla
              $pdf->SetXY(5, 96);
              $pdf->Cell(45, 45, "", 1, 0, 'C');

              $pdf->SetXY(7.5, 94);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Personalización")), 0, 0, 'C');

              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(7.5, 104);
              $pdf->MultiCell(40, 4, utf8_decode("El angulo pantosópico, panoramico y la distancia al vertice proporcionan mas satisfacción visual en su estilo de vida"), 0, '');

              $pdf->SetXY(7.5, 128);
              $pdf->MultiCell(45, 4, utf8_decode("* BALANCE (Todo uso)
        * LEJOS (Conducción)
        * INTER CERCA (Vida digital)"), 0, '');

              //Tercera Parte Primera Tabla
              $pdf->SetFont('Arial', 'b', '11');

              $pdf->SetXY(5, 142);
              $pdf->Cell(97, 24, "", 1, 0, 'C');

              $pdf->SetXY(2, 140);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Proteccion")), 0, 0, 'C');

              $pdf->SetFont('Arial', 'b', '10');

              $pdf->SetXY(-213, 146);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Green")), 0, 0, 'C');

              $pdf->SetXY(-180, 146);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Ultra Blue")), 0, 0, 'C');


              $pdf->SetXY(-213, 154);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Green")), 0, 0, 'C');

              $pdf->SetXY(-180, 154);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Ultra Blue")), 0, 0, 'C');


              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 62, 144, 38, 20, 'JPG');

              //FINAL PRIMERA TABLA 

              //INICIO SEGUNDA TABLA 
              $pdf->SetXY(57, 36);
              $pdf->Cell(45, 59, "", 1, 0, 'C');

              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(60, 36);
              $pdf->MultiCell(40, 4, utf8_decode("Diseño avanzado y optimizado para mas comodidad en su estilo de vida digital. Personalizada para una mejor expericencia en el uso de dispositivos digitales"), 0, 'C');


              $pdf->SetFont('Arial', 'b', '10');
              $pdf->SetXY(59.5, 64);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("139,800")), 0, 0, 'C');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 62, 72, 35, 22, 'JPG');


              //Segunda Parte Segunda Tabla
              $pdf->SetXY(57, 96);
              $pdf->Cell(45, 45, "", 1, 0, 'C');

              $pdf->SetXY(60, 94);
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\baw.png', 64.5, 106, 30, 26, 'PNG');



              $pdf->SetXY(108, 142);
              $pdf->Cell(45, 24, "", 1, 0, 'C');





              //FINAL SEGUNDA TABLA




              //INICIO TERCERA TABLA
              $pdf->SetXY(108, 36);
              $pdf->Cell(45, 59, "", 1, 0, 'C');

              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(110, 36);
              $pdf->MultiCell(40, 4, utf8_decode("Diseño con estructura unica, reduce el efecto balancero y el desenfoque periferico ampliando las zonas de lejos mas intermedia y cerca para mas confort "), 0, 'C');


              $pdf->SetFont('Arial', 'b', '10');
              $pdf->SetXY(110, 64);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("168,800")), 0, 0, 'C');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 113, 72, 35, 22, 'JPG');


              //Segunda Parte Tercera Tabla
              $pdf->SetXY(108, 96);
              $pdf->Cell(45, 45, "", 1, 0, 'C');

              $pdf->SetXY(110, 131);
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\libro.jpg', 111.5, 102, 38, 30, 'JPG');
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Anti Fatiga + AR Blue")), 0, 0, 'C');


              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\premium.jpg', 110, 144, 40, 18, 'JPG');

              $pdf->SetXY(110, 159);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("Anti Fatiga + AR Blue")), 0, 0, 'C');
              //FINAL TERCERA TABLA 


              //INICIO CUARTA TABLA
              $pdf->SetXY(160, 36);
              $pdf->Cell(45, 59, "", 1, 0, 'C');

              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(162.5, 36);
              $pdf->MultiCell(40, 4, utf8_decode("Diseño con estructura unica, reduce el efecto balancero y el desenfoque periferico ampliando las zonas de lejos mas intermedia y cerca para mas confort "), 0, 'C');


              $pdf->SetFont('Arial', 'b', '10');
              $pdf->SetXY(162.5, 64);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("198,800")), 0, 0, 'C');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 164.5, 72, 35, 22, 'JPG');


              //Segunda Parte Cuarta Tabla
              $pdf->SetXY(160, 96);
              $pdf->SetTextColor(255, 255, 255);
              $pdf->Cell(45, 10, "INNOVATIONS", 1, 0, 'C', true);
              $pdf->SetTextColor(0, 0, 0);

              $pdf->SetXY(160, 107);
              $pdf->Cell(45, 59, "", 1, 0, 'C');



              $pdf->SetFont('Arial', 'b', '8');
              $pdf->SetXY(162, 108);
              $pdf->MultiCell(40, 4, utf8_decode("Diseño con estructura unica, reduce el efecto balancero y el desenfoque periferico ampliando las zonas de lejos mas intermedia y cerca para mas confort "), 0, 'C');

              $pdf->SetFont('Arial', 'b', '10');
              $pdf->SetXY(162.5, 135);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("350,000")), 0, 0, 'C');
              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\multi-view.jpg', 164, 143, 35, 22, 'JPG');



              $pdf->SetXY(5, 168);
              $pdf->Cell(200, 20, "", 1, 0, 'C', true);


              $pdf->SetTextColor(255, 255, 255);
              $pdf->SetFont('Arial', 'b', '8');

              $pdf->SetXY(10, 168);
              $pdf->Cell(40, 20, "MK DIGITAL EASY FIT", 1, 0, 'C');


              $pdf->SetXY(60, 168);
              $pdf->Cell(40, 20, "MK DIGITAL ADAPTATIVE", 1, 0, 'C');

              $pdf->SetXY(110, 168);
              $pdf->Cell(40, 20, "MK DIGITAL ACTIVE", 1, 0, 'C');

              $pdf->SetXY(155, 168);
              $pdf->Cell(40, 20, "MK DIGITAL EXPERIENCE", 1, 0, 'C');




              $pdf->SetDrawColor(255, 255, 255);
              $pdf->SetLineWidth(0.6);

              $pdf->Line(53, 185, 53, 172);

              $pdf->Line(106, 185, 106, 172);

              $pdf->Line(150, 185, 150, 172);



              $pdf->SetXY(10, 178);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("39,800")), 0, 0, 'C');

              $pdf->SetXY(60, 178);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("59,800")), 0, 0, 'C');

              $pdf->SetXY(110, 178);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("79,800")), 0, 0, 'C');

              $pdf->SetXY(156, 178);
              $pdf->Cell(40, 10, wordwrap(utf8_decode("98,800")), 0, 0, 'C');


              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\1.png', -35, 185, 150, 60, 'PNG');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\2.png', 30, 185, 150, 60, 'PNG');

              $pdf->Image('C:\Users\CCTVmunkel\Desktop\XAMP 8\htdocs\Optometristas_Php\imgs\3.png', 88, 185, 150, 60, 'PNG');



              $pdf->Line(10, 180, 200, 180);

              $pdf->SetFont('Arial', '', '12');
              $pdf->SetTextColor(0, 0, 0);
              $pdf->SetLineWidth(0.2);
              $pdf->SetDrawColor(0, 0, 0);


              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(5, 197);
              $pdf->Cell(20, 20, "Aro: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(12, 206.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($campo['aro'])) . "-" . ($row6[0]), 0, 0);

              $pdf->SetXY(5, 207);
              $pdf->Cell(20, 20, "Lentes: ", 0, 0);
              $pdf->SetXY(17, 216.5);
              $pdf->Cell(88, 1, " " . strtoupper(wordwrap(utf8_decode($campo['len']))), 0, 0);


              $pdf->SetXY(5, 217);
              $pdf->Cell(20, 20, "Tratamientos: ", 0, 0);
              $pdf->SetXY(20.5, 226.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($campo['ar_ultra'])), 0, 0);


              $pdf->SetFont('Arial', '', '8.5');

              $pdf->SetXY(5, 227);
              $pdf->Cell(20, 20, "NOMBRE DEL PACIENTE: ", 0, 0);
              $pdf->SetXY(42, 236.5);
              $pdf->Cell(88, 1, " " . strtoupper(wordwrap(utf8_decode($row[2]))), 0, 0);
              $pdf->Line(42, 239, 200, 239);

              $pdf->SetXY(5, 237);
              $pdf->Cell(20, 20, "FIRMA: ", 0, 0);
              $pdf->Line(17, 249, 100, 249);

              $pdf->SetXY(100, 237);
              $pdf->Cell(20, 20, "No.IDENTIFICACION: ", 0, 0);
              $pdf->SetXY(129, 246.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row[7])), 0, 0);
              $pdf->Line(130, 249, 200, 249);

              $pdf->SetXY(5, 247);
              $pdf->Cell(20, 20, "NOMBRE DEL OPTOMETRISTA: ", 0, 0);
              $pdf->SetXY(50, 256.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row5[1])), 0, 0);
              $pdf->Line(51, 259, 200, 259);

              $pdf->SetXY(5, 255);
              $pdf->Cell(20, 20, "FIRMA: ", 0, 0);
              $pdf->Line(16, 267, 100, 267);

              $pdf->SetXY(100, 255);
              $pdf->Cell(20, 20, "CODIGO: ", 0, 0);
              $pdf->SetXY(114, 264.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row5[0])), 0, 0);
              $pdf->SetXY(114, 264.5);

              $pdf->Line(115, 267, 200, 267);
            }
          }
        }
      }
    }
    $pdf->Output('D');
  }

  ob_end_flush();
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tab</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.csss">
</head>

<!-- PURO CSS Y DISEÑOS-->
<style>
  @import url('https://fonts.google.com/specimen/Roboto+Slab?query=roboto+slab');

  input {
  font-size: 16px;
  cursor: pointer;
  border-color: #0a4f77;
}

body {
background: whitesmoke;
font-family: Arial, Helvetica, sans-serif;
}

 .card {
border: none;
border-radius: 0;
width: 550px;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1)
}

 .text-muted {
font-weight: 500 !important;

font-size: 12px;
color: #6c757dcc !important;
}

h2 {
color: #00557F;
padding: 10px 0 20px;
font-family: Roboto Slab !important;
font-weight: bold;
}

.form-group {
margin-top: 20px;
}

.first {
margin-top: 0 !important;
}

 .form-control {
border-radius: 0;
}


.form-group label {
    font-size: 12px;
    font-weight: bold;
  }

  .form-group span {
    color: rgb(255, 0, 0);
  }

  .form-control:focus {
    border: 1.5px solid #adb5bd;
    border-radius: 0;
    box-shadow: none;
    background: #ff000012;
    letter-spacing: 1px;
    color: #000;
  }

  .form-check-label {
    font-size: 9px;
    font-weight: bold;
  }

  .btn-block {
    border-radius: 0;
    border: none;
    background: blue;
    margin-top: 10px;
    padding-top: 0px;
    background: #027676;
  }

  .btn-block:hover {
    background: #027676;
    ;
  }

  .btn-block:focus {
    box-shadow: none;
    background: #018080 !important;
  }

  .btn-primary span {
    font-size: 12px;
  }

  .val_error {
    color: #dc3545;
    font-size: 10px;
    padding-top: 5px;
    font-weight: bold;
  }

  .todo {
    margin-top: 40px;
    width: 70%;
    background: #fff;
    margin-bottom: 40px;
    margin: auto;
  }

  .todo2 {
    margin-top: 40px;
    width: 50%;

    margin-bottom: 40px;
    margin: auto;
  }

  .lbl {
    color: white;
    font-weight: bold;
  }

  .btn1g {
    display: inline-block;
    border-radius: 4px;
    background-color: #00557F;
    border: none;
    color: whitesmoke;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    width: 70px;
    height: 40px;
    transition: all 0.5s;
    cursor: pointer;
    margin: -10px 10px 20px 360px;

  }

  .btn1l {
    display: inline-block;
    border-radius: 4px;
    background-color: #00557F;
    border: none;
    color: whitesmoke;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    width: 70px;
    height: 40px;
    transition: all 0.5s;
    cursor: pointer;
    margin: -60px 10px 20px 270px;

  }

  .age {
    margin-left: 100px;
  }

  .lbledad {
    margin-left: 100px;
  }

  .separador {
    margin: 1px;
  }

  #cornea_i {
    margin-left: 40px;
  }

  #cornea_d {
    margin-right: 40px;
  }

  #fo_i {
    margin-left: 40px;
  }

  #fo_d {
    margin-right: 40px;
  }

  #cristalino_i {
    margin-left: 40px;
  }

  #cristalino_d {
    margin-right: 40px;
  }

  .lblcor_i {
    margin-left: 40px;
  }

  .separa {
    margin: 20px;
  }

  .img {
    margin-left: 600px;
    margin-top: 10px;
  }

  .lblradio {
    color: white;
  }

  select {
    text-align: center;
  }

  .nom {
    margin: 5px;
    margin-left: 20px;
  }

  .ced {
    margin: 5px;
  }

  .lblnom {
    margin: 10px;
    margin-left: 120px;
    color: white;
  }

  .lblced {
    margin: 10px;
    margin-left: 160px;
    color: white;
  }

  .segundo {
    width: 40%;
    height: 140px;
    background: #0a4f77;
    margin: auto;
    margin-top: 20px;
    border-radius: 20px;
  }

  .sinborde {
    border: 0;
    cursor: pointer;
    outline: 0;
    background: #0a4f77;
    color: white;
  }

  .cover_obser {
    width: 700px;
    height: 100px;
    text-align: center;
    border: 0;
    cursor: pointer;

  }

  .radio {
    border-radius: 1000px;
    width: 20%;
    margin: auto;
    text-align: center;
    border: 0;
    cursor: pointer;
    background-color: #0a4f77;
    color: white;
    font-size: 20px;
  }

  .codigo {
    border: 0;
    background: white;
    color: #dc3545;
    width: 80px;
    margin-left: 200px;
    font-size: 20px;

  }

  input {
    cursor: auto;
    outline: 0;
    color: #0a4f77;
  }

  label {
    color: #0a4f77;
  }

  /*

TABLAS

*/

  /*.age
Tabla refracciones css
*/
  .refracciones {
    border: 1px #EDEDED;
    border-collapse: collapse;
    margin: auto;
    width: 68%;
    text-align: center;
    margin: 10px 0px 0px -7px;
  }

  .cabeza {
    border: 1px solid #EDEDED;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
    color: #0a4f77;
    background: white;
  }

  .cuerpo {
    color: black;
    background: #0a4f77;
  }

  .th-refra {
    border: 1px solid;
    width: 30px;
    height: 25px;
    border-right: 1px solid white;
    border-top: 1px solid white;
  }

  .td-refra {
    border: 1px solid white;
    width: 20px;
    height: 30px;
    color: white;
    font-weight: bold;
  }


  .indice {
    border: 1px solid #0a4f77;
    width: 10px;
    background: #0a4f77;
    border-right: 1px solid white;
  }

  .indices {
    width: 10px;
    background: #0a4f77;
    border: 1px solid #0a4f77;
    color: white;
    border-right: 1px solid white;


    /*.age
Tabla cover test css
*/

  }

  .cover-test {
    border: 1px #EDEDED;
    border-collapse: collapse;
    margin: auto;
    width: 0%;
    height: -20px;
    text-align: center;
    margin: -486px 0px 0px 620px;
  }

  .cabeza-cover {
    border: 1px solid #EDEDED;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
    color: #0a4f77;
    background: white;
  }

  .cuerpo-cover {
    color: black;
    background: white;
    border: 1px solid #EDEDED;
    border-collapse: collapse;
  }

  .th-cover {
    border: 1px solid #EDEDED;
    height: 25px;
    width: 20px;
  }

  .td-cover {
    border: 1px solid #EDEDED;
    width: 200px;
  }


  /*.age
Tabla obsevaciones css
*/
  .observaciones-clinicas {
    border: 1px #EDEDED;
    border-collapse: collapse;
    margin: auto;
    width: 0%;
    height: -20px;
    text-align: center;
    margin: 43px 0px 0px 620px;
  }

  .cabeza-observaciones {
    border: 1px solid #EDEDED;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
    color: #0a4f77;
    background: white;
  }

  .cuerpo-observaciones {
    color: black;
    background: white;
    border: 1px solid #EDEDED;
    border-collapse: collapse;
  }

  .th-observaciones {
    border: 1px solid #EDEDED;
    height: 25px;
    width: 20px;
  }

  .td-observaciones {
    border: 1px solid #EDEDED;
    width: 200px;
  }

  /*.age
textareas
*/
  .area-cover {
    width: 280px;
    height: 52px;
    outline: 0;
    color: #0a4f77;

  }

  .area-observaciones {
    width: 280px;
    height: 183px;
    outline: 0;
    color: #0a4f77;

  }


  /*.age
Tabla receta final css
*/
  .refraccion-f {
    border: 1px #EDEDED;
    border-collapse: collapse;
    margin: auto;
    width: 68%;
    text-align: center;
    margin: 20px 0px 0px -7px;
  }

  .cabeza-f {
    border: 1px solid #EDEDED;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
    color: #0a4f77;
    background: white;
  }

  .cuerpo-f {
    color: black;
    background: #0a4f77;
  }

  .th-refra-f {
    border: 1px solid #EDEDED;
    width: 30px;
    height: 25px;
  }

  .td-refra-f {
    border: 1px solid #EDEDED;
    width: 20px;
    height: 30px;
  }


  .indice-f {
    border: 1px solid #0a4f77;
    width: 10px;
    background: #0a4f77;
    border-right: 1px solid white;
  }

  .indices-f {
    width: 10px;
    background: #0a4f77;
    border: 1px solid #0a4f77;
    color: white;
    border-right: 1px solid white;
  }

  textarea::-webkit-scrollbar {
    width: 1em;
  }

  textarea {
    resize: none;
  }




  /*.age
Tabla distancias css
*/


  .distancias {
    border: 1px #EDEDED;
    border-collapse: collapse;
    margin: auto;
    width: -100%;
    height: 20px;
    text-align: center;
    margin: 53px 0px 0px 620px;
  }

  .cabeza-distancias {
    border: 1px solid #EDEDED;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
  }

  .cuerpo-distancias {
    color: black;
    background: white;
    border: 1px solid #EDEDED;
    border-collapse: collapse;
  }

  .th-distancias {
    border: 1px solid #0a4f77;
    height: 30px;
    width: 500px;
    color: #0a4f77;
    background: white;
  }

  .td-distancias {
    border: 1px solid #0a4f77;
    width: 50px;
    background: white;
    color: black;
  }

  .titulo-i {
    margin: 10px 0px 0px 250px;
    color: white;
    font-weight: bold;
  }

  .titulo-f {
    margin: 10px 0px 0px 270px;
    color: white;
    font-weight: bold;
  }

  .titulo-s {
    margin: 10px 0px 0px 236px;
    color: white;
    font-weight: bold;
  }

  .titulo-o {
    margin: 10px 0px 0px 238px;
    color: white;
    font-weight: bold;
  }

  .select-td {
    background: #0a4f77;
    color: white;
    border: 0;
    cursor: pointer;
    outline: 0;
  }

  .lbl {

    margin: 10px 5px 5px 100px;
    color: white;
    font-weight: bold;
  }

  .lblradio {
    margin: 10px 5px 5px 100px;
    color: white;
    font-weight: bold;
  }


  ::placeholder {
    color: #0a4f77;
  }

  option {
    cursor: pointer;
  }

  .distancia-texto {
    border: 0;
    text-align: center;
  }

  .sucur {
    color: #0a4f77;
    border-color: #0a4f77;
    cursor: pointer;
    outline: 0;
    margin: -70px 0px 0px 40px;

  }

  .sucurpro {
    color: #0a4f77;
    cursor: pointer;
    outline: 0;
    border: 0;
    margin: -400px 0px 0px 40px;
    background: transparent;

  }

  .profe {
    margin: -460px 0px 0px -300px;
  }

  .suc {
    margin: 1px 0px 0px -40px;
  }

  .lblpro {
    margin: -30px 0px 0px 300px;
  }

  .imgout {
    margin-left: 500px;
    margin-top: -85px;

  }

  #aro {
    margin-left: -30px;
  }

  #ar_ultra {
    margin-left: -30px;
  }

  #lentes {
    margin-left: -30px;
  }

  #lblaro {
    margin-left: -30px;
  }
</style>


<!-- JS PARA PASAR DE INPUT EN INPUT CON TECLA ENTER--> 

<body>
<script>
  function nextFocus(inputF, inputS) {
  document.getElementById(inputF).addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
      document.getElementById(inputS).focus();
    }
  });
}
</script>


<!-- FORMULARIO -->
<div class="img"><a href="admin-info.php"><img src="../imgs/munke.png" alt="" width="20%"></a></div>
<div class="imgout"><a href="logout.php"><img src="../imgs/salir.png" alt="" width="7%"></a></div>



  <form action="add-info.php" method="POST" id="formu">
    <div class="todo">
      <div class="tab-container">
          <ul class="options">
              <li id="option1" class="option option-active">Registro Paciente</li>
              <li id="option2" class="option">Registro Antecedentes</li>
              <li id="option4" class="option">Registro Examen Externo</li>
              <li id="option3" class="option">Registro Refracciones</li>
              <li id="option5" class="option">Registro Final</li>
          </ul>
  
          <div class="contents">
              <div id="content1" class="content content-active">
                <div class="container">
                  <div class="row">
                      <div class="card d-flex justify-content-center mx-auto my-3 p-5">
                          <center>
                            <h6 class="text-muted">OPTICAS MUNKEL</h6> 
                          </center>
                            <center>
                          <h2>Registro Paciente</h2>
                          </center>
                              <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Nombre Completo<span>*</span></label>
                                       <input type="text" id="nombre" name="nombre" required size="35" onkeypress="nextFocus('nombre', 'edad')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" class="lbledad">Edad<span>*</span></label>
                                       <div class="age"><input type="text" id="edad" name="edad" required size="12" onkeypress="nextFocus('edad', 'email')"></div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Email<span>*</span></label>
                                       <input type="email" id="email" name="email" required size="35" onkeypress="nextFocus('email', 'numero')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" class="lbledad">Numero<span>*</span></label>
                                       <div class="age"><input type="text" id="numero" name="numero" required size="12" onkeypress="nextFocus('numero', 'ocupacion')"></div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Ocupacion<span>*</span></label>
                                       <input type="text" id="ocupacion" name="ocupacion" required size="35" onkeypress="nextFocus('ocupacion', 'cedpaciente2')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" class="lbledad">Cedula<span>*</span></label>
                                       <div class="age"><input type="text" id="cedpaciente2" name="cedpaciente2" required size="12" onkeypress="nextFocus('cedpaciente2', 'direccion')"></div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     
                                </div>
              
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Direccion<span>*</span></label>
                                       <input type="text" id="direccion" name="direccion" required size="35" onkeypress="nextFocus('direccion', 'fecha_nacimiento')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" class="lbledad">Fecha Nac<span>*</span></label>
                                       <div class="age"><input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required size="4" onkeypress="nextFocus('fecha_nacimiento', 'sucursal')"></div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     
                                </div>    
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <div class="lblsuc"><label for="inputFirstName" class="lblsucur">Sucursal<span>*</span></label></div>
                                       <div class="suc"><select name="sucursal" id="sucursal" required onkeypress="nextFocus('sucursal', 'salud_general')" class="sucur">
                                       <option disabled>Sucursal</option>
                                       <option value="alajuela" <?php if ($suc == "alajuela") {
                                                      echo "selected='selected'";
                                                    } ?>>Alajuela</option>
                          <option value="belen" <?php if ($suc == "belen") {
                                                  echo "selected='selected'";
                                                } ?>>Belen</option>
                          <option value="calle_primera" <?php if ($suc == "calle_primera") {
                                                          echo "selected='selected'";
                                                        } ?>>Calle Primera</option>
                          <option value="cc_del_sur" <?php if ($suc == "cc_del_sur") {
                                                        echo "selected='selected'";
                                                      } ?>>CC del Sur</option>
                          <option value="city_mall" <?php if ($suc == "city_mall") {
                                                      echo "selected='selected'";
                                                    } ?>>City Mall</option>
                          <option value="coronado" <?php if ($suc == "coronado") {
                                                      echo "selected='selected'";
                                                    } ?>>Coronado</option>
                          <option value="desamparados" <?php if ($suc == "desamparados") {
                                                          echo "selected='selected'";
                                                        } ?>>Desamparados</option>
                          <option value="galerias_belen" <?php if ($suc == "galerias_belen") {
                                                            echo "selected='selected'";
                                                          } ?>>Galerias Belen</option>
                          <option value="grecia" <?php if ($suc == "grecia") {
                                                    echo "selected='selected'";
                                                  } ?>>Grecia</option>
                          <option value="guapiles" <?php if ($suc == "guapiles") {
                                                      echo "selected='selected'";
                                                    } ?>>Guapiles</option>
                          <option value="hatillo" <?php if ($suc == "hatillo") {
                                                    echo "selected='selected'";
                                                  } ?>>Hatillo</option>
                          <option value="hatillo_2" <?php if ($suc == "hatillo_2") {
                                                      echo "selected='selected'";
                                                    } ?>>Hatillo 2</option>
                          <option value="heredia" <?php if ($suc == "heredia") {
                                                    echo "selected='selected'";
                                                  } ?>>Heredia</option>
                          <option value="liberia" <?php if ($suc == "liberia") {
                                                    echo "selected='selected'";
                                                  } ?>>Liberia</option>
                          <option value="metropoli" <?php if ($suc == "metropoli") {
                                                      echo "selected='selected'";
                                                    } ?>>Metropoli</option>
                          <option value="multicentro" <?php if ($suc == "multicentro") {
                                                        echo "selected='selected'";
                                                      } ?>>Multicentro</option>
                          <option value="multiplaza_3" <?php if ($suc == "multiplaza_3") {
                                                          echo "selected='selected'";
                                                        } ?>>Multiplaza 3</option>
                          <option value="multiplaza_del_este" <?php if ($suc == "multiplaza_del_este") {
                                                                echo "selected='selected'";
                                                              } ?>>Multiplaza del Este</option>
                          <option value="multiplaza_premium" <?php if ($suc == "multiplaza_premium") {
                                                                echo "selected='selected'";
                                                              } ?>>Multiplaza Premium</option>
                          <option value="munkel_salud" <?php if ($suc == "munkel_salud") {
                                                          echo "selected='selected'";
                                                        } ?>>Munkel Salud</option>
                          <option value="novacentro" <?php if ($suc == "novacentro") {
                                                        echo "selected='selected'";
                                                      } ?>>Novacentro</option>
                          <option value="nova_premium" <?php if ($suc == "nova_premium") {
                                                          echo "selected='selected'";
                                                        } ?>>Nova Premium</option>
                          <option value="oxigeno" <?php if ($suc == "oxigeno") {
                                                    echo "selected='selected'";
                                                  } ?>>Oxigeno</option>
                          <option value="paseo_las_flores" <?php if ($suc == "paseo_las_flores") {
                                                              echo "selected='selected'";
                                                            } ?>>Paseo las Flores</option>
                          <option value="pavas" <?php if ($suc == "pavas") {
                                                  echo "selected='selected'";
                                                } ?>>Pavas</option>
                          <option value="pinares" <?php if ($suc == "pinares") {
                                                    echo "selected='selected'";
                                                  } ?>>Pinares</option>
                          <option value="plaza_del_sol" <?php if ($suc == "plaza_del_sol") {
                                                          echo "selected='selected'";
                                                        } ?>>Plaza del Sol</option>
                          <option value="plaza_lincoln" <?php if ($suc == "plaza_lincoln") {
                                                          echo "selected='selected'";
                                                        } ?>>Plaza Lincon</option>
                          <option value="plaza_maynard" <?php if ($suc == "plaza_maynard") {
                                                          echo "selected='selected'";
                                                        } ?>>Plaza Maynard</option>
                          <option value="plaza_mayor" <?php if ($suc == "plaza_mayor") {
                                                        echo "selected='selected'";
                                                      } ?>>Plaza Mayor</option>
                          <option value="plaza_rohmoser" <?php if ($suc == "plaza_rohmoser") {
                                                            echo "selected='selected'";
                                                          } ?>>Plaza Rohmoser</option>
                          <option value="racsa" <?php if ($suc == "racsa") {
                                                  echo "selected='selected'";
                                                } ?>>Racsa</option>
                          <option value="san_pedro" <?php if ($suc == "san_pedro") {
                                                      echo "selected='selected'";
                                                    } ?>>San Pedro</option>
                          <option value="san_rafael" <?php if ($suc == "san_rafael") {
                                                        echo "selected='selected'";
                                                      } ?>>San Rafael</option>
                          <option value="santa_ana" <?php if ($suc == "santa_ana") {
                                                      echo "selected='selected'";
                                                    } ?>>Santa Ana</option>
                          <option value="santa_ana_town_center" <?php if ($suc == "santa_ana_town_center") {
                                                                  echo "selected='selected'";
                                                                } ?>>Santa Ana Town Center</option>
                          <option value="santa_barbara" <?php if ($suc == "santa_barbara") {
                                                          echo "selected='selected'";
                                                        } ?>>Santa Barbara</option>
                          <option value="santo_domingo" <?php if ($suc == "santo_domingo") {
                                                          echo "selected='selected'";
                                                        } ?>>Santo Domingo</option>
                          <option value="tibas" <?php if ($suc == "tibas") {
                                                  echo "selected='selected'";
                                                } ?>>Tibas</option>
                        </select>
                                       </div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>                            
                                     <div class="form-group col-md-6 first">
                                     <div class="profe"><input type="text" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="pro" readonly class="sucurpro" size="70"></div>
                                     </div>    
                                </div>  
                      </div>
                  </div>
              </div>
              </div>
                  
            
              
              <div id="content2" class="content">
                <div class="container">
                  <div class="row">
                      <div class="card d-flex justify-content-center mx-auto my-3 p-5">
                          <center>
                            <h6 class="text-muted">OPTICAS MUNKEL</h6>
                          </center>
                          <center>
                            <h2>Antecedentes</h2>
                        </center>
                      
                              <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Salud General<span>*</span></label>
                                       <input type="text" id="salud_general" name="salud_general" required size="53" onkeypress="nextFocus('salud_general', 'alergias')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div> 
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Alergias<span>*</span></label>
                                       <input type="text" id="alergias" name="alergias" required size="53" onkeypress="nextFocus('alergias', 'toma_medicamento')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Toma Medicamenos<span>*</span></label>
                                       <input type="text" id="toma_medicamentos" name="toma_medicamentos" required size="53" onkeypress="nextFocus('toma_medicamentos', 'cirugias_oculares')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Cirugias Oculares<span>*</span></label>
                                       <input type="text" id="cirugias_oculares" name="cirugias_oculares" required size="53" onkeypress="nextFocus('cirugias_oculares', 'observaciones')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                  </div>
              
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Observaciones<span>*</span></label>
                                       <input type="text" id="observaciones" name="observaciones" required size="53" onkeypress="nextFocus('observaciones', 'tratamiento_oftalmologico')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Esta en tratamiento oftalmologico<span>*</span></label>
                                       <p class="separador"></p>
                                       <input type="text" id="tratamiento_oftalmologico" name="tratamiento_oftalmologico" required size="35" onkeypress="nextFocus('tratamiento_oftalmologico', 'ultimo_examen')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                     <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" class="lbledad">Ultimo Examen<span>*</span></label>
                                       <div class="age"><input type="date" id="ultimo_examen" name="ultimo_examen" required size="30" onkeypress="nextFocus('ultimo_examen', 'motivo_consulta')"></div>
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Motivo de Consulta<span>*</span></label>
                                       <input type="text" id="motivo_consulta" name="motivo_consulta" required size="53" onkeypress="nextFocus('motivo_consulta', 'sintomas_astenopticos')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                </div>
  
                                <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName">Sintomas Astenopticos<span>*</span></label>
                                       <input type="text" id="sintomas_astenopticos" name="sintomas_astenopticos" required size="53" onkeypress="nextFocus('sintomas_astenopticos', 'content4-cornea_i')">
                                       <div id="fname_error" class="val_error"></div>
                                     </div>
                                </div>
  
                  </div>
              </div>
              </div>
            </div>
                  <div id="content4" class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card d-flex justify-content-center mx-auto my-3 p-5">
                               <center> 
                                <h6 class="text-muted">OPTICAS MUNKEL</h6>
                              </center>
                                <center>
                                   <h2>Examen Externo</h2>
                                  </center>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 first">
                                        <label for="cornea_i" class="lblcor_i">Cornea izquierda<span>*</span></label> 
                                             <input type="text" id="cornea_i" name="cornea_i" required size="15" onkeypress="nextFocus('cornea_i', 'cornea_d')">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                           <div class="form-group col-md-6 first">
                                           <label for="cornea_d">Cornea derecha<span>*</span></label>
                                             <input type="text" id="cornea_d" name="cornea_d" required size="15" onkeypress="nextFocus('cornea_d', 'cristalino_i')">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                       
                                           
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6 first">
                                             <label for="cristalino_i" class="lblcor_i">Cristalino izquierdo<span>*</span></label>
                                             <input type="text" id="cristalino_i" name="cristalino_i" required size="15" onkeypress="nextFocus('cristalino_i', 'cristalino_d')">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                           <div class="form-group col-md-6 first">
                                             <label for="cristalino_d" class="lblcor_d">Cristalino derecho<span>*</span></label>
                                             <input type="text" id="cristalino_d" name="cristalino_d" required size="15" onkeypress="nextFocus('cristalino_d', 'fo_i')">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                           
                                      </div>
  
                                      <div class="form-row">
                                        <div class="form-group col-md-6 first">
                                             <label for="fo_i" class="lblcor_i">FO izquierdo<span>*</span></label>
                                             <input type="text" id="fo_i" name="fo_i" required size="15" onkeypress="nextFocus('fo_i', 'fo_d')">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                           <div class="form-group col-md-6 first">
                                             <label for="fo_d">FO derecho<span>*</span></label>
                                             <input type="text" id="fo_d" name="fo_d" required size="15">
                                             <div id="fname_error" class="val_error"></div>
                                           </div>
                                           
                                      </div>
                    
                              
                                  
                            </div>
                        </div>
                    </div>
                    </div>   
                  
              
                    <style>
  
  
  
                    </style>
  
  
              <div id="content3" class="content">
  
  <div class="titulo-i">
    <th>Refraccion Inicial</th>
</div>
  <table class="refracciones">
    <thead class="cabeza">
      <tr>
        <th class="indice"></th>
        <th class="th-refra">Esf</th> 
        <th class="th-refra">Cil</th> 
         <th class="th-refra">Eje</th>
           <th class="th-refra">Add</th>
            <th class="th-refra">AV Lejos</th>
            <th class="th-refra">AV Cerca</th>
      </tr>
    </thead>
    <tbody class="cuerpo">
    <tr>
      <td class="indices">D</td> 
      <td class="td-refra"><select name="esf_d" id="esf_d" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_d" id="cil_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_d" id="eje_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_d" id="add_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_d" id="av_lejos_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_d" id="av_cerca_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      </tr>
      <tr>
      <td class="indices">I</td>
      <td class="td-refra"><select name="esf_i" id="esf_i" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_i" id="cil_i" class="select-td">
                                                <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_i" id="eje_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_i" id="add_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_i" id="av_lejos_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_i" id="av_cerca_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
                                                    <select name="tipo" id="tipo" hidden>
                                                    <option value="Refraccion_Inicial"></option>
                                                    </select>
      </tr>
    </tbody>
  </table>
  
  <div class="titulo-o">
    <th>Refraccion Objetiva</th>
  </div>
  <table class="refracciones">
    <thead class="cabeza">
      <tr>
        <th class="indice"></th> 
        <th class="th-refra">Esf</th> 
        <th class="th-refra">Cil</th> 
         <th class="th-refra">Eje</th> 
          <th class="th-refra">Add</th> 
          <th class="th-refra">AV Lejos</th> 
          <th class="th-refra">AV Cerca</th>
      </tr>
    </thead>
    <tbody class="cuerpo">
    <tr>
      <td class="indices">D</td> 
      <td class="td-refra"><select name="esf_d_ob" id="esf_d_ob" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_d_ob" id="cil_d_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_d_ob" id="eje_d_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_d_ob" id="add_d_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_d_ob" id="av_lejos_d_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_d_ob" id="av_cerca_d_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      </tr>
      <tr>
      <td class="indices">I</td>
      <td class="td-refra"><select name="esf_i_ob" id="esf_i_ob" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_i_ob" id="cil_i_ob" class="select-td">
                                                <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_i_ob" id="eje_i_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_i_ob" id="add_i_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_i_ob" id="av_lejos_i_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_i_ob" id="av_cerca_i_ob" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
                                                    <select name="tipo_ob" id="tipo_ob" hidden>
                                                    <option value="Refraccion_Objetiva"></option>
                                                    </select>
      </tr>
    </tbody>
  </table>
  
  
   <!-- Refraccion Subjetiva  -->
  
  <div class="titulo-s">
    <th>Refraccion Subjetiva</th>
  </div>
  <table class="refracciones">
    <thead class="cabeza">
      <tr>
        <th class="indice"></th> 
        <th class="th-refra">Esf</th>
         <th class="th-refra">Cil</th>  
         <th class="th-refra">Eje</th> 
          <th class="th-refra">Add</th> 
          <th class="th-refra">AV Lejos</th>
          <th class="th-refra">AV Cerca</th>
      </tr>
    </thead>
    <tbody class="cuerpo">
      <tr>
      <td class="indices">D</td> 
      <td class="td-refra"><select name="esf_d_sub" id="esf_d_sub" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_d_sub" id="cil_d_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_d_sub" id="eje_d_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_d_sub" id="add_d_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_d_sub" id="av_lejos_d_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_d_sub" id="av_cerca_d_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      </tr>
      <tr>
      <td class="indices">I</td>
      <td class="td-refra"><select name="esf_i_sub" id="esf_i_sub" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra"><select name="cil_i_sub" id="cil_i_sub" class="select-td">
                                                <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="eje_i_sub" id="eje_i_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="add_i_sub" id="add_i_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_lejos_i_sub" id="av_lejos_i_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
      <td class="td-refra"><select name="av_cerca_i_sub" id="av_cerca_i_sub" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td>
                                                    <select name="tipo_sub" id="tipo_sub" hidden>
                                                    <option value="Refraccion_Subjetiva"></option>
                                                    </select>
      </tr>
    </tbody>
  </table>
  
   <!-- Receta Final  -->
  
  <div class="titulo-f">
    <th>Receta Final</th>
  </div>
  <table class="refraccion-f">
    <thead class="cabeza-f">
      <tr>
        <th class="indice-f"></th>
        <th class="th-refra-f">Esf</th>
         <th class="th-refra-f">Cil</th> 
          <th class="th-refra-f">Eje</th> 
           <th class="th-refra-f">Add</th>
            <th class="th-refra-f">AV (cc)</th>
             <th class="th-refra-f">DNP</th> 
             <th class="th-refra-f">Altura</th>
      </tr>
    </thead>
    <tbody class="cuerpo-f">
      <tr>
      <td class="indices-f">D</td>
      <td class="td-refra-f">
        <select name="esf_d_f" id="esf_d_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select>
                                                  </td> 
      <td class="td-refra-f"><select name="cil_d_f" id="cil_d_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="eje_d_f" id="eje_d_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="add_d_f" id="add_d_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="av_cc_d" id="av_cc_d" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra-f"><select name="dnp_d" id="dnp_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="altura_d" id="altura_d" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      </tr>
      <tr>
      <td class="indices-f">I</td>
      <td class="td-refra-f"><select name="esf_i_f" id="esf_i_f" class="select-td">
                                                  <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="cil_i_f" id="cil_i_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="eje_i_f" id="eje_i_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="add_i_f" id="add_i_f" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                    <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                    </select></td> 
      <td class="td-refra-f"><select name="av_cc_i" id="av_cc_i" class="select-td">
                                                      <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra-f"><select name="dnp_i" id="dnp_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
      <td class="td-refra-f"><select name="altura_i" id="altura_i" class="select-td">
                                                    <option value="-0.25">-0.25</option>
                                                      <option value="-0.50">-0.50</option>
                                                      <option value="-0.75">-0.75</option>
                                                      <option value="-100">-100</option>
                                                      <option value="+0.25">+0.25</option>
                                                      <option value="+0.50">+0.50</option>
                                                      <option value="+0.75">+0.75</option>
                                                      <option value="+100">+100</option>
                                                      </select></td> 
                                                      <select name="tipo_f" id="tipo_f" hidden>
                                                      <option value="Receta_Final"></option>
                                                      </select>
      </tr>
    </tbody>
  </table>
  
  <table class="cover-test">
    <thead class="cabeza-cover">
      <tr>
        <th class="th-cover">Cover Test / Movimientos oculares</th> 
      </tr>
    </thead>
    <tbody class="cuerpo-cover">
      <tr>
      <td class="td-cover"><textarea name="cover_test" id="cover_test" cols="" rows="" style="border: none;" class="area-cover" placeholder="Cover........."></textarea></td> 
      </tr>
    </tbody>
  </table>
  
  
  
  <table class="observaciones-clinicas">
    <thead class="cabeza-observaciones">
      <tr>
        <th class="th-observaciones">Observaciones Clinicas</th> 
      </tr>
    </thead>
    <tbody class="cuerpo-observaciones">
      <tr>
      <td class="td-observaciones"><textarea name="observaciones_clinicas" id="observaciones_clinicas" cols="40" rows="12" style="border: none;" class="area-observaciones" placeholder="Observaciones......" maxlength="103"></textarea></td> 
      </tr>
    </tbody>
  </table>
  
  <table class="distancias">
      <tr>
        <th class="th-distancias">Dist.Vert:</th> 
        <td class="td-distancias"><input type="text" name="dist_vert" id="dist_vert" style="text-align: center; border: 0;" size="10" required></td>
      </tr>
      <tr>
      <th class="th-distancias">Ang.Pant:</th>
      <td class="td-distancias"><input type="text" name="ang_pant" id="ang_pant" style="text-align: center; border:0;" size="10" required></td>
      </tr>
      <tr>
      <th class="th-distancias">Ang.Facial:</th>
      <td class="td-distancias"><input type="text" name="ang_facial" id="ang_facial" style="text-align: center; border:0;" size="10" required></td>
      </tr>
  </table>
  
  
                  
                
              <p></p>
              <center>
                <div class="todo2">
                      <label class="lbl">Distancia para que vea el paciente</label>
                      <p class="separa"></p>
                      <div class="d-lg-flex justify-content-between align-items-center pb-4">
                      <div class="size"><label class="lblradio"><input type="radio" name="radio" id="radio" value="30cm">30cm<span class="checkmark"></span></label></div>
                      <div class="size"><label class="lblradio"><input type="radio" name="radio" id="radio" value="40cm">40cm<span class="checkmark"></span></label></div>
                      <div class="size"><label class="lblradio"><input type="radio" name="radio" id="radio" value="50cm">50cm<span class="checkmark"></span></label></div>
                      </div>
                      </div> 
                      <center><label class="lbl">Diagnostico</label></center>
                                          <center><input type="text" name="diagnostico" id="diagnostico" class="aca" placeholder="Diagnostico: " required size="100"></center>
                                          <p></p>


                                          </div>

                                        
  
                                          <div id="content5" class="content">
                                          <div class="container">
                  <div class="row">
                      <div class="card d-flex justify-content-center mx-auto my-3 p-5" style="width: 90%;">
                          <center>
                            <h6 class="text-muted">OPTICAS MUNKEL</h6>
                          </center>
                          <center>
                            <h2>Ultimo Registro</h2>
                          </center>
                          <input type="text" size="35" hidden>
                          <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" id="lbLlaro">Aro<span>*</span></label>
                                       <select name="aro" id="aro"style="width: 700px; font-size:smaller; height: 25px; text-align:left" class="sucur">
<?php
//CODIGO PHP Y SQL PARA CARGAR LOS DATOS DE LOS AROS EN UN SELECT 
require('abrir.php');

$sql = "SELECT descrip FROM articulos";

$query = $conexion->query($sql);

while ($valores = mysqli_fetch_array($query)) {
   echo "<option value='" . $valores['descrip'] . "'>" . $valores['descrip'] . "</option>";
}

?>
</select>
                                    <div id="fname_error" class="val_error"></div>
                                  </div>   
                                </div>
                                <input type="text" size="35" hidden>
                          <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" id="lbLlentes">Lentes<span>*</span></label>
                                       <select name="len" id="len"style="width: 700px; font-size:smaller; height: 25px; text-align:left" class="sucur">
<?php
//CODIGO PHP Y SQL PARA CARGAR LOS DATOS DE LOS AROS EN UN SELECT 
require('abrir.php');

$sql = "SELECT descrip FROM lentes";

$query = $conexion->query($sql);

while ($valores = mysqli_fetch_array($query)) {
   echo "<option value='" . $valores['descrip'] . "'>" . $valores['descrip'] . "</option>";
}

?>
</select>
                                    <div id="fname_error" class="val_error"></div>
                                  </div>   
                                </div>
                                <input type="text" size="35" hidden>
                          <div class="form-row">
                                  <div class="form-group col-md-6 first">
                                       <label for="inputFirstName" id="lbltra">Tratamientos<span>*</span></label>
                                       <select name="tra" id="tra"style="width: 700px; font-size:smaller; height: 25px; text-align:left" class="sucur">
<?php
//CODIGO PHP Y SQL PARA CARGAR LOS DATOS DE LOS AROS EN UN SELECT 
require('abrir.php');

$sql = "SELECT Descripcion FROM tratamientos";

$query = $conexion->query($sql);

while ($valores = mysqli_fetch_array($query)) {
   echo "<option value='" . $valores['Descripcion'] . "'>" . $valores['Descripcion'] . "</option>";
}

?>
</select>                            
                                      <div id="fname_error" class="val_error"></div>
                                    </div>   
                                </div>
                                <p class="separa"></p>
                               
                           
                                  <button type="submit" class="btn1g" name="inicial">Guardar</button>
                                
                                    
                                  <button type="reset" class="btn1l" id="btn-reset" name="btn-reset">Limpiar</button>
                                    
                                    
                                     
                                </div>
                      </div>
                  </div>
              </div>
                                              </div>
              </div>
          </div>
      </div>

    </form>

    <!-- REFERENCIA AL JS DEL FRAMEPAGE-->
    <script src="main.js"></script>
     <!-- REFERENCIAS A BOOTSTRAP-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>
</html>


<?php
//FUNCION PHP PARA MANTENER LOS DATOS DESPUES DE ENVIAR EL FORMULARIO
 include("abrir.php");

function MantenerDatos($boton)
{
    $var1 = "";
 
    if (isset($_POST['inicial'])) {
 
        $var1 = $_POST[$boton];
 
    } else if (isset($_POST[null])) {
 
        echo 0;
 
    }
 
    return $var1;
}
 

?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  //SCRIPT PARA BORRAR CIERTOS CAMPOS DESPUES DE TOCAR BOTON LIMPIAR
    $("#btn-reset").on("click", function() {
        // Cancelar comportamiento normal del botón
        event.preventDefault();
        $('#nombre').val('');
        $('#edad').val('');
        $('#cedpaciente2').val('');
        $('#numero').val('');
        $('#direccion').val('');
        $('#email').val('');
        $('#ocupacion').val('');
        $('#fecha_nacimiento').val('');
        $('#salud_general').val('');
        $('#alergias').val('');
        $('#toma_medicamentos').val('');
        $('#tratamiento_oftalmologico').val('');
        $('#observaciones').val('');
        $('#ultimo_examen').val('');
        $('#motivo_consulta').val('');
        $('#sintomas_astenopticos').val('');
        $('#cornea_i').val('');
        $('#cornea_d').val('');
        $('#cristalino_i').val('');
        $('#cristalino_d').val('');
        $('#fo_i').val('');
        $('#fo_d').val('');
        $('#esf_d').val('');
        $('#esf_i').val('');
        $('#esf_d_ob').val('');
        $('#esf_i_ob').val('');
        $('#esf_d_sub').val('');
        $('#esf_i_sub').val('');
        $('#esf_d_f').val('');
        $('#esf_i_f').val('');
        $('#cil_d').val('');
        $('#eje_d').val('');
        $('#add_d').val('');
        $('#av_lejos_d').val('');
        $('#av_cerca_d').val('');
        $('#cil_i').val('');
        $('#eje_i').val('');
        $('#add_i').val('');
        $('#av_lejos_i').val('');
        $('#av_cerca_i').val('');
        $('#cil_d_ob').val('');
        $('#eje_d_ob').val('');
        $('#eje_i_ob').val('');
        $('#add_d_ob').val('');
        $('#av_lejos_d_ob').val('');
        $('#av_cerca_d_ob').val('');
        $('#cil_i_ob').val('');
        $('#add_i_ob').val('');
        $('#av_lejos_i_ob').val('');
        $('#av_cerca_i_ob').val('');
        $('#cil_d_sub').val('');
        $('#eje_d_sub').val('');
        $('#add_d_sub').val('');
        $('#av_lejos_d_sub').val('');
        $('#av_cerca_d_sub').val('');
        $('#cil_i_sub').val('');
        $('#eje_i_sub').val('');
        $('#add_i_sub').val('');
        $('#av_lejos_i_sub').val('');
        $('#av_cerca_i_sub').val('');
        $('#cil_d_f').val('');
        $('#eje_d_f').val('');
        $('#add_d_f').val('');
        $('#av_cc_d').val('');
        $('#dnp_d').val('');
        $('#altura_d').val('');
        $('#cil_i_f').val('');
        $('#eje_i_f').val('');
        $('#add_i_f').val('');
        $('#av_cc_i').val('');
        $('#dnp_i').val('');
        $('#altura_i').val('');
        $('#ang_pant').val('');
        $('#ang_facial').val('');
        $('#dist_vert').val('');
        $('#cover_test').val('');
        $('#observaciones_clinicas').val('');
        $('#aro').val('');
        $('#len').val('');
        $('#tra').val('');
        $('#cirugias_oculares').val('');
        $('#radio').val('');
    
    });
</script>