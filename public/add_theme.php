<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Theme Form</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background: #fff;
    padding: 24px;
    width: 320px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

h2 {
    margin-top: 0;
    text-align: center;
}

label {
    display: block;
    margin-top: 12px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 6px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    margin-top: 20px;
    padding: 10px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background: #43a047;
}
</style>
</head>

<body>

<div class="form-container">
    <h2>Add Theme</h2>

    <form action="">
        <label>Theme Name</label>
        <input type="text" placeholder="My Theme">

        <label>Theme Color</label>
        <input type="color" value="#4CAF50">

        <button type="submit">Save Theme</button>
    </form>
</div>

</body>
</html>
