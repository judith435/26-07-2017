<?php

    require_once 'Content.php';
    require_once 'articlesBL.php';


    if(isset($_POST["activity"])){
        $activity = $_POST["activity"];

        switch ($activity) {
            case "AddArticle":
                AddArticle();
                break;
            case "SaveArticle":
                SaveArticle();
                break;
            case "ShowArticles":
                ShowArticles();
                break;
            case "Return":
                ReturnToMain();
                break;
        }
    }

    function ShowArticles(){
        header('Location: showArticles.php'); 
    }

    function ReturnToMain(){
        header('Location: index.html'); 
    }

    function AddArticle(){
        header('Location: addArticle.html'); 
    }

    function SaveArticle(){
        if($_POST["content_header"] == '')
        {
            echo 'please enter content header';
            return;
        }

        if($_POST["content_text"] == '')
        {
            echo 'please enter content text';
            return;
        }

        $row =    [
                    "id" => "0",
                    "content_type" => $_POST["content_type"],
                    "content_header" => $_POST["content_header"],
                    "content_text" => $_POST["content_text"],
        ];

        $Content  =  new Content($row);

        articlesBL::executeStatement("insert into ls42_contents (content_type,
                                                                 content_header,
                                                                 content_text)
                                                        values  (:content_type,
                                                                 :content_header,
                                                                 :content_text)",
                                      [     
                                            "content_type" => $Content->getContentType(), 
                                            "content_header" => $Content->getContentHeader(), 
                                            "content_text" => $Content->getContentText()      ]);

        echo 'insert successful';            
    }




?>