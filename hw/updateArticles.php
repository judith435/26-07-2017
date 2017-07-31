<html>
<head>
</head>
<body>
    <form action='updateArticles.php' method='post'>
        <h1>update Articles</h1>
        <?php
                require_once 'Content.php';
                require_once 'articlesBL.php';

                    if(isset($_POST["update"])){
                        $buttonNumber = $_POST["update"];
                        $header = $_POST["header"];
                        articlesBL::executeStatement("update ls42_contents set content_header = :cHeader where content_id = :cID",
                                [   "cID" => $buttonNumber, 
                                    "content_header" => $header]);

                    }

                    $emptyParms = [];
                    $resultsSqlRows = articlesBL::executeStatement('SELECT * FROM ls42_contents', $emptyParms);
                    $resultsObjects = [];

                    while ($row = $resultsSqlRows->fetch()) {
                        array_push($resultsObjects, new Content($row));
                    }

                    for ($i = 0; $i < count($resultsObjects); $i++) {
                        echo $resultsObjects[$i]->printHtml();
                    }
                    echo "<br><br><br><br><br>";
                    echo "<label>header: <input id='header' name ='header'/></label><br><br>";
                    echo "<table><tr><th>ID</th><th>Header</th></tr>";

                    for ($i = 0; $i < count($resultsObjects); $i++) {
                        echo "<tr><td>";
                        echo $resultsObjects[$i]->getContentID();
                        echo "</td><td>";
                        echo $resultsObjects[$i]->getContentHeader();
                        echo "</td><td>";
                        $buttonNum =  $i;
                        echo "<button  name='update' value='" . ++$buttonNum . "'>Update</button> ";
                        echo "</td></tr>";
                    }
                    echo "</table>";
        ?>
        
    </form>
</body>
</html>