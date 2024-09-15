<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Customers</title>
    <style>
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
        }
        .pagination-container select,input,button {
            margin: 0 10px;
        }
        .pagination-container span {
            margin: 0 5px;
        }
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
    <script type="text/javascript" src="script.js" defer></script>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['email'])) {
            header("location:index.php");
            die();
        }
    ?>
    <header>
        <?php include_once 'navbar.html'?>
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm">
                <form class="form-inline justify-content-end" method="POST" action="import.php" enctype="multipart/form-data">
                    <div class="input-group mt-2">
                        <input type="file" class="form-control" name="file" id="file" accept=".csv" required />
                        <button type="submit" class="btn btn-outline-success" name="import" id="">Import</button>
                    </div>
                </form>
            </div>
        </div>
        <center><h1>Customers</h1></center>
        <div class="pagination-container">
            <select class="form-select form-select-sm" id="page" onchange="showData()" style="width: 80px;">
            </select>
            <button class="btn btn-light" onclick="firstPage()" id="btnFirst">&lt;&lt;</button>
            <button class="btn btn-light" onclick="previousPage()" id="btnPrevious">&lt;</button>
            <button class="btn btn-light" onclick="nextPage()" id="btnNext">&gt;</button>
            <button class="btn btn-light" onclick="lastPage()" id="btnLast">&gt;&gt;</button>
    
            <span style="border-left: 1px solid #ccc; height: 24px; margin-left: 10px;"></span>
    
            <span>Number of rows:</span>
            <select class="form-select form-select-sm" id="rows" onchange="updatePageOptions()" style="width: 80px;">
                <option value="25" selected>25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span style="border-left: 1px solid #ccc; height: 24px; margin-left: 10px;"></span>
            <div class="input-group">
                <input type="text" id="search" oninput="search()" name="aadhaar" class="form-control" pattern="\d*" minlength="12" maxlength="12" placeholder="Enter Aadhaar Number to Search" required/>
            </div>
        </div>
        <table id="data" class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </table>
        <button onclick="topFunction()" id="myBtn" title="Go to top">&uarr;</button>
    </div>
</body>
</html>
