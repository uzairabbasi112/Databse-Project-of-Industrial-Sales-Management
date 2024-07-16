<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dealer Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 5px;
    }

    form input[type="text"],
    form input[type="tel"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: #fff;
    }

    @media (max-width: 600px) {
      .container {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Dealer Management</h1>

    <form id="dealerForm">
      <input type="hidden" id="dealerID">
      <input type="text" id="dealerName" placeholder="Dealer Name" required>
      <input type="tel" id="contactNumber" placeholder="Contact Number" required>
      <input type="text" id="address" placeholder="Address" required>
      <input type="submit" value="Save Dealer">
    </form>

    <table id="dealerTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- Dealer records will be dynamically added here using JavaScript -->
      </tbody>
    </table>
  </div>

  <script>
    // JavaScript code for interacting with the database goes here
  </script>
</body>
</html>
