<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Excel Manipulation</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- stylesheets -->
</head>
<body>
    <div class="container vh-100">
        <div class="row vh-100">
            <div class="col-12 my-auto">
                <!-- Button Container - Start -->
                <div class="row justify-content-center">

                    <div class="col-12 col-md-2 px-3 my-2 cursor-hand">
                        <div class="row">
                            <div class="col-12 py-5 rounded-3 text-center overflow-hidden position-relative" style="background-color: rgb(255, 73, 73);" id="card-custom-1" onclick="">
                                <span class="card-header-custom">XLSX READER</span>
                                <div class="card-back-custom back-custom-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 px-3 my-2 cursor-hand">
                        <div class="row">
                            <div class="col-12 py-5 rounded-3 text-center overflow-hidden position-relative" style="background-color: rgb(39, 180, 199);" id="card-custom-2" onclick="window.location='public/csv-reader.php';">
                                <span class="card-header-custom">CSV READER</span>
                                <div class="card-back-custom back-custom-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 px-3 my-2 cursor-hand">
                        <div class="row">
                            <div class="col-12 py-5 rounded-3 text-center overflow-hidden position-relative" style="background-color: rgb(39, 199, 92);" id="card-custom-3" onclick="">
                                <span class="card-header-custom">XLSX WRITER</span>
                                <div class="card-back-custom back-custom-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 px-3 my-2 cursor-hand">
                        <div class="row">
                            <div class="col-12 py-5 rounded-3 text-center overflow-hidden position-relative" style="background-color: rgb(247, 164, 69);" id="card-custom-4" onclick="window.location='public/csv-writer.php';">
                                <span class="card-header-custom">CSV WRITER</span>
                                <div class="card-back-custom back-custom-2"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Button Container - End -->
            </div>
        </div>
    </div>
</body>
</html>