<!DOCTYPE html>
<html>
<head>
  <title>Sales Management</title>
  <style>
    /* CSS Styling for Sales Management Page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    .sales-table {
      width: 100%;
      border-collapse: collapse;
    }

    .sales-table th,
    .sales-table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .sales-table th {
      background-color: #4CAF50;
      color: white;
    }

    @media screen and (max-width: 600px) {
      .container {
        padding: 10px;
      }

      .form-group input[type="text"],
      .form-group input[type="number"] {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sales Management</h1>
    <form id="salesForm">
      <div class="form-group">
        <label for="transactionID">Transaction ID:</label>
        <input type="number" id="transactionID" name="transactionID" required>
      </div>
      <div class="form-group">
        <label for="customerID">Customer ID:</label>
        <input type="number" id="customerID" name="customerID" required>
      </div>
      <div class="form-group">
        <label for="powderID">Powder ID:</label>
        <input type="number" id="powderID" name="powderID" required>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
      </div>
      <div class="form-group">
        <label for="totalAmount">Total Amount:</label>
        <input type="number" id="totalAmount" name="totalAmount" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Add Sales">
      </div>
    </form>
    <h2>Sales Records</h2>
    <table class="sales-table">
      <thead>
        <tr>
          <th>Transaction ID</th>
          <th>Customer ID</th>
          <th>Powder ID</th>
          <th>Quantity</th>
          <th>Total Amount</th>
        </tr>
      </thead>
      <tbody id="salesRecords">
        <!-- Sales records will be dynamically populated here using JavaScript -->
      </tbody>
    </table>
  </div>

  <script>
    // JavaScript for Sales Management Page
    document.getElementById('salesForm').addEventListener('submit', function(event) {
      event.preventDefault();
      var transactionID = document.getElementById('transactionID').value;
      var customerID = document.getElementById('customerID').value;
      var powderID = document.getElementById('powderID').value;
      var quantity = document.getElementById('quantity').value;
      var totalAmount = document.getElementById('totalAmount').value;

      // Code to save sales record to the database goes here
      
      // Clear form fields after submission
      document.getElementById('transactionID').value = '';
      document.getElementById('customerID').value = '';
      document.getElementById('powderID').value = '';
      document.getElementById('quantity').value = '';
      document.getElementById('totalAmount').value = '';
    });

    // JavaScript to fetch and populate sales records from the database goes here
  </script>
</body>
</html>

