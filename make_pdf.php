<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'config/database.php';
require_once 'config/app.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
$quariy = ("select * from information where id = $id ");
$result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
while ($data = mysqli_fetch_assoc($result)) {

$name = '';
$education = '';
$contact_information = '';
$skills = '';
$work = '';
$projects = '';
$more_information = '';



// if($_SERVER['REQUEST_METHOD'] == 'POST'){

$more_information = $data['more_information'];
$name = $data['name'];
$education = $data['education'];
$contact_information = $data['contact_information'];
$skills = $data['skills'];
$work = $data['work'];
$projects = $data['projects'];

}


$mpdf = new \Mpdf\Mpdf();

$data = '';

$data .= '<h1></h1>';
//Add data 
$data .= '<strong>Objective</strong>' . $more_information .  '<br>';
$data .= '<strong>Name</strong>' . $name .  '<br>';
$data .= '<strong>Education</strong>' . $education .  '<br>';
$data .= '<strong>Contact Information</strong>' . $contact_information .  '<br>';
$data .= '<strong>skills</strong>' . $skills .  '<br>';
$data .= '<strong>Work</strong>' . $work .  '<br>';
$data .= '<strong>Projects</strong>' . $projects .  '<br>';

$mpdf->WriteHTML($data);
$mpdf->Output();
}