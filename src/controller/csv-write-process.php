<?php

require_once "../util/CSVWriter.php";
require_once "../util/ArrayTrimmer.php";

$error = "";

if(!isset($_POST["mode"]) || empty($_POST["mode"]) || ($_POST["mode"] != "table" && $_POST["mode"] != "text")) {
    $error = "The data mode is not found.";
} else if(!isset($_POST["data"])) {
    $error = "The data is not found.";
} else {

    // Contains rows that each contains set of cell data
    $row_arr = array();
    
    $mode = $_POST["mode"];
    
    if($mode == "table") { // The data mode is table mode
        
        if(!isset($_POST["rows"]) || empty($_POST["rows"])) {
            $error = "The number of rows is not found.";
        } else if(!isset($_POST["columns"]) || empty($_POST["columns"])) {
            $error = "The number of columns is not found.";
        } else {
            $rows = $_POST["rows"];
            $cols = $_POST["columns"];
            $data_arr = explode(",", $_POST["data"]);

            // Contains cell data
            $row = array();

            foreach($data_arr as $key => $data) {

                // Add current $data into $row array
                array_push($row, $data);

                if(($key+1)%$cols == 0) { // The current data is a value in last column
                    
                    // Add current $row array as an element into $row_arr array
                    array_push($row_arr, $row);

                    // Remove all the elements from $row array
                    array_splice($row, 0, 6);
                }
            }
        }
        
    } else { // The data mode is text mode
        $text_row_arr = explode(PHP_EOL, $_POST["data"]);
        
        foreach($text_row_arr as $text) {
            $row = explode(",", $text);
            array_push($row_arr, $row);
        }
    }

    $response = [];

    if(count($row_arr) > 0) {

        // remove empty columns and rows
        $trimmed_row_arr = ArrayTrimmer::trimRow($row_arr);

        $file_location = "../../public/temp/";
        $file_name = "data-sheet-". uniqid() .".csv";

        CSVWriter::setFilePath($file_location.$file_name);
        
        foreach($trimmed_row_arr as $row) {
            CSVWriter::addRow($row);
        }

        CSVWriter::closeWriter();

        $response["responseCode"] = 200;
        $response["file"] = $file_name;
    }
}

if(!empty($error)) {
    $response["responseCode"] = 400;
    $response["error"] = $error;
}

echo json_encode($response);

?>