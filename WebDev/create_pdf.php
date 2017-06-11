<?php
session_start(); 
require('/fpdf181/fpdf.php');
require_once('/FPDI-1.6.2/fpdi.php');
require '/PHPMailer-master/PHPMailerAutoload.php';
class ConcatPdf extends FPDI
{
	public $files = array();

	public function setFiles($files)
	{
		$this->files = $files;
	}
	public function concat()
	{
		foreach($this->files AS $file) {
			$pageCount = $this->setSourceFile($file);
			for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
				$tplIdx = $this->ImportPage($pageNo);
				$s = $this->getTemplatesize($tplIdx);
				$this->AddPage($s['w'] > $s['h'] ? 'L' : 'P', array($s['w'], $s['h']));
				$this->useTemplate($tplIdx);
			}
		}
	}
}

$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$projectID=$_SESSION["projectID"];
$sql = "SELECT DISTINCT projects.teacher as teacher, project_confirms.teacher as teacher1,projectname,student1,student2,student3,grade FROM projects,project_confirms WHERE projects.projectID='$projectID' AND project_confirms.project=projects.projectID ";
$result = $conn->query($sql);
$x=0;
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$teacher=$row["teacher"];
		$projectname=$row["projectname"];
		$student1=$row["student1"];
		$student2=$row["student2"];
		$student3=$row["student3"];
		$teachers[$x]=$row["teacher1"];
		$grade=$row["grade"];
		$x++;
	}
}
$pdf = new ConcatPdf();
$pdf->setFiles(array('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\NickFourtounisCV.pdf', 'C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\analytiki vathmologia (1).pdf'));
//$pdf->concat();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 34);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(55, 30);
$pdf->Write(0, $projectname);
$pdf->SetFont('Helvetica','U',20);
$pdf->SetXY(10, 50);
$pdf->Write(0, 'Teacher:');
$pdf->SetFont('Helvetica',null,20);
$pdf->SetXY(15, 60);
$pdf->Write(0, $teacher);
$pdf->SetXY(10, 70);
$pdf->SetFont('Helvetica','U',20);
$pdf->Write(0, 'Commision:');
$pdf->SetFont('Helvetica',null,20);
$pdf->SetXY(15, 80);
$pdf->Write(0, $teachers[0]);
$pdf->SetXY(15, 90);
$pdf->Write(0, $teachers[1]);
$pdf->SetXY(15, 100);
$pdf->Write(0, $teachers[2]);
$pdf->SetFont('Helvetica','U',20);
$pdf->SetXY(120, 50);
$pdf->Write(0, 'Students:');
$pdf->SetFont('Helvetica',null,20);
$pdf->SetXY(125, 60);
$pdf->Write(0, $student1);
if($student2!='empty'){
	$pdf->SetXY(125, 70);
	$pdf->Write(0, $student2);
}
if($student3!='empty'){
	$pdf->SetXY(125, 80);
	$pdf->Write(0, $student3);
}
$pdf->SetFont('Helvetica','U',20);
$pdf->SetXY(10, 120);
$pdf->Write(0, 'Final Grade:');
$pdf->SetFont('Helvetica',null,20);
$pdf->SetXY(55, 120);
$pdf->Write(0, $grade);

$pdf->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature1.png',65,57,-300);
$pdf->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature2.png',65,77,-300);
$pdf->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature3.png',65,87,-300);
$pdf->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature4.jpg',65,97,-300);
$pdf->Output('F','finalpdf/'.$projectname.'.pdf', 'I');
$pdf->Output();

$mail = new PHPMailer;     
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = TRUE; 
$mail->Username = 'skpa3201@gmail.com';
$mail->Password = '%Z57y0@3'; 
$mail->Port = 25;

$mail->setFrom('skpa3201@gmail.com', 'Mailer');
$mail->addAddress('nickfortune@windowslive.com', 'Secretariat');
$mail->addReplyTo('skpa3201@gmail.com', 'Information');

$mail->Subject = 'Account Confirmation';
$mail->Body = 'Final pdf for project: '.$projectname;
$mail->AddAttachment('finalpdf/'.$projectname.'.pdf', $name = $projectname.'.pdf',  $encoding = 'base64', $type = 'application/pdf');
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if (!$mail->send()) {
	$path=(string)"uploads/log.html";
	$fp = fopen($path, 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION["username"]."</b>: ".stripslashes(htmlspecialchars($mail->ErrorInfo))."<br></div>");
	fclose($fp);
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'Message has been sent';
}

/*$pdf2 = new FPDI();
$pdf2->AddPage();
$pdf2->setSourceFile('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\NickFourtounisCV.pdf');
$tplIdx = $pdf2->importPage(1);
$pdf2->AddPage();
$pdf2->setSourceFile('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\analytiki vathmologia (1).pdf');
$tplIdx = $pdf2->importPage(2);
$pdf2->useTemplate($tplIdx, 10, 10, 100);
$pdf2->SetFont('Helvetica');
$pdf2->SetTextColor(0, 0, 0);
$pdf2->SetXY(10, 150);
$pdf2->Write(0, 'Kambourakis');
$pdf2->SetXY(10, 160);
$pdf2->Write(0, 'Maragkoudakis');
$pdf2->SetXY(10, 170);
$pdf2->Write(0, 'Tselepis');
$pdf2->SetXY(10, 180);
$pdf2->Write(0, 'Stergiou');
$pdf2->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature1.png',60,147,-300);
$pdf2->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature2.png',60,157,-300);
$pdf2->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature3.png',60,167,-300);
$pdf2->Image('C:\Users\NFourtounis\OneDrive\MyWebsites\webdev\WebDev\uploads\signatures\signature4.jpg',60,177,-300);
$pdf2->Output('F','project.pdf','true');
$pdf2->Output();*/

?>