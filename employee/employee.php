<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="\mini\styles.css">
    <link rel="stylesheet" href="\mini\commonstyle.css">
    <style>
        /* Extra styles added here for layout and alignment */
        .container {
            max-width: 1450px;
            margin: 30px auto;
            background-color: #fff6e9;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for the search bar */
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 700px;
            margin-left: 200px;
        }

        .search-bar input {
            width: 400px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            border-color: black;
            border-width: 2px;
            font-size: 16px;
        }

        .search-bar button {
            background-color: #f44;
            color: white;
            border: none;
            padding: 5px 5px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 20px;
        }

        /* Extra margin to separate the search bar from the table */
        .search-bar + table {
            margin-top: 170px;
        }

        /* Adjusted styling for the table */
        table {
            width: 100%;
            margin: 0;
            margin-left: -700px;
            margin-right: 200px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: -10px solid #0000;
            text-align: left;
        }

        th {
            background-color: #4ca29a;
            color: #ffff;
            font-weight: bold;
        }

        .eye-icon {
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-input {
            margin: 10px 0;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <h1>XYZ University</h1>
    </div>

    <div id="mysidenav" class="sidenav">
        <a href="" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="\mini\home page\index.php">Dashboard</a>
        <a href="\mini\finance\finance.html">Finance</a>
        <a href="\mini\employee\employee.html" class="active">Employees</a>
        <a href="#">Analysis</a>
        <a href="\mini\promotion\promotion.html">Promotions</a>
    </div>

    <div class="container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by name" onkeyup="filterTable()">
            <button>Add Employee</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Level</th>
                    <th>Basic Salary</th>
                    <th>HRA</th>
                    <th>DA</th>
                    <th>TA</th>
                    <th>Total Salary</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Action</th> <!-- New Action Column for the eye icon -->
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost"; 
                $username = "root"; 
                $password = ""; 
                $dbname = "salary";
                // Re-establish connection to fetch employee details
                $conn = new mysqli($servername, $username, $password, $dbname);
        
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        
                // SQL query to fetch employee details
                $sql = "SELECT empid, name, department, designation, level, basic_salary, HRA, DA, TA, PA, gender, phone_number, DA_perc, HRA_prec FROM employee";
                $result = $conn->query($sql);
        
                // Prepare table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Calculate total salary
                        $totalSalary = $row['basic_salary'] + $row['HRA'] + $row['DA'] + $row['TA'] + $row['PA'];
                        echo "<tr>
                            <td>{$row['empid']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['department']}</td>
                            <td>{$row['designation']}</td>
                            <td>{$row['level']}</td>
                            <td>{$row['basic_salary']}</td>
                            <td>{$row['HRA']}</td>
                            <td>{$row['DA']}</td>
                            <td>{$row['TA']}</td>
                            <td>{$totalSalary}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['phone_number']}</td>
                            <td><span class='eye-icon' onclick='viewEmployee({$row['empid']})'>👁️</span></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No employees found</td></tr>";
                }
        
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Employee Details Modal -->
    <div id="employeeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Employee Details</h2>
            <p><strong>Employee ID:</strong> <span id="modalEmpId"></span></p>
            <p><strong>Name:</strong> <span id="modalName"></span></p>
            <p><strong>Department:</strong> <span id="modalDepartment"></span></p>
            <p><strong>Designation:</strong> <span id="modalDesignation"></span></p>
            <p><strong>Level:</strong> <span id="modalLevel"></span></p>
            <p><strong>Basic Salary:</strong> <span id="modalBasicSalary"></span></p>
            <p><strong>HRA:</strong> <span id="modalHRA"></span></p>
            <p><strong>DA:</strong> <span id="modalDA"></span></p>
            <p><strong>TA:</strong> <span id="modalTA"></span></p>
            <p><strong>Total Salary:</strong> <span id="modalTotalSalary"></span></p>
            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
            <p><strong>Phone Number:</strong> <span id="modalPhoneNumber"></span></p>
            <p><strong>HRA percentage:</strong> <span id="modalHRAperc"></span></p>
            <p><strong>DA percentage:</strong> <span id="modalDAperc"></span></p>
            <button onclick="editEmployee()">Edit</button> <!-- Edit button -->
        </div>
    </div>

    <!-- Edit Employee Modal -->
    <div id="editEmployeeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Employee</h2>
            <input type="text" id="editName" class="edit-input" placeholder="Name">
            <input type="text" id="editDepartment" class="edit-input" placeholder="Department">
            <input type="text" id="editDesignation" class="edit-input" placeholder="Designation">
            <input type="text" id="editLevel" class="edit-input" placeholder="Level">
            <input type="number" id="editBasicSalary" class="edit-input" placeholder="Basic Salary">
            <input type="number" id="editHRA" class="edit-input" placeholder="HRA">
            <input type="number" id="editDA" class="edit-input" placeholder="DA">
            <input type="number" id="editTA" class="edit-input" placeholder="TA">
            <input type="text" id="editGender" class="edit-input" placeholder="Gender">
            <input type="text" id="editPhoneNumber" class="edit-input" placeholder="Phone Number">
            <button onclick="updateEmployee()">Update</button> <!-- Update button -->
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="\mini\finance\script.js"></script>
    <script src="\mini\commonstyle.css"></script>
    <script src="search.js"></script>
    <script src="viewEmployee.js"></script> <!-- Include the new JavaScript file -->
</body>

</html>
