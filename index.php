<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $services = $_POST['service']; // this will be an array now
    $date = htmlspecialchars($_POST['date']);
    $employee = htmlspecialchars($_POST['employee']);

    // Convert selected services array to comma-separated string
    $service_str = implode(", ", $services);

    // Connect to database
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "clientdb";

    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert client into database
    $sql = "INSERT INTO clients (name, email, service, date, employee) 
            VALUES ('$name', '$email', '$service_str', '$date', '$employee')";

    $msg = "";
    if (mysqli_query($conn, $sql)) {
        $msg = "Thank you, $name! Your appointment for $service_str on $date has been booked. A confirmation email will be sent to $email.";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacy's Mobile Sparkle</title>
    <style>
        body {
            background-image: url("images/nailbg.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            padding-top: 100px;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }
        h1 {
            text-align: center;
            color: pink;
            font-size: 100px;
            font-weight: bold;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        h3 {
            text-align: center;
            color: purple;
            font-size: 60px;
            font-style: italic;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        p {
            font-size: 25px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            font-size: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>STACY'S MOBILE SPARKLE</h1>
    <h3>"Curl and Color on Call"</h3>
    <p>Welcome to Stacy's Mobile Sparkle, where we provide quality hair and manicure/pedicure services at the comfort of your home.</p>

     <!--services table-->
    <table borderwidth="50%" allign="center">
        <tr>
            <th>Service</th>
            <th>Price</th>
        </tr>
        <tr>
            <td> <img src="images/boxbraids.jpeg" alt="image of box braids"width="150" height="150"> box braids </td>
            <td>400</td>
        </tr>
        <tr>
            <td><img src="images/dreadlocs.jpeg" alt="image of dreadlocs"width="150" height="150"> dreadlocs retouch <br/> dreadlocs installation
 </td>
            <td>2500</td>
        </tr>
        <tr>
            <td><img src="images/knotless.jpeg" alt="image of knotless braids"width="150" height="150"> knotless braids 
</td>
            <td>500</td>
        </tr>
        <tr>
            <td> <img src="images/dreadlocs.jpeg" alt="image of dreadlocs"width="150" height="150"> dreadlocs retouch <br/> dreadlocs installation 
</td>
            <td>1500</td>
        </tr>
        <tr>
            <td>    <img src="images/tipsandstickon.jpeg" alt="image of tips on nails" width="150" height="150"> tips/ stickons 
</td>
            <td>500</td>
        </tr>
        <tr>
            <td> <img src="images/buildergelapplicationplusgel.jpeg" alt="image of builder gel application" width="150" height="150"> builder gel application

</td>
            <td>600</td>
        </tr>
        <tr>
            <td>    <img src="images/buildergelapplicationplusgel.jpeg" alt="image of  gel application" width="150" height="150"> gel on nails
</td>
            <td>250</td>
        </tr>
        <tr>
            <td>     <img src="images/toegel.jpeg" alt="image of toe gel application" width="150" height="150"> toe gel application 
</td>
            <td>350</td>
        </tr>

    </table>

    <!--employee details table-->

     <h3>Employee Details</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Service</th>
            
        </tr>
        <tr>
            <td>Linder Stacy</td>
            <td>Hair Stylist/ Nail Technician</td>
        </tr>
        <tr>
            <td>Beatrice Aluso</td>
            <td>Hair Stylist/ Nail Technician</td>
        </tr>
        <tr>
            <td>Grace Achieng</td>
            <td>Hair Stylist/ Nail Technician</td>
        </tr>
    </table>
    
    
    <h2>Book an Appointment</h2>
    <form id="myForm" action="" method="post">
        <label for="name">Name:</label><br/>
        <input type="text" id="name" name="name" required><br/><br/>    

        <label for="email">Email:</label><br/>
        <input type="email" id="email" name="email" required><br/><br/>

        <label for="service">Select Services (hold Ctrl to select multiple):</label><br/>
        <select id="service" name="service[]" multiple required>
            <option value="Box Braids">Box Braids</option>
            <option value="Dreadlocs">Dreadlocs</option>
            <option value="Knotless Braids">Knotless Braids</option>
            <option value="Tips / Stickons">Tips / Stickons</option>
            <option value="Toe Gel Application">Toe Gel Application</option>
            <option value="Builder Gel Application">Builder Gel Application</option>
            <option value="Nail Gel">Nail Gel</option>
        </select><br/><br/>

        <label for="date">Preferred Date:</label><br/>
        <input type="date" id="date" name="date" required><br/><br/>

        <label for="employee">Service Provider of Choice:</label><br/>
        <select id="employee" name="employee" required>
            <option value="Linder Stacy">Linder Stacy</option>
            <option value="Beatrice Aluso">Beatrice Aluso</option>
            <option value="Grace Achieng">Grace Achieng</option>
        </select><br/><br/>       

        <input type="submit" value="Book Now">
    </form>

    <?php
    if (isset($msg)) {
        echo "<h3>$msg</h3>";
    }
    ?>

</body>
</html>
