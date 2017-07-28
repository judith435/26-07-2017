<?php

    require_once 'Content.php';
    require_once 'articlesBL.php';


    if(isset($_POST["activity"])){
        $activity = $_POST["activity"];

        switch ($activity) {
            case "AddArticle":
                AddArticle();
                break;
            case "ShowArticles":
                ShowArticles();
                break;
        }
    }


    function AddArticle(){
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

        // $this->id = $row['id'];
        //     $this->content_type = $row['content_type'];
        //     $this->content_header = $row['content_header'];
        //     $this->content_text = $row['content_text'];

        $row =    [
                    "id" => "0",
                    "content_type" => $_POST["content_type"],
                    "content_header" => $_POST["content_header"],
                    "content_text" => $_POST["content_text"],
        ];

        $Content  =  new Content($row);
        articlesBL::executeStatement("insert into ls42_contents (content_type,
                                                                 content_header,
                                                                 content_text,
                                                        values  (:content_type,
                                                                 :content_header,
                                                                 :content_text)",
                                      [     "content_type" => $Content->getContentType(), 
                                            "content_header" => $Content->getContentHeader(), 
                                            "content_text" => $Content->getContentText()      ]);

        // $pdo = get_PDO();
        // $stmt = $pdo->prepare("insert into employee (employee_name,
        //                                              employee_work_start_date)
        //                             values  (:employee_name,
        //                                      :employee_work_start_date)");

        //         $stmt ->execute(array("employee_name" => $Employee -> getEmpName(), 
        //                               "employee_work_start_date" => $Employee -> getEmpWorkStartDate(), 
        //             ));
         echo 'insert successful';            
    }




?>