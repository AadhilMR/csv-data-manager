<?php
require_once '../../vendor/spout-3.3.0/src/Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class CSVWriter {
    
    private static $writer;
    private static $filePath;
    
    private static function setWriter() {
        if(!isset(CSVWriter::$writer)) {
            CSVWriter::$writer = WriterEntityFactory::createCSVWriter();
        }
    }

    public static function setFilePath($filePath) {
        CSVWriter::$filePath = $filePath;

        CSVWriter::setWriter();

        // Write data to a file or to a PHP stream
        CSVWriter::$writer->openToFile(CSVWriter::$filePath);
    }

    private static function setRow(array $values = []) {
        // Add a row at a time
        $singleRow = WriterEntityFactory::createRowFromArray($values);
        CSVWriter::$writer->addRow($singleRow);
    }
    
    public static function addRow(array $values = []) {
        if(isset(CSVWriter::$filePath)) {
            CSVWriter::setRow($values);
        } else {
            throw new Exception("The filepath is not found.");
        }
    }
    
    public static function closeWriter() {
        CSVWriter::$writer->close();
    }
}

?>