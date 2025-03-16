<?php
$con = mysqli_connect("localhost", "root", "", "carecompass");

if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Check if required fields are set
if (isset($_REQUEST['fname'], $_REQUEST['femail'], $_REQUEST['fage'], $_REQUEST['ans1'], $_REQUEST['ans2'], $_REQUEST['ans3'], $_REQUEST['ans4'], $_REQUEST['fd'])) {

    // Sanitize input (Optional but recommended)
    $f = htmlspecialchars($_REQUEST['fname'], ENT_QUOTES, 'UTF-8');
    $e = htmlspecialchars($_REQUEST['femail'], ENT_QUOTES, 'UTF-8');
    $a = intval($_REQUEST['fage']); // Ensure it's an integer
    $an = htmlspecialchars($_REQUEST['ans1'], ENT_QUOTES, 'UTF-8');
    $b = htmlspecialchars($_REQUEST['ans2'], ENT_QUOTES, 'UTF-8');
    $c = htmlspecialchars($_REQUEST['ans3'], ENT_QUOTES, 'UTF-8');
    $d = htmlspecialchars($_REQUEST['ans4'], ENT_QUOTES, 'UTF-8');
    $feed = htmlspecialchars($_REQUEST['fd'], ENT_QUOTES, 'UTF-8');

    // Use prepared statements to prevent SQL Injection
    $stmt = $con->prepare("INSERT INTO feedback(fname, femail, fage, ans1, ans2, ans3, ans4, feed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", $f, $e, $a, $an, $b, $c, $d, $feed);

    if ($stmt->execute()) {
        echo "<h1>Feedback Submitted</h1>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Missing required fields!";
}

mysqli_close($con);
?>
