<?php 
session_start();
include "conn.php";

if(!isset($_SESSION["user_id"])){
    header("location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: serif;
        }

        body {
            background: url('OIP.jpg') no-repeat center center fixed; 
            background-size: cover; 
            background-attachment: fixed; 
            color: red;
            display: flex;
            height: 100vh;
            overflow: hidden;
            transition: margin-left 0.3s ease;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background: rgba(20, 20, 20, 0.9);
            color: red;
            padding-top: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 10px rgba(255, 0, 0, 0.2);
            transform: translateX(-250px); 
            transition: transform 0.3s ease;
        }

        .sidebar.active {
            transform: translateX(0); 
        }

        .sidebar a {
            color: red;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
            font-weight: 500;
            width: 100%;
            text-align: center;
            transition: background 0.3s ease-in-out;
            margin-top: 10%;
        }

        .sidebar a:hover {
            background: red;
            color: black;
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 30px;
            cursor: pointer;
            z-index: 101;
            background: rgba(0, 0, 0, 0.7); 
            color: red;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
        }

        .sidebar-toggle.active {
            transform: rotate(180deg); 
        }

        .header {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            padding: 15px 30px;
            background: rgba(0, 0, 0, 0);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            z-index: 100;
            
        }

        .navbar a {
            position: relative;
            font-size: 18px;
            color: red;
            text-decoration: none;
            font-weight: 600;
            margin-right: 30px;
        }

        .navbar a:last-child {
            margin-right: 0;
        }

        .navbar a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 2px;
            background: red;
            border-radius: 5px;
            transform: translateY(10px);
            opacity: 0;
            transition: .5s;
        }

        .navbar a:hover::after {
            transform: translateY(0);
            opacity: 1;
        }

        .container {
            margin-top: 80px;
            padding: 20px;
            width: 40%; 
            max-width: 600px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            color: white;
            margin: auto;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.2);
        }

        
        .container.shrink {
            width: 40%; 
        }

        form {
            padding: 20px;
            color: white;
            backdrop-filter: blur(5px);
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: red;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        input[type="text"], input[type="number"], input[type="email"], input[type="date"], input[type="tel"], textarea {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 2px solid red;
            background: white;
            color: black;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            background: red;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <a href="ADMIN.html">Dashboard</a>
        <a href="Appointment.html">Appointment</a>
        <a href="OVERVIEW.html">Overview</a>
        <a href="REGISTRATION.html">Registration</a>
    </div>

    <div class="sidebar-toggle" id="sidebar-toggle">
        &#9776; 
    </div>

    <div class="header">
        <div class="navbar">
            <a href="ADMIN.html">Home</a>
            <a href="signout.php">Logout</a>
        </div>
    </div>

    <div class="container" id="content">
        <form action="#" method="POST">
            <h2>Appointment Form</h2>
            <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px;">
                <div style="flex: 1;">
                    <label for="last-name">Last Name</label><br>
                    <input type="text" id="last-name" name="last_name" required>
                </div>
                <div style="flex: 1;">
                    <label for="first-name">First Name</label><br>
                    <input type="text" id="first-name" name="first_name" required>
                </div>
                <div style="flex: 1;">
                    <label for="middle-name">Middle Name</label><br>
                    <input type="text" id="middle-name" name="middle_name">
                </div>
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px;">
                <div style="flex: 1; min-width: 100px;">
                    <label for="age">Age</label><br>
                    <input type="number" id="age" name="age" required>
                </div>

                <div style="flex: 1; min-width: 120px;">
                    <label for="appointment">Date of Appointment</label><br>
                    <input type="date" id="appointment" name="appointment" required>
                </div>

                <div style="flex: 1; min-width: 150px;">
                    <label for="number">Phone Number</label><br>
                    <input type="tel" id="number" name="number" required>
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email">Email Address</label><br>
                <input type="email" id="email" name="email" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="reason">Reason for Appointment</label><br>
                <textarea id="reason" name="reason" rows="4" required></textarea>
            </div>

            <div style="text-align: center;">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const content = document.getElementById('content');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            sidebarToggle.classList.toggle('active');

            content.classList.toggle('shrink');
        });
    </script>

</body>
</html>
