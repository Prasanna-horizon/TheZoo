<?php
    include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $adultTickets = $_POST['adultTickets'];
    $childrenTickets = $_POST['childrenTickets'];
    // Validate inputs - for example, check if fields are not empty
    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO booking (name, email,date, time, adult_tickets, children_tickets) 
            VALUES ('$name', '$email', '$date', '$time', '$adultTickets','$childrenTickets')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
      header("Location: Boookings.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

    
?>
