<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Writer</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- stylesheets -->
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="display: flex; flex-flow: column; height: 100vh;">
            <!-- Error - start -->
            <div class="col-10 col-md-8 col-lg-6 offset-1 offset-md-2 offset-lg-3 mt-2 alert alert-danger d-none" id="errorBox" role="alert">
                <span><i class="bi bi-exclamation-circle"></i></span>
                <span id="errorText"></span>
                <button type="button" class="btn-close position-absolute ms-auto" style="right: 4px;" onclick="this.parentElement.classList.add('d-none');"></button>
            </div>
            <!-- Error - end -->
        
            <!-- Header - start -->
            <div class="col-12" style="background-color: var(--color-fun-green); color: var(--color-white); flex: 0 1 auto;">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-9 pt-2">
                        <p class="px-2 font-courier fs-1">CSV WRITER</p>
                    </div>
                    <div class="col-12 col-md-5 col-lg-3 my-auto">
                        <div class="row">
                            <div class="col-4 px-2 d-grid">
                                <button class="btn-custom btn-white-custom" disabled data-bs-toggle="tooltip" title="This feature is not yet developed">Save</button>
                            </div>
                            <div class="col-6 px-2 d-grid">
                                <button class="btn-custom btn-white-custom" id="export">Export</button>
                            </div>
                            <div class="col-2 px-2 d-grid">
                                <button class="btn-custom btn-white-custom" onclick="window.location='../index.php';">
                                    <i class="bi bi-house fs-5 cursor-hand"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header - end -->

            <!-- Navbar - start -->
            <div class="col-12 py-3" style="flex: 0 1 auto;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" id="tableModeTab">Table Mode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="textModeTab">Text Mode</a>
                    </li>
                </ul>
            </div>
            <!-- Navbar - end -->

            <!-- Body content - start -->
            <div class="col-12" style="flex: 1 1 auto; overflow: scroll;">
                <div class="row">

                    <!-- table mode div - start -->
                    <div class="col-12" id="tableModeDiv">
                        <div class="row">
                            <div class="col-12">
                                <table id="customTable">
                                    <thead>
                                        <td></td>
                                        <td class="th">A</td>
                                        <td class="th">B</td>
                                        <td class="th">C</td>
                                        <td class="th">D</td>
                                        <td class="th">E</td>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                            <td><input type="text" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- table mode div - end -->

                    <!-- text mode div - start -->
                    <div class="col-12 d-none" id="textModeDiv">
                        <div class="row">
                            <div class="col-12 col-md-10 offset-md-1">
                                <div class="row">
                                    <p class="text-danger">The Comma(,) will seperate columns. The Line Break/Carriage Return(&crarr;) will seperate rows.</p>
                                    <textarea cols="30" rows="15" id="textModeData"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- text mode div - end -->

                </div>
            </div>
            <!-- Body content - end -->

            <!-- Footer - start -->
            <div class="col-12" style="background-color: var(--color-fun-green); color: var(--color-white); bottom: 0; flex: 0 1 auto;">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 pt-2 text-center text-md-start order-1 order-md-0">
                        <p class="px-2 font-courier mt-2">Powered by <a href="https://www.eclipselk.com/" target="_blank" class="link-custom link-white-custom">Eclipse</a><sup>&copy;</sup></p>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9 order-0 order-md-1">
                        <div class="row">
                            <div class="col-9 col-md-10 p-2 text-start text-md-end">
                                <span>Columns: </span>
                                <input class="number-input-custom" id="columns" disabled type="number" value="5" />
                                &nbsp;&nbsp;
                                <span>Rows: </span>
                                <input class="number-input-custom" id="rows" disabled type="number" value="10" />
                            </div>
                            <div class="col-3 col-md-2 p-2 d-grid">
                                <button class="btn-custom btn-white-custom" disabled data-bs-toggle="tooltip" title="This feature is not yet developed">Custom</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer - end -->

            <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
            <script src="../assets/js/bootstrap.bundle.js"></script>
            <script src="../assets/js/table-resizer.js"></script>
            <script src="../assets/js/custom.js"></script>
        </div>
    </div>
</body>
</html>