<!DOCTYPE html>
<html>
<head>
    <title>test</title>
</head>
<body>
    <form method="post" action="articles.php">
        <fieldset>
            <legend>Articles </legend>
            <?php
                require_once 'Content.php';
                require_once 'articlesBL.php';

                    $emptyParms = [];
                    $resultsSqlRows = articlesBL::executeStatement('SELECT * FROM ls42_contents', $emptyParms);
                    $resultsObjects = [];

                    while ($row = $resultsSqlRows->fetch()) {
                        array_push($resultsObjects, new Content($row));
                    }

                    for ($i = 0; $i < count($resultsObjects); $i++) {
                        echo $resultsObjects[$i]->printHtml();
                    }


            ?>
        </fieldset>    
        <button  name="activity" value="Return">Return</button> 
    </form>
</body>
</html>