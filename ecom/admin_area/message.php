<style>
/* Improved CSS for table styling */
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    border: 1px solid #e0e0e0;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 20px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f2f2f2;
    transition: background-color 0.3s;
}

/* Center align text in ID column */
td:first-child {
    text-align: center;
}

/* Responsive styles for smaller screens */
@media (max-width: 600px) {
    th, td {
        padding: 10px;
    }

    table {
        border: none;
    }

    table, tr, th, td {
        display: block;
    }

    th:first-child {
        display: none;
    }

    td:first-child {
        text-align: left;
    }
}


</style>
<?php
$query="SELECT * FROM `contact`";
$result=mysqli_query($con,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Message</th><th>Date and Time</th></tr>";
   
while ($row=mysqli_fetch_assoc($result)) {
    echo "<tr>";
    
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . $row["user_name"] . "</td>";
    echo "<td>" . $row["user_email"] . "</td>";
    echo "<td>" . $row["user_message"] . "</td>";
    echo "<td>" . $row["date&time"] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
else{
    echo "No data found.";
}

?>