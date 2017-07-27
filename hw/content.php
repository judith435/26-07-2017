<?php

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


?>