<!DOCTYPE html>
<?php
if (isset($_POST['imprimir'])) {

  include("abrir.php");
  require('fpdf/fpdf.php');

  $nombre = $_POST['nombre'];
  $cedula = $_POST['cedpaciente2'];
  $pro = $_POST['pro'];
  $aro = $_POST['aro'];


  ob_start();

  $pdf = new FPDF('P', 'mm', 'A4');
  $pdf->AddPage();



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


            $pdf->Cell(4, -5, "", 0, 0);
            $pdf->Cell(11, -15, "Nombre: ", 0, 0);
            $pdf->Cell(104, -15, " " . wordwrap(utf8_decode($row[2])), 0, 0);
            $pdf->Line(27, 34, 130, 34);
           
            $pdf->Cell(6, -15, "Edad: ", 0, 0);
            $pdf->Cell(58, -15, "   " . $row[3], 0, 1);
            $pdf->Line(139, 34, 200, 34);
            

            $pdf->Ln(8);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(8, 9, "Email: ", 0, 0);
            $pdf->Cell(107, 9, " " . wordwrap(utf8_decode($row[5])), 0, 0);
            $pdf->Line(24, 39, 130, 39);
            

            $pdf->Cell(11, 9, "Numero: ", 0, 0);
            $pdf->Cell(103, 9, " " . $row[4], 0, 1);
            $pdf->Line(142, 39, 200, 39);
            
            $pdf->Ln(8);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(14, -15, "Ocupacion: ", 0, 0);
            $pdf->Cell(101, -15, " " . wordwrap(utf8_decode($row[6])), 0, 0);
            $pdf->Line(30, 44, 130, 44);
            
            $pdf->Cell(10, -15, "Cedula: ", 0, 0);
            $pdf->Cell(58, -15, " " . $row[7], 0, 1);
            $pdf->Line(141, 44, 200, 44);
            
            $pdf->Ln(8);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(23, 9, "Fecha Nacimiento: ", 0, 0);
            $pdf->Cell(92, 9, " " . str_replace('-', '/', date('d/m/Y', strtotime($row[9]))), 0, 0);
            $pdf->Line(39, 49, 130, 49);
            $pdf->Cell(12, 9, "Sucursal: ", 0, 0);
            $pdf->Cell(66, 9, " " . wordwrap(utf8_decode(str_replace('_', ' ', strtoupper($row[10])))), 0, 1);
            $pdf->Line(200, 49, 142, 49);
            $pdf->Ln(8);


            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(12.5, -15, "Direccion: ", 0, 0);
            $pdf->Cell(85, -15, " " . wordwrap(utf8_decode($row[8])), 0, 0);
            $pdf->Line(29, 55, 200, 55);
            $pdf->Ln(-2);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(180, 5, "ANTECEDENTES:", 0, 1, 'C');
            $pdf->SetFont('Arial', '', '8');
            $pdf->Ln(7);

            $pdf->Cell(4, -6, "", 0, 0);
            $pdf->Cell(19, -6, "Salud General: ", 0, 0);
            $pdf->Cell(96, -6, " " . wordwrap(utf8_decode($row3[0])), 0, 0);
            $pdf->Line(34, 69, 130, 69);
            $pdf->Cell(10, -6, "Alergias: ", 0, 0);
            $pdf->Cell(58, -6, "   " . wordwrap(utf8_decode($row3[1])), 0, 1);
            $pdf->Line(142, 69, 200, 69);
            $pdf->Ln(8);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(27, 1, "Toma Medicamentos: ", 0, 0);
            $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row3[2])), 0, 0);
            $pdf->Line(40, 74, 130, 74);
            $pdf->Cell(43, 1, "Esta en tratamiento oftalmologico: ", 0, 0);
            $pdf->Line(174, 74, 200, 74);
            $pdf->Cell(58, 1, " " . wordwrap(utf8_decode($row3[4])), 0, 1);

            $pdf->Ln(8);


            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(23, -7, "Cirugias Oculares: ", 0, 0);
            $pdf->Cell(92, -7, " " . wordwrap(utf8_decode($row3[3])), 0, 0);
            $pdf->Line(39, 79, 130, 79);
            $pdf->Cell(20, -7, "Ultimo Examen: ", 0, 0);
            $pdf->Cell(58, -7, " " . str_replace('-', '/', date('d/m/Y', strtotime($row3[7]))), 0, 1);
            $pdf->Line(151, 79, 200, 79);
            $pdf->Ln(8);

            $pdf->Cell(4, 1, "", 0, 0);
            $pdf->Cell(20, 1, "Observaciones: ", 0, 0);
            $pdf->Cell(83, 1, " " . wordwrap(utf8_decode($row3[5])), 0, 0);
            $pdf->Line(35, 84, 200, 84);
            $pdf->Cell(1, 1, "", 0, 1);
            $pdf->Ln(8);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(24, -7, "Motivo de consulta: ", 0, 0);
            $pdf->Cell(73, -7, " " . wordwrap(utf8_decode($row3[6])), 0, 0);
            $pdf->Line(40, 89, 200, 89);
            $pdf->Ln(10);

            $pdf->Cell(4, 5, "", 0, 0);
            $pdf->Cell(30, -17, "Sintomas Astenopticos: ", 0, 0);

            $pdf->Cell(58, -17, " " . wordwrap(utf8_decode($row3[8])), 0, 1);
            $pdf->Line(45, 94, 200, 94);
            $pdf->Ln(15);



            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(180, 5, "EXAMEN EXTERNO:", 0, 1, 'C');
            $pdf->SetFont('Arial', '', '8');
            $pdf->Ln(3);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "Cornea", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->SetFont('Arial', '', '8');
            $pdf->Cell(35, -5, " " . wordwrap(utf8_decode($row4[0])), 0, 0, 'C');
            $pdf->Line(50, 111, 85, 111);
            $pdf->Cell(30, -5, " ", 0, 0);
            $pdf->Cell(37, -5, "   " . wordwrap(utf8_decode($row4[1])), 0, 1, 'C');
            $pdf->Line(115, 111, 152, 111);
            $pdf->Ln(8);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "Cristalino", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->SetFont('Arial', '', '8');
            $pdf->Cell(35, -5, " " . wordwrap(utf8_decode($row4[2])), 0, 0, 'C');
            $pdf->Line(50, 120, 85, 120);
            $pdf->Cell(30, -5, " ", 0, 0);
            $pdf->Cell(37, -5, "   " . wordwrap(utf8_decode($row4[3])), 0, 1, 'C');
            $pdf->Line(115, 120, 152, 120);

            $pdf->Ln(8);

            $pdf->SetFont('Arial', 'B', '8');
            $pdf->Cell(5, 5, "", 0, 0);
            $pdf->Cell(170, 5, "FO", 0, 1, 'C');
            $pdf->Cell(50, 5, "", 0, 0);
            $pdf->Cell(-10, -5, " ", 0, 0);
            $pdf->SetFont('Arial', '', '8');
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
              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->Cell(4, 5, "", 0, 0);
              $pdf->Cell(19, 5, "Diagnostico: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->Cell(105, 5, " " . wordwrap(utf8_decode($row2[0])), 0, 0);
              $pdf->Line(34, 258, 200, 258);



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
                $pdf->SetXY(145, 249);
                $pdf->Cell(40, 7, "Distancia requerida para ver de cerca: ", 0, 0, 'C');
                $pdf->SetXY(190, 250);
                $pdf->SetFont('Arial', '', '8');
                $pdf->Cell(10, 5, $campo5['distancia_vista'], 0, 0, 'C');

                $pdf->SetXY(13, 269.5);
                $pdf->SetFont('Arial', '', '12');
                $pdf->SetTextColor(192, 57, 43);
                $pdf->Cell(160, 5, "", 0, 0);
                $pdf->Cell(9, 7, wordwrap(utf8_decode("Nº: ")), 0, 0);
                $pdf->Cell(52, 7, " " . $row[0], 0, 0);
              }

              $pdf->AddPage();

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

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(85, 22);
              $pdf->Cell(20, 20, "REGISTRO FINAL: ", 0, 0);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 30);
              $pdf->Cell(20, 20, "NOMBRE DEL PACIENTE: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(42, 39.5);
              $pdf->Cell(88, 1, " " . strtoupper(wordwrap(utf8_decode($row[2]))), 0, 0);
              $pdf->Line(43, 42, 200, 42);
            

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 40);
              $pdf->Cell(20, 20, "No.IDENTIFICACION: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(35, 49.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row[7])), 0, 0);
              $pdf->Line(36, 52, 200, 52);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 50);
              $pdf->Cell(20, 20, "No.TELEFONICO: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(31, 59.5);
              $pdf->Cell(88, 1, " " . $row[4], 0, 1);
              $pdf->Line(32, 62, 200, 62);


              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 60);
              $pdf->Cell(20, 20, "SUCURSAL: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(23, 69.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode(str_replace('_', ' ', strtoupper($row[10])))), 0, 1);
              $pdf->Line(24, 72, 200, 72);



              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 70);
              $pdf->Cell(20, 20, "NOMBRE DEL OPTOMETRISTA: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(50, 79.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row5[1])), 0, 0);
              $pdf->Line(51, 82, 200, 82);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 80);
              $pdf->Cell(20, 20, "CODIGO: ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(18, 89.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($row5[0])), 0, 0);
              $pdf->Line(19, 92, 200, 92);


              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 90);
              $pdf->Cell(20, 20, "ARO:  ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(16, 99.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($campo['aro'])) . "-" . ($row6[0]), 0, 0);
              $pdf->Line(17, 102, 200, 102);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 100);
              $pdf->Cell(20, 20, "LENTES:  ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(20, 109.5);
              $pdf->Cell(88, 1, " " . strtoupper(wordwrap(utf8_decode($campo['lentes']))), 0, 0);
              $pdf->Line(21, 112, 200, 112);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(4, 110);
              $pdf->Cell(20, 20, "TRATAMIENTO:  ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(27, 119.5);
              $pdf->Cell(88, 1, " " . wordwrap(utf8_decode($campo['ar_ultra'])), 0, 0);
              $pdf->Line(28, 122, 200, 122);


              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(30, 230);
              $pdf->Cell(20, 20, "FIRMA PACIENTE:  ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(27, 99.5);

              $pdf->Line(20, 264, 70, 264);
              $pdf->SetFont('Arial', 'B', '7');
              $pdf->Ln(15);
              $pdf->Cell(20, 2, "", 0, 0);

              $pdf->SetFont('Arial', 'B', '8.5');
              $pdf->SetXY(165, 230);
              $pdf->Cell(20, 20, "FIRMA DR:  ", 0, 0);
              $pdf->SetFont('Arial', '', '8.5');
              $pdf->SetXY(27, 99.5);

              $pdf->Line(150, 264, 200, 264);
              $pdf->SetFont('Arial', 'B', '7');
              $pdf->Ln(15);
              $pdf->Cell(150, 2, "", 0, 0);

              $pdf->SetXY(13, 269.5);
              $pdf->SetFont('Arial', '', '12');
              $pdf->SetTextColor(192, 57, 43);
              $pdf->Cell(160, 5, "", 0, 0);
              $pdf->Cell(9, 7, wordwrap(utf8_decode("Nº: ")), 0, 0);
              $pdf->Cell(52, 7, " " . $row[0], 0, 0);
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
    background-color: whitesmoke;
    border: none;
    color: #00557F;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    width: 70px;
    height: 40px;
    transition: all 0.5s;
    cursor: pointer;
    margin: -10px 10px 20px 200px;

  }

  .btn1l {
    display: inline-block;
    border-radius: 4px;
    background-color: whitesmoke;
    border: none;
    color: #00557F;
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    width: 70px;
    height: 40px;
    transition: all 0.5s;
    cursor: pointer;
    margin: -10px 10px 20px 10px;

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
    cursor: auto;
    outline: 0;
    background: #0a4f77;
    color: white;
  }

  .cover_obser {
    width: 700px;
    height: 100px;
    text-align: center;
    border: 0;
    cursor: auto;

  }

  .radio {
    border-radius: 1000px;
    width: 20%;
    margin: auto;
    text-align: center;
    border: 0;
    cursor: auto;
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
    border: 1px solid #EDEDED;
    height: 29px;
    width: 500px;
    color: #0a4f77;
    background: white;
  }

  .td-distancias {
    border: 1px solid #EDEDED;
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

  .sucurpro {
    color: #0a4f77;
    cursor: auto;
    outline: 0;
    border: 0;
    margin: -70px 0px 0px 40px;
    background: transparent;

  }

  .profe {
    margin: -530px 0px 0px -80px;
    background: transparent;
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

  <div class="img"><a href="add-info.php"><img src="../imgs/munke.png" alt="" width="20%"></a></div>


  <form method="POST">
    <div class="segundo">
      <div class="form-row">
        <div class="form-group col-md-6 first">
          <label for="nombre" class="lblnom">Nombre Completo<span>*</span></label>
          <input type="text" id="nombre" name="nombre" maxlength="40" class="nom" required size="35" onkeypress="nextFocus('nombre', 'cedpaciente2')" value=<?php echo MantenerDatos("nombre") ?>>
          <div id="fname_error" class="val_error"></div>
        </div>
        <div class="form-group col-md-6 first">
          <label for="inputFirstName" class="lblced">Cedula<span>*</span></label>
          <div class="age"><input type="text" id="cedpaciente2" maxlength="10" name="cedpaciente2" class="ced" required size="12" value=<?php echo MantenerDatos("cedpaciente2") ?>></div>
          <div id="fname_error" class="val_error"></div>
        </div>

        <!--<a href="add-info.php"><label for="" class="volver">Volver</a></label>-->
      </div>
      <div class="form-row">
        <div class="form-group col-md-6 first">
          <button type="submit" class="btn1g" name="buscar">Buscar</button>
          <div id="fname_error" class="val_error"></div>
        </div>
        <div class="form-group col-md-6 first">
          <button type="submit" class="btn1l" name="imprimir">Imprimir</button>
          <div id="fname_error" class="val_error"></div>
        </div>
      </div>



    </div>



    <?php
    if (isset($_POST["buscar"])) {
      include("abrir.php");


      $cedula = $_POST['cedpaciente2'];
      $nombre = $_POST['nombre'];

      $paciente = "SELECT nombre,edad,email,numero,ocupacion,cedula,direccion,fecha_nacimiento,sucursal,codigo_tratamiento,fecha_tratamiento,profesional from paciente where nombre like '%" . $nombre . "%' and cedula = '" . $cedula . "'";
      $sql = mysqli_query($conexion, $paciente);

      $antecedentes = "SELECT salud_general,alergias,toma_medicamentos,cirugias_oculares,tratamiento_oftalmologico,observaciones,motivo_consulta,ultimo_examen,sintomas_astenopticos from antecedentes a inner join paciente p on p.codigo_tratamiento = a.codigo_trata_antecedentes where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql7 = mysqli_query($conexion, $antecedentes);

      $examen = "SELECT cornea_i,cornea_d,cristalino_i,cristalino_d,fo_i,fo_d from examen_externo e inner join paciente p on p.codigo_tratamiento = e.codigo_trata_examen where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql8 = mysqli_query($conexion, $examen);

      $receta = "SELECT esf_d_f,cil_d_f,eje_d_f,add_d_f,av_cc_d,dnp_d,altura_d,esf_i_f,cil_i_f,eje_i_f,add_i_f,av_cc_i,dnp_i,altura_i,diagnostico,aro,lentes,ar_ultra from lensometria_receta_final f inner join paciente p on f.codigo_trata_f = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql2 = mysqli_query($conexion, $receta);

      $receta_ini = "SELECT esf_d,cil_d,eje_d,add_d,av_lejos_d,av_cerca_d,esf_i,cil_i,eje_i,add_i,av_lejos_i,av_cerca_i from lensometria_inicial i inner join paciente p on i.codigo_trata = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql3 = mysqli_query($conexion, $receta_ini);

      $receta_ob = "SELECT esf_d_ob,cil_d_ob,eje_d_ob,add_d_ob,av_lejos_d_ob,av_cerca_d_ob,esf_i_ob,cil_i_ob,eje_i_ob,add_i_ob,av_lejos_i_ob,av_cerca_i_ob from lensometria_objetiva o inner join paciente p on o.codigo_trata_ob = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql4 = mysqli_query($conexion, $receta_ob);

      $receta_sub = "SELECT esf_d_sub,cil_d_sub,eje_d_sub,add_d_sub,av_lejos_d_sub,av_cerca_d_sub,esf_i_sub,cil_i_sub,eje_i_sub,add_i_sub,av_lejos_i_sub,av_cerca_i_sub from lensometria_subjetiva s inner join paciente p on s.codigo_trata_sub = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql5 = mysqli_query($conexion, $receta_sub);

      $receta_lensometria = "SELECT dist_vert,ang_pant,ang_facial,cover_test,observaciones_clinicas,distancia_vista from lensometria l inner join paciente p on l.codigo_trata_lensometria = p.codigo_tratamiento where p.nombre like '%" . $nombre . "%' and p.cedula = '" . $cedula . "'";
      $sql6 = mysqli_query($conexion, $receta_lensometria);



      if ($row = mysqli_fetch_row($sql)) {
        if ($row2 = mysqli_fetch_row($sql2)) {
          if ($row3 = mysqli_fetch_row($sql3)) {
            if ($row4 = mysqli_fetch_row($sql4)) {
              if ($row5 = mysqli_fetch_row($sql5)) {
                if ($row6 = mysqli_fetch_row($sql6)) {
                  if ($row7 = mysqli_fetch_row($sql7)) {
                    if ($row8 = mysqli_fetch_row($sql8)) {

                      echo '
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
                               <center><h6 class="text-muted">OPTICAS MUNKEL</h6></center>
                               <center><h2>Registro Paciente</h2></center>
                               <input type="text"  size="35" hidden>
                                   <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName">Nombre Completo<span>*</span></label>
                                            <input type="text" id="nombre2" name="nombre2" required size="35"  value="' . $row[0] . '"; readonly>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" class="lbledad">Edad<span>*</span></label>
                                            <div class="age"><input type="text" id="edad" name="edad" required size="12"  value="' . $row[1] . '"; readonly></div>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          
                                     </div>
                                     <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName">Email<span>*</span></label>
                                            <input type="email" id="email" name="email" required size="35"  value="' . $row[2] . '"; readonly>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" class="lbledad">Numero<span>*</span></label>
                                            <div class="age"><input type="text" id="numero" name="numero" required size="12"  value="' . $row[3] . '"; readonly></div>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          
                                     </div>
                                     <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName">Ocupacion<span>*</span></label>
                                            <input type="text" id="ocupacion" name="ocupacion" required size="35" value="' . $row[4] . '"; readonly>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" class="lbledad">Cedula<span>*</span></label>
                                            <div class="age"><input type="text" id="cedpaciente22" name="cedpaciente22" required size="12"  value="' . $row[5] . '"; readonly></div>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          
                                     </div>
                   
                                     <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName">Direccion<span>*</span></label>
                                            <input type="text" id="direccion" name="direccion" required size="35"  value="' . $row[6] . '"; readonly>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                          <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" class="lbledad">Fecha Nac<span>*</span></label>
                                            <div class="age"><input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required size="4"  value="' . $row[7] . '"; readonly></div>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>
                                     </div>
                                     <div class="form-row">
                                     <div class="form-group col-md-6 first">
                                          <label for="inputFirstName">Sucursal<span>*</span></label>
                                          <input type="text" id="sucursal" name="sucursal" size="35" value="' . str_replace('_', ' ', strtoupper($row[8])) . '" readonly>
                                          <div id="fname_error" class="val_error"></div>
                                        </div>  
                                        <div class="form-group col-md-6 first">
                                        <label for="inputFirstName" class="lbledad">Fecha Tratamiento<span>*</span></label>
                                        <div class="age"><input type="text"  size="12" value="' . date('d/m/Y', strtotime($row[10])) . '" readonly></div>
                                        <div id="fname_error" class="val_error"></div>
                                      </div> 
                                 </div>

                                 <div class="form-row">
                                 <div class="form-group col-md-6 first">
                                 <div class="profe"><input type="text" id="pro" name="pro" required  value="' . str_replace('_', ' ', $row[11]) . '"; readonly class="sucurpro" size="55">
                                   <div id="fname_error" class="val_error"></div>
                                    </div>
                                  </div>
                               </div>  


                                 
                                 
                                 <input value="' . "Nº: " . $row[9] . '" class="codigo">
                                    
                           </div>
                       </div>
                   </div>
                   </div>
                       
                 
                   
                   
            <div id="content2" class="content">
            <div class="container">
              <div class="row">
                  <div class="card d-flex justify-content-center mx-auto my-3 p-5">
                      <center><h6 class="text-muted">OPTICAS MUNKEL</h6></center>
                      <center><h2>Antecedentes</h2></center>
                  
                          <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Salud General<span>*</span></label>
                                   <input type="text" id="salud_general" name="salud_general" size="53" value="' . $row7[0] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div> 
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Alergias<span>*</span></label>
                                   <input type="text" id="alergias" name="alergias" size="53" value="' . $row7[1] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Toma Medicamenos<span>*</span></label>
                                   <input type="text" id="toma_medicamentos" name="toma_medicamentos" size="53" value="' . $row7[2] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                                 
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Cirugias Oculares<span>*</span></label>
                                   <input type="text" id="cirugias_oculares" name="cirugias_oculares" size="53" value="' . $row7[3] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                              </div>
          
                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Observaciones<span>*</span></label>
                                   <input type="text" id="observaciones" name="observaciones" size="53" value="' . $row7[5] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Esta en tratamiento oftalmologico<span>*</span></label>
                                   <p class="separador"></p>
                                   <input type="text" id="tratamiento_oftalmologico" name="tratamiento_oftalmologico" size="35" value="' . $row7[4] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                                 <div class="form-group col-md-6 first">
                                   <label for="inputFirstName" class="lbledad">Ultimo Examen<span>*</span></label>
                                   <div class="age"><input type="date" id="ultimo_examen" name="ultimo_examen" size="30" value="' . $row7[7] . '" readonly></div>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Motivo de Consulta<span>*</span></label>
                                   <input type="text" id="motivo_consulta" name="motivo_consulta" size="53" value="' . $row7[6] . '" readonly>
                                   <div id="fname_error" class="val_error"></div>
                                 </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6 first">
                                   <label for="inputFirstName">Sintomas Astenopticos<span>*</span></label>
                                   <input type="text" id="sintomas_astenopticos" name="sintomas_astenopticos" size="53" value="' . $row7[8] . '" readonly>
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
                             <center><h6 class="text-muted">OPTICAS MUNKEL</h6></center>
                              <center><h2>Examen Externo</h2></center>
                                  <div class="form-row">
                                      <div class="form-group col-md-6 first">
                                      <label for="cornea_i"  class="lblcor_i">Cornea izquierda<span>*</span></label> 
                                           <input type="text" id="cornea_i" name="cornea_i" size="15" value="' . $row8[0] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                         <div class="form-group col-md-6 first">
                                         <label for="cornea_d">Cornea derecha<span>*</span></label>
                                           <input type="text" id="cornea_d" name="cornea_d" size="15" value="' . $row8[1] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                     
                                         
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6 first">
                                           <label for="cristalino_i" class="lblcor_i">Cristalino izquierdo<span>*</span></label>
                                           <input type="text" id="cristalino_i" name="cristalino_i" size="15" value="' . $row8[2] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                         <div class="form-group col-md-6 first">
                                           <label for="cristalino_d" class="lblcor_d">Cristalino derecho<span>*</span></label>
                                           <input type="text" id="cristalino_d" name="cristalino_d" size="15" value="' . $row8[3] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                         
                                    </div>

                                    <div class="form-row">
                                      <div class="form-group col-md-6 first">
                                           <label for="fo_i"  class="lblcor_i">FO izquierdo<span>*</span></label>
                                           <input type="text" id="fo_i" name="fo_i" size="15" value="' . $row8[4] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                         <div class="form-group col-md-6 first">
                                           <label for="fo_d">FO derecho<span>*</span></label>
                                           <input type="text" id="fo_d" name="fo_d" size="15" value="' . $row8[5] . '" readonly>
                                           <div id="fname_error" class="val_error"></div>
                                         </div>
                                         
                                    </div>
                  
                            
                                
                          </div>
                      </div>
                  </div>
                  </div>   
       
       
                  <div id="content3" class="content">
                  <div class="titulo-i"><th>Refraccion Inicial</th></div>
                  <table class="refracciones">
                    <thead class="cabeza">
                      <tr>
                        <th class="indice"></th> <th class="th-refra">Esf</th> <th class="th-refra">Cil</th>  <th class="th-refra">Eje</th>  <th class="th-refra">Add</th> <th class="th-refra">AV Lejos</th> <th class="th-refra">AV Cerca</th>
                      </tr>
                    </thead>
                    <tbody class="cuerpo">
                    <tr>
                    <td class="indices">D</td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row3[0] . '" size="2" readonly></td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row3[1] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[2] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[3] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[4] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[5] . '" size="2" readonly></td>
                    </tr>
                    <tr>
                    <td class="indices">I</td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[6] . '" size="2" readonly></td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row3[7] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[8] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[9] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[10] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row3[11] . '" size="2" readonly></td>
                    </tbody>
                  </table>
                  
                  <div class="titulo-o"><th>Refraccion Objetiva</th></div>
                  <table class="refracciones">
                    <thead class="cabeza">
                      <tr>
                        <th class="indice"></th> <th class="th-refra">Esf</th> <th class="th-refra">Cil</th>  <th class="th-refra">Eje</th>  <th class="th-refra">Add</th> <th class="th-refra">AV Lejos</th> <th class="th-refra">AV Cerca</th>
                      </tr>
                    </thead>
                    <tbody class="cuerpo">
                    <tr>
                    <td class="indices">D</td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row4[0] . '" size="2" readonly></td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row4[1] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[2] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[3] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[4] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[5] . '" size="2" readonly></td>
                    </tr>
                    <tr>
                    <td class="indices">I</td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[6] . '" size="2" readonly></td> 
                    <td class="td-refra"><input class="sinborde" value="' . $row4[7] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[8] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[9] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[10] . '" size="2" readonly></td>
                    <td class="td-refra"><input class="sinborde" value="' . $row4[11] . '" size="2" readonly></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  
                   <!-- Refraccion Subjetiva  -->
                  
                  <div class="titulo-s"><th>Refraccion Subjetiva</th></div>
                  <table class="refracciones">
                    <thead class="cabeza">
                      <tr>
                        <th class="indice"></th> <th class="th-refra">Esf</th> <th class="th-refra">Cil</th>  <th class="th-refra">Eje</th>  <th class="th-refra">Add</th> <th class="th-refra">AV Lejos</th> <th class="th-refra">AV Cerca</th>
                      </tr>
                    </thead>
                    <tbody class="cuerpo">
                      <tr>
                      <td class="indices">D</td> 
                      <td class="td-refra"><input class="sinborde" value="' . $row5[0] . '" size="2" readonly></td> 
                      <td class="td-refra"><input class="sinborde" value="' . $row5[1] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[2] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[3] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[4] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[5] . '" size="2" readonly></td>
                      </tr>
                      <tr>
                      <td class="indices">I</td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[6] . '" size="2" readonly></td> 
                      <td class="td-refra"><input class="sinborde" value="' . $row5[7] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[8] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[9] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[10] . '" size="2" readonly></td>
                      <td class="td-refra"><input class="sinborde" value="' . $row5[11] . '" size="2" readonly></td>
                                                                  
                      </tr>
                    </tbody>
                  </table>
                  
                   <!-- Receta Final  -->
                  
                  <div class="titulo-f"><th>Receta Final</th></div>
                  <table class="refraccion-f">
                    <thead class="cabeza-f">
                      <tr>
                        <th class="indice-f"></th><th class="th-refra-f">Esf</th> <th class="th-refra-f">Cil</th>  <th class="th-refra-f">Eje</th>  <th class="th-refra-f">Add</th> <th class="th-refra-f">AV (cc)</th> <th class="th-refra-f">DNP</th> <th class="th-refra-f">Altura</th>
                      </tr>
                    </thead>
                    <tbody class="cuerpo-f">
                      <tr>
                      <td class="indices-f">D</td>
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[0] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[1] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[2] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[3] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[4] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[5] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[6] . '" size="2" readonly></td> 
                      </tr>
                      <tr>
                      <td class="indices-f">I</td>
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[7] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[8] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[9] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[10] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[11] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[12] . '" size="2" readonly></td> 
                      <td class="td-refra-f"><input class="sinborde" value="' . $row2[13] . '" size="2" readonly></td>                            
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
                      <td class="td-cover"><textarea cols="" rows="" readonly class="area-cover" style="border: none;" readonly >' . $row6[3] . '</textarea></textarea></td> 
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
                      <td class="td-observaciones"><textarea cols="" rows="" readonly class="area-observaciones" style="border: none;" readonly>' . $row6[4] . '</textarea></textarea></td> 
                      </tr>
                    </tbody>
                  </table>
                  
                  <table class="distancias">
                      <tr>
                        <th class="th-distancias">Dist.Vert:</th> 
                        <td class="td-distancias"><input type="text" name="dist_vert" style="text-align: center;" value="' . $row6[0] . '" class="sinborde" readonly></td>
                      </tr>
                      <tr>
                      <th class="th-distancias">Ang.Pant:</th>
                      <td class="td-distancias"><input type="text" name="dist_vert" style="text-align: center;" value="' . $row6[1] . '" class="sinborde" readonly></td>
                      </tr>
                      <tr>
                      <th class="th-distancias">Ang.Facial:</th>
                      <td class="td-distancias"><input type="text" name="dist_vert" style="text-align: center;" value="' . $row6[2] . '" class="sinborde" readonly></td>
                      </tr>
                  </table>
                  
                  
                                  
                                
                              <p></p>
                              <center><div class="todo2">
                              <label class="lbl">Distancia para que vea el paciente</label>
                              <div class="d-lg-flex justify-content-between align-items-center pb-4">
                             <input type="text" value="' . $row6[5] . '" readonly class="radio">
                              </div>
                              </div> 
                                      <center><label class="lbl">Diagnostico</label></center>
                                                          <center><input style="text-align: center;" type="text" name="diagnostico" class="aca" placeholder="Diagnostico: " required size="100"  value="' . $row2[14] . '" readonly></center>
                                                          <p></p>
                                                          </div>

       
                                               <div id="content5" class="content">
                                               <div class="container">
                       <div class="row">
                           <div class="card d-flex justify-content-center mx-auto my-3 p-5" style="width: 90%;">
                               <center><h6 class="text-muted">OPTICAS MUNKEL</h6></center>
                               <center><h2>Ultimo Registro</h2></center>
                               <input type="text"  size="35" hidden>
                               <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" id="lblaro">Aro<span>*</span></label>
                                            <input type="text" id="aro" name="aro" required style="width: 780px; font-size:smaller; height: 25px; text-align:center;" value="' . $row2[15] . '" readonly >
                                            <div id="fname_error" class="val_error"></div>
                                          </div>   
                                     </div>
                                     <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" id="lblaro">Lentes<span>*</span></label>
                                            <input type="text" id="lentes" name="lentes" required size="93" style="text-align: center;" value="' . $row2[16] . '" readonly >
                                            <div id="fname_error" class="val_error"></div>
                                          </div>   
                                     </div>
                                     <div class="form-row">
                                       <div class="form-group col-md-6 first">
                                            <label for="inputFirstName" id="lblaro">Tratamientos<span>*</span></label>
                                            <input type="text" id="ar_ultra" name="ar_ultra" required size="93" style="text-align: center;" value="' . $row2[17] . '" readonly>
                                            <div id="fname_error" class="val_error"></div>
                                          </div>   
                                     </div> 
                                     <p class="separa"></p>
                                        
                                     </div>
                           </div>
                       </div>
                   </div>
                                                   </div>
                   </div>
               </div>
           </div>
           
           ';
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    ?>



    <script src="main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <select name="" id="" hidden>
      <?php
      $cedula = $_POST['cedpaciente2'];
      $nombre = $_POST['nombre'];
      $pro = $_POST['pro'];
      ?>
    </select>
    <?php
    include("abrir.php");

    function MantenerDatos($boton)
    {
      $var1 = "";

      if (isset($_POST['buscar'])) {

        $var1 = $_POST[$boton];
      } else if (isset($_POST[null])) {

        echo 0;
      }

      return $var1;
    }


  ?>
</body>

</html>