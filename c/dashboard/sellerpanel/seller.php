<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sell a Part - AutoParts Seller Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex">

<div class="flex w-full max-w-[1400px] mx-auto my-5 rounded-xl overflow-hidden shadow-lg">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-900 text-white p-6">
    <div class="flex items-center gap-3 mb-8 border-b border-gray-700 pb-5">
      <i class="fa-solid fa-car text-teal-400 text-2xl"></i>
      <span class="font-bold text-xl">AutoParts</span>
    </div>

    <div class="flex items-center gap-3 mb-8">
      <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center font-semibold text-lg">
        <?php echo substr($_SESSION['full_name'], 0, 1); ?>
      </div>
      <div>
        <div class="font-semibold"><?php echo $_SESSION['full_name']; ?></div>
        <div class="flex items-center text-xs text-teal-400">
          <span class="w-2 h-2 rounded-full bg-teal-400 mr-1"></span> Online
        </div>
      </div>
    </div>

    <nav class="space-y-1">
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md bg-gray-800 hover:bg-gray-700">
        <i class="fa-solid fa-gauge"></i> Dashboard
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fa-solid fa-plus"></i> Sell Parts
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fa-solid fa-box"></i> My Products
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fa-solid fa-chart-line"></i> Analytics
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fa-solid fa-money-bill"></i> Earnings
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fa-solid fa-gear"></i> Settings
      </a>
      <a href="logout.php" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-gray-700 text-red-400">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 bg-white p-8 overflow-y-auto">
    <!-- Header -->
    <div class="flex flex-wrap justify-between items-center border-b pb-5 mb-6">
      <div class="flex items-center gap-3 text-gray-800 text-2xl font-bold">
        <i class="fa-solid fa-car-wrench text-teal-500"></i>
        Sell Vehicle Parts
      </div>
      <button class="p-2 rounded-full hover:bg-gray-100">
        <i class="fa-solid fa-bell text-gray-600"></i>
      </button>
    </div>

    <!-- Stats -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-8">
      <div class="bg-white border-l-4 border-teal-500 rounded-lg p-5 shadow hover:shadow-md transition">
        <div class="text-sm text-gray-500">Active Listings</div>
        <div class="text-2xl font-bold">24</div>
        <div class="text-green-500 text-xs flex items-center gap-1 mt-1">
          <i class="fa-solid fa-arrow-up"></i> 12% from last month
        </div>
      </div>
      <div class="bg-white border-l-4 border-teal-500 rounded-lg p-5 shadow hover:shadow-md transition">
        <div class="text-sm text-gray-500">Total Earnings</div>
        <div class="text-2xl font-bold">₹86,450</div>
        <div class="text-green-500 text-xs flex items-center gap-1 mt-1">
          <i class="fa-solid fa-arrow-up"></i> ₹12,450 this month
        </div>
      </div>
      <div class="bg-white border-l-4 border-teal-500 rounded-lg p-5 shadow hover:shadow-md transition">
        <div class="text-sm text-gray-500">Conversion Rate</div>
        <div class="text-2xl font-bold">42%</div>
        <div class="text-red-500 text-xs flex items-center gap-1 mt-1">
          <i class="fa-solid fa-arrow-down"></i> 3% from last month
        </div>
      </div>
      <div class="bg-white border-l-4 border-teal-500 rounded-lg p-5 shadow hover:shadow-md transition">
        <div class="text-sm text-gray-500">Customer Rating</div>
        <div class="text-2xl font-bold">4.8/5</div>
        <div class="text-yellow-500 text-xs flex items-center gap-1 mt-1">
          <i class="fa-solid fa-star"></i> 98% positive
        </div>
      </div>
    </div>

    <!-- Add Product Form -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <div class="bg-gradient-to-r from-teal-500 to-blue-500 text-white p-5 text-lg font-bold flex items-center gap-3">
        <i class="fa-solid fa-circle-plus"></i> Add New Product
      </div>

      <form action="submit_part.php" method="POST" enctype="multipart/form-data" class="p-6 grid gap-5 md:grid-cols-2">
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-box text-teal-500"></i> Product Name</label>
          <input type="text" name="product_name" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. Exide Car Battery" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-file-lines text-teal-500"></i> Description</label>
          <textarea name="description" class="w-full border rounded-lg px-4 py-2" placeholder="Product description..." required></textarea>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-indian-rupee-sign text-teal-500"></i> Price (₹)</label>
          <input type="number" name="price" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. 4250" min="1" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-trademark text-teal-500"></i> Brand</label>
          <input type="text" name="brand" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. Exide" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-car text-teal-500"></i> Vehicle Type</label>
          <select name="vehicle_type" class="w-full border rounded-lg px-4 py-2" required>
            <option value="Car">Car</option>
            <option value="Truck">Truck</option>
            <option value="Motorcycle">Motorcycle</option>
            <option value="SUV">SUV</option>
          </select>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-car-side text-teal-500"></i> Compatible Models</label>
          <input type="text" name="compatible_models" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. Maruti Swift, Hyundai i20" required>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-image text-teal-500"></i> Product Image URL</label>
          <input type="url" name="part_image" class="w-full border rounded-lg px-4 py-2" placeholder="https://example.com/image.jpg" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-check-circle text-teal-500"></i> Availability</label>
          <select name="availability" class="w-full border rounded-lg px-4 py-2" required>
            <option value="In Stock">In Stock</option>
            <option value="Out of Stock">Out of Stock</option>
            <option value="Pre-order">Pre-order</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-list text-teal-500"></i> Category</label>
          <input type="text" name="category" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. Batteries" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-shield text-teal-500"></i> Warranty</label>
          <input type="text" name="warranty" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. 24 months" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-star text-teal-500"></i> Rating (1-5)</label>
          <input type="number" name="rating" class="w-full border rounded-lg px-4 py-2" placeholder="4.5" min="1" max="5" step="0.1" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-store text-teal-500"></i> Seller Name</label>
          <input type="text" name="seller" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. AutoZone India" required>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1"><i class="fa-solid fa-truck text-teal-500"></i> Delivery Time</label>
          <input type="text" name="delivery_time" class="w-full border rounded-lg px-4 py-2" placeholder="e.g. 2-4 Days" required>
        </div>
        <div class="md:col-span-2">
          <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-blue-500 text-white py-3 rounded-lg font-semibold flex items-center justify-center gap-2 hover:shadow-lg hover:translate-y-[-2px] transition">
            <i class="fa-solid fa-paper-plane"></i> Post Product
          </button>
        </div>
      </form>
    </div>
  </main>
</div>

</body>
</html>
