<!DOCTYPE html>
<html>
<head>
    <title>test</title>
</head>
<body >
    <!-- <form method="post" action="contact.php"> -->
        <article>
            <?php
                    function getConnection(){
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
                    return new PDO($dsn, $user, $pass, $opt);
                }
                $pdo = getConnection();
                $stmt = $pdo->prepare('SELECT * FROM ls42_contents order by 1' );
                $stmt->execute();
                foreach ($stmt  as $row)
                {
                    echo "<h2>" . $row['content_header'] . "</h2>" .   
                         "<p>"  . $row['content_text'] . "</p><br>";
                }

            ?>

        </article>    
</body>
</html>