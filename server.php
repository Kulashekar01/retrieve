<?php
// Retrieve the student ID from the URL query parameter
if (isset($_GET['roll_no'])) {
    $roll_no = $_GET['roll_no'];

    // Establish a connection to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to fetch student details based on ID
    $sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display student details in a table format
        echo "<style>
            table {
                width: 80%;
                margin-top: 85px;
                margin-left: 90px;
                border-collapse: collapse;
                text-align: center;
            }
            th, td {
                border: 1px solid #999;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>";
        echo "<table>
            <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Section</th>
                <th>Mobile number</th>
                <!-- Add other details here -->
            </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["roll_no"] . "</td>
                <td>" . $row["student name"] . "</td>
                <td>" . $row["course"] . "</td>
                <td>" . $row["year"] . "</td>
                <td>" . $row["section"] . "</td>
                <td>" . $row["mobile number"] . "</td>
                <!-- Add other details here -->
            </tr>";
        }

        echo "</table>";
    } else {
        echo "student details not found";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Please provide a student ID";
}
?>
