<?php
require_once '../../vendor/spout-3.3.0/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class CSVReader {
    private static $reader;
    private static $filePath;
    private static $rows;
    private static $cols;

    private static function setReader() {
        if(!isset(CSVReader::$reader)) {
            CSVReader::$reader = ReaderEntityFactory::createCSVReader();
        }
    }

    public static function setFilePath($filePath) {
        CSVReader::$filePath = $filePath;
        CSVReader::setReader();
        CSVReader::$reader->open(CSVReader::$filePath);
    }

    private static function getRow(): array {
        $row_arr = array();

        foreach(CSVReader::$reader->getSheetIterator() as $sheet) {
            foreach($sheet->getRowIterator() as $row) {
                $cell_arr = $row->getCells();
                CSVReader::$cols = count($cell_arr);
                array_push($row_arr, $cell_arr);
            }
        }

        CSVReader::$rows = count($row_arr);
        return $row_arr;
    }

    public static function getSheetAsArray(): array {
        if(isset(CSVReader::$filePath)) {
            return CSVReader::getRow();
        } else {
            throw new Exception(("The filepath is not found."));
        }
    }

    public static function getSheetAsText() {
        $text = "";
        foreach(CSVReader::getSheetAsArray() as $row) {
            foreach($row as $cell) {
                $text = $text . $cell . ",";
            }
            $text = rtrim($text, ",");
            $text .= "\n";
        }
        $text = rtrim($text, "\n");
        return $text;
    }

    public static function getRowCount(): int {
        return CSVReader::$rows;
    }

    public static function getColumnCount(): int {
        return CSVReader::$cols;
    }

    public static function closeReader() {
        CSVReader::$reader->close();
    }
}

?>