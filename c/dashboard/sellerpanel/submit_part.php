<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Seller Portal - AutoParts</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-[#1abc9c] text-white p-5 flex justify-between items-center shadow-md">
    <h1 class="text-2xl font-bold">Seller Portal</h1>
    <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Logout</a>
  </header>

  <div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-5">
      <nav class="space-y-4">
        <a href="#" class="block py-2 px-3 rounded hover:bg-[#1abc9c]">Dashboard</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-[#1abc9c]">Orders</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-[#1abc9c]">Inventory</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-[#1abc9c]">Messages</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-[#1abc9c]">Settings</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <h2 class="text-xl font-semibold text-[#1abc9c] mb-6">Add New Part</h2>

      <form action="add_part.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-4">
        <div>
          <label class="block font-medium mb-1">Part Name</label>
          <input type="text" name="part_name" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1abc9c]" required>
        </div>

        <div>
          <label class="block font-medium mb-1">Category</label>
          <select name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1abc9c]">
            <option>Engine</option>
            <option>Brakes</option>
            <option>Suspension</option>
            <option>Electrical</option>
            <option>Body</option>
          </select>
        </div>

        <div>
          <label class="block font-medium mb-1">Price</label>
          <input type="number" name="price" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1abc9c]" required>
        </div>

        <div>
          <label class="block font-medium mb-1">Stock Quantity</label>
          <input type="number" name="stock" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1abc9c]" required>
        </div>

        <div>
          <label class="block font-medium mb-1">Upload Image</label>
          <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-white file:bg-[#1abc9c] hover:file:bg-[#16a085]">
        </div>

        <div>
          <label class="block font-medium mb-1">Description</label>
          <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1abc9c]"></textarea>
        </div>

        <button type="submit" class="bg-[#3498db] hover:bg-[#2980b9] text-white px-5 py-2 rounded-lg font-medium">Add Part</button>
      </form>
    </main>
  </div>

</body>
</html>
