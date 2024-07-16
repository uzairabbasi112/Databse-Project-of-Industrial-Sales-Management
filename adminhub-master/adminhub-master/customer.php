<!DOCTYPE html>
<html>
<head>
  <title>Customer Management</title>
  <style>
    /* Styles for the page layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
    }

    /* Styles for the form */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="tel"],
    .form-group textarea {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Styles for the table */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    /* Styles for buttons */
    .btn {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-right: 5px;
      cursor: pointer;
      border-radius: 4px;
    }

    .btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Customer Management</h1>
    <form id="customerForm">
      <div class="form-group">
        <label for="customerName">Customer Name:</label>
        <input type="text" id="customerName" name="customerName" required>
      </div>
      <div class="form-group">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Add Customer">
      </div>
    </form>
    <table id="customerTable">
      <thead>
        <tr>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Contact Number</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        <!-- Customer records will be dynamically added here -->
      </tbody>
    </table>
  </div>

  <script>
    document.getElementById("customerForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      // Retrieve form data
      var customerName = document.getElementById("customerName").value;
      var contactNumber = document.getElementById("contactNumber").value;
      var address = document.getElementById("address").value;

      // Create a new row for the table
      var table = document.getElementById("customerTable").getElementsByTagName("tbody")[0];
      var newRow = table.insertRow();

      // Insert data into the new row
      var cell1 = newRow.insertCell();
      var cell2 = newRow.insertCell();
      var cell3 = newRow.insertCell();
      var cell4 = newRow.insertCell();

      cell1.innerHTML = ""; // Replace with customer ID from the database
      cell2.innerHTML = customerName;
      cell3.innerHTML = contactNumber;
      cell4.innerHTML = address;

      // Clear the form fields
      document.getElementById("customerName").value = "";
      document.getElementById("contactNumber").value = "";
      document.getElementById("address").value = "";
    });
  </script>
</body>
</html>
