/**
 * <NO STANDARD LICENSE FOUND>
 * 
 * VANILLA JAVASCRIPT API FOR RESIZE TABLE COLUMNS - DIRECT USAGE
 * 
 * AUTHOR: EXEIdeas
 * 
 * https://www.exeideas.com/2021/11/resizable-columns-of-table-javascript.html?unapproved=378583&moderation-hash=ee61a45a79dc89ea48e11c0d5cabc96c#comment-378583
 */

document.addEventListener('DOMContentLoaded', function () {
    window.createResizableTable = function createResizableTable (table) {
        const cols = table.querySelectorAll('.th');

        [].forEach.call(cols, function (col) {
            // Add a resizer element to the column
            const resizer = document.createElement('div');
            resizer.classList.add('resizer');

            // Set the height
            resizer.style.height = `${table.offsetHeight}px`;

            // Add a resizer element to the column
            col.appendChild(resizer);

            createResizableColumn(col, resizer);
        });
    };

    const createResizableColumn = function (col, resizer) {
        // Track the current position of mouse
        let x = 0;
        let w = 0;

        const mouseDownHandler = function (e) {
            // Get the current mouse position
            x = e.clientX;

            // Calculate the current width of column
            const styles = window.getComputedStyle(col);
            w = parseInt(styles.width, 10);

            // Attach listeners for document's events
            document.addEventListener('mousemove', mouseMoveHandler);
            document.addEventListener('mouseup', mouseUpHandler);

            resizer.classList.add('resizing');
        };

        const mouseMoveHandler = function (e) {
            // Determine how far the mouse has been moved
            const dx = e.clientX - x;
            
            // Update the width of column
            col.style.width = `${w + dx}px`;
        };

        // When user releases the mouse, remove the existing event listeners
        const mouseUpHandler = function () {
            resizer.classList.remove('resizing');
            document.removeEventListener('mousemove', mouseMoveHandler);
            document.removeEventListener('mouseup', mouseUpHandler);
        };

        resizer.addEventListener('mousedown', mouseDownHandler);
    };

    createResizableTable(document.getElementById('customTable'));
});