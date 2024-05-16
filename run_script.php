<?php
// Set the command to execute the Python script
$command = 'python C:\xampp\htdocs\hcip\app.py';

// Execute the command and capture output and return code
exec($command, $output, $return_code);

// Check if the command executed successfully
if ($return_code === 0) {
    // Output any messages from the Python script
    foreach ($output as $line) {
        echo $line . "\n";
    }
} else {
    // Handle errors if the command failed
    echo "Error executing command: $command\n";
}
?>
