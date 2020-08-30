<?php


if (isset($_FILES["fileToUpload"])) {


                $myFile = $_FILES['fileToUpload'];
                $fileCount = count($myFile["name"]);

                echo $fileCount;
              }
                ?>