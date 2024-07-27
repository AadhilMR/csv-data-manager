<?php

use function PHPSTORM_META\type;

class ArrayTrimmer {

    private $max_col = 0;
    private $max_row = 0;

    private function setLimit(array $row_arr = []) {
        // Get each row
        foreach($row_arr as $key_row => $row) {

            $is_all_cell_empty = true;

            // Get each cell of currently selected row
            foreach($row as $key_cell => $cell) {

                /**
                 * Check whether the cell is empty or not
                 * 
                 * <p>if cell is not empty, check the $key_cell of the cell is greater than
                 * $max_col. If $max_col less than the $key_cell, $max_col is set to the new
                 * value of $key_cell.</p>
                 * 
                 */
                if(!empty(trim($cell))) {

                    $is_all_cell_empty = false;

                    if($this->max_col < $key_cell) {
                        $this->max_col = $key_cell;
                    }
                }
            }
            
            /**
             * Check whether the row is empty or not
             * 
             * <p>if row is not empty, check the $key_row of the row is greater than
             * $max_row. If $max_row less than the $key_row, $max_row is set to the new
             * value of $key_row.</p>
             * 
             */
            if(!$is_all_cell_empty) {
                if($this->max_row < $key_row) {
                    $this->max_row = $key_row;
                }
            }
        }
    }

    private function removeEmptyCells(array $row_arr = []): array {
        
        // Get each row
        foreach($row_arr as $key_row => $row) {

            // Removing empty rows from right side
            if($key_row > $this->max_row) {
                unset($row_arr[$key_row]);
            } else {
                // Get each cell of currently selected row
                foreach($row as $key_cell => $cell) {

                    // Removing empty cells from right side
                    if($key_cell > $this->max_col) {
                        unset($row[$key_cell]);
                    }
                }
                // Set trimmed row to current key position of $row_arr
                $row_arr[$key_row] = $row;
            }
        }

        return $row_arr;
    }

    public static function trimRow(array $row_arr = []): array {
        $trimmer = new ArrayTrimmer();

        $trimmer->setLimit($row_arr);

        return $trimmer->removeEmptyCells($row_arr);
    }
}
?>