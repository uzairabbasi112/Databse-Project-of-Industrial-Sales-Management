<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rock and Powder Management</title>
  <style>
    /* CSS styles for the Rock and Powder Management page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #f5f5f5;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      text-align: center;
      color: #333;
    }
    
    form {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
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
    
    @media screen and (max-width: 600px) {
      .container {
        max-width: 100%;
        margin: 10px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Rock and Powder Management</h1>
    <form>
      <label for="rockType">Rock Type:</label>
      <input type="text" id="rockType" name="rockType" required>
      
      <label for="rockWeight">Rock Weight:</label>
      <input type="number" id="rockWeight" name="rockWeight" required>
      
      <button type="submit">Add Rock</button>
    </form>
    
    <table>
      <tr>
        <th>Rock ID</th>
        <th>Rock Type</th>
        <th>Rock Weight</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Lump</td>
        <td>10.5</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Phosphate</td>
        <td>8.2</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Copper</td>
        <td>5.7</td>
      </tr>
    </table>
    
    <form>
      <label for="powderRock">Rock:</label>
      <select id="powderRock" name="powderRock" required>
        <option value="">Select a rock</option>
        <option value="1">Lump</option>
        <option value="2">Phosphate</option>
        <option value="3">Copper</option>
      </select>
      
      <label for="powderWeight">Powder Weight:</label>
      <input type="number" id="powderWeight" name="powderWeight" required>
      
      <button type="submit">Add Powder</button>
    </form>
    
    <table>
      <tr>
        <th>Powder ID</th>
        <th>Rock Type</th>
        <th>Powder Weight</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Lump</td>
        <td>5.2</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Phosphate</td>
        <td>4.1</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Copper</td>
        <td>3.5</td>
      </tr>
    </table>
  </div>
</body>
</html>
