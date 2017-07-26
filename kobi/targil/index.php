

<style>
    body{
        background-image: url("IMG_905280.png");
    }
    h2{
        text-shadow:2px 2px 4px beige;
        font-family:Freestyle Script;
        font-size:  60px;
        text-decoration: underline;
    }

    p{

        color:darkblue;
        text-shadow:2px 2px 4px beige;
        font-family:Freestyle Script;
        font-size:  40px;
    }
    
</style>

<?php
$host = '127.0.0.1';
$db   = 'northwind';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$stmt = $pdo->query('SELECT * FROM contents');
foreach ($stmt as $row)
{
    echo "<article><h2>".$row['content_header']."</h2><p>".$row['content__text']."</p></article>";
}
?>