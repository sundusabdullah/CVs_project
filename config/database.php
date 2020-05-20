<?

$connection = [
    'host'=> 'localhost',
    'user' => 'root',
    'database' => 'web_onlinecv'
];

$mysqli = mysqli_connect($connection['host'],
 $connection['user'],
  "", 
  $connection['database']
);

if ($mysqli->connect_error){
    die("Error connecting".$mysqli->connect_error);
}