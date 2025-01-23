<?php
if (isset($_POST['submit'])) {
    // Check if a file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $filename = $_FILES['file']['tmp_name'];

        // Open the file in read mode
        if (($handle = fopen($filename, "r")) !== FALSE) {
            // Skip the first row (header row)
            fgetcsv($handle);

            // Initialize an array to store the data
            $data = [];

            // Loop through the file and read each row
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Store each row in the data array
                $data[] = $row;
            }

            // Close the file
            fclose($handle);

            // Call the function to insert data into the database
            insertIntoDatabase($data);
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
}

// Function to insert data into the database
function insertIntoDatabase($data) {
    // Database connection settings
   include("db.php");
    // Create a new database connection
    
    // Check the connection
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO questions (question,difficulty, opt1, opt2, opt3, opt4, answer, category)
     VALUES (?,?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement was prepared successfully
    if ($stmt === FALSE) {
        die("Error preparing statement: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssss", $question, $difficulty, $option1, $option2, $option3, $option4, $answer, $category);

    // Loop through the data and insert each row into the database
    foreach ($data as $row) {
        $question = $row[0];
        $difficulty = $row[1];
        $option1 = $row[2];
        $option2 = $row[3];
        $option3 = $row[4];
        $option4 = $row[5];
        $answer = $row[6];
        $category = $row[7];

        // Execute the statement
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();

    echo "Data inserted successfully!";
}
?>
