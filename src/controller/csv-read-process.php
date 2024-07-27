<?php
require_once "../util/CSVReader.php";

$error = "";
$response = array();

if(!isset($_FILES["file"])) {
    $error = "The file is not found.";
} else {
    $allowed_csv_mimes = array(
        "text/x-comma-separated-values",
        "text/comma-separated-values",
        "application/octet-stream",
        "application/vnd.ms-excel",
        "application/x-csv",
        "text/x-csv",
        "text/csv",
        "application/csv",
        "application/excel",
        "application/vnd.msexcel",
        "text/plain"
    );

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);
    
    if(!in_array($mime, $allowed_csv_mimes)) {
        $error = "The file type is not supported.";
    } else {
        try {
            CSVReader::setFilePath($_FILES["file"]["tmp_name"]);
            
            $response["responseCode"] = "200";

            $response["dataText"] = CSVReader::getSheetAsText();
            $response["rowCount"] = CSVReader::getRowCount();
            $response["colCount"] = CSVReader::getColumnCount();

            CSVReader::closeReader();
        } catch(Exception $e) {
            $error = "The file is not found.";
        }
    }
    finfo_close($finfo);
}

if(!empty($error)) {
    $response["responseCode"] = "400";
    $response["error"] = $error;
}
echo json_encode($response);
?>