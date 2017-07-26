<?php
    class Connection {
        private $host = '127.0.0.1';
        private $db   = 'northwind';
        private $user = 'root';
        private $pass = '';
        private $charset = 'utf8';
        private $dsn;
        private $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
       
        public function __construct() {
            $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        }

        public function executeStatement($query) {
            $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }

    class Content {
        private $id;
        private $content_type;
        private $content_header;
        private $content_text;

        public function __construct($row) {
            $this->id = $row['id'];
            $this->content_type = $row['content_type'];
            $this->content_header = $row['content_header'];
            $this->content_text = $row['content_text'];
        }

        public function printHtml() {
            return "<article><h2>".$this->content_header."</h2><p>"
            .$this->addRowsToHtmlContent($this->content_text)."</p></article>";
        }

        private function addRowsToHtmlContent($content) {
            return str_replace(".", ".<br>", $content);
        }
    }

    $con = new Connection();
    $resultsSqlRows = $con->executeStatement('SELECT * FROM ls42_contents');
    $resultsObjects = [];

    while ($row = $resultsSqlRows->fetch()) {
        array_push($resultsObjects, new Content($row));
    }

    for ($i = 0; $i < count($resultsObjects); $i++) {
        echo $resultsObjects[$i]->printHtml();
    }
 
?>
