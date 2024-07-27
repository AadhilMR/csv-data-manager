$(document).ready(function() {
    // Change View - Start
    $('#tableModeTab').on('click', function() {
        if(!$('#tableModeTab').hasClass("active")) { // Current page shows text mode
            
            // Change nav tabs
            $('#tableModeTab').addClass("active");
            $('#textModeTab').removeClass("active");

            // Change page view
            $('#tableModeDiv').removeClass("d-none");
            $('#textModeDiv').addClass("d-none");
        }
    });
    
    $('#textModeTab').on('click', function() {
        if(!$('#textModeTab').hasClass("active")) { // Current page shows table mode
            
            // Change nav tabs
            $('#tableModeTab').removeClass("active");
            $('#textModeTab').addClass("active");

            // Change page view
            $('#tableModeDiv').addClass("d-none");
            $('#textModeDiv').removeClass("d-none");
        }
    });
    // Change View

    // Data transfer with Ajax
    $('#export').on('click', function() {

        let form = new FormData();

        if($('#tableModeTab').hasClass("active")) { // Current page shows table mode
            
            let dataArray = [];
            
            const cells = document.querySelector('tbody').querySelectorAll('td');
            let i = 0;
            
            [].forEach.call(cells, function(cell) {

                if(cell.contains(cell.querySelector('input'))) {
                    dataArray[i] = cell.querySelector('input').value;
                    i++;
                }
            });

            form.append('mode', 'table');
            form.append('data', dataArray);
            form.append('rows', document.getElementById("rows").value);
            form.append('columns', document.getElementById("columns").value);

        } else { // Current page shows text mode
            form.append('mode', 'text');
            form.append('data', document.getElementById("textModeData").value);
        }

        // Process AJAX - Start
        let request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            if(request.readyState == 4) {
                var response = request.responseText;

                var responseObj = JSON.parse(response);
                
                if(responseObj.responseCode == "200") {

                    // Create a download link and force to download
                    let link = document.createElement("a");
                    link.setAttribute("download", "");
                    link.href = "../public/temp/" + responseObj.file;
                    link.style.display = "none";
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                    // End of forcing for downloading

                } else if(responseObj.responseCode == "400") {
                    document.getElementById("errorText").innerHTML = responseObj.error;
                    document.getElementById("errorBox").classList.remove("d-none");
                }
            }
        }
        
        request.open("POST", "../src/controller/csv-write-process.php", true);
        request.send(form);
        // Process AJAX - End
    });
    // Data transfer with Ajax

    // File uploading for CSV
    $('#uploadFile').on('change', function() {
        document.getElementById("filename").innerHTML = this.files[0].name;
        document.getElementById("fileUpArea").style.color = "rgb(0, 115, 55)";
        document.getElementById('import').removeAttribute('disabled');
    });
    // File uploading for CSV

    // Import CSV file with Ajax
    $('#import').on('click', function() {
        let form = new FormData();
        form.append("file", document.getElementById("uploadFile").files[0]);

        // Process AJAX - Start
        let request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            if(request.readyState == 4) {
                var response = request.responseText;

                var responseObj = JSON.parse(response);
                
                bootstrap.Modal.getInstance(document.getElementById("fileImportModel")).hide();

                if(responseObj.responseCode == "200") {
                    document.getElementById("columns").value = responseObj.colCount;
                    document.getElementById("rows").value = responseObj.rowCount;

                    setHeaders(responseObj.colCount);
                    setCSVData(responseObj.dataText);
                } else if(responseObj.responseCode == "400") {
                    document.getElementById("errorText").innerHTML = responseObj.error;
                    document.getElementById("errorBox").classList.remove("d-none");
                }
            }
        }
        
        request.open("POST", "../src/controller/csv-read-process.php", true);
        request.send(form);
        // Process AJAX - End
    }); 
    // Import CSV file with Ajax

    

    // Set data to table or text field
    function setCSVData(data) {
        if($('#tableModeTab').hasClass("active")) { // Current page shows table mode

            document.getElementById("tableModeDiv").querySelector("tbody").innerHTML = "";
            
            var rows = data.split('\n');
            
            for(var i=0; i<rows.length; i++) {
                var trow = document.createElement("tr");
                var tdata = document.createElement("td");
                tdata.innerHTML = i+1;
                trow.appendChild(tdata);
                
                var cells = rows[i].split(',');
                
                for(var j=0; j<cells.length; j++) {
                    var tdata = document.createElement("td");
                    var inpTxt = document.createElement("input");

                    inpTxt.setAttribute("type", "text");
                    inpTxt.setAttribute("value", "");
                    inpTxt.value = cells[j].trimStart();
                    
                    tdata.appendChild(inpTxt);
                    trow.appendChild(tdata);
                }
                document.getElementById("tableModeDiv").querySelector("tbody").appendChild(trow);
            }
            
            createResizableTable(document.getElementById("customTable"));

        } else { // Current page shows text mode
            document.getElementById("textModeData").value = data;
        }
    }

    function setHeaders(column) {
        var header_array = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];

        document.getElementById("tableModeDiv").querySelector("thead").innerHTML = "";

        var trow = document.createElement("tr");
        var tdata = document.createElement("td");
        tdata.innerHTML = "";
        trow.appendChild(tdata);

        for(var i=0; i<column; i++) {
            var tdata = document.createElement("td");
            tdata.setAttribute("class", "th");
            tdata.innerHTML = header_array[i];
            trow.appendChild(tdata);
        }
        document.getElementById("tableModeDiv").querySelector("thead").appendChild(trow);
    }
    // Set data to table or text field
});