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
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  
  <style>
    :root {
      --primary: #1abc9c;
      --primary-dark: #16a085;
      --secondary: #3498db;
      --dark: #2c3e50;
      --light: #ecf0f1;
      --gray: #95a5a6;
      --danger: #e74c3c;
      --success: #2ecc71;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
      min-height: 100vh;
      display: flex;
      color: #333;
      line-height: 1.6;
    }

    .seller-container {
      display: flex;
      width: 100%;
      max-width: 1400px;
      margin: 20px auto;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    /* Sidebar */
    .sidebar {
      width: 260px;
      background: var(--dark);
      color: white;
      padding: 25px 0;
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding: 0 25px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      margin-bottom: 20px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .logo i {
      color: var(--primary);
    }

    .seller-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .seller-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      font-weight: 600;
    }

    .seller-name {
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 4px;
    }

    .seller-status {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 12px;
      color: var(--primary);
    }

    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--primary);
    }

    .nav-menu {
      list-style: none;
      padding: 0 15px;
    }

    .nav-item {
      margin-bottom: 5px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      border-radius: 8px;
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      gap: 12px;
    }

    .nav-link:hover, .nav-link.active {
      background: rgba(255,255,255,0.1);
      color: white;
    }

    .nav-link i {
      width: 24px;
      text-align: center;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      background: white;
      padding: 30px;
      overflow-y: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .page-title {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 24px;
      font-weight: 700;
      color: var(--dark);
    }

    .page-title i {
      color: var(--primary);
    }

    .stats-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      border-left: 4px solid var(--primary);
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-title {
      font-size: 14px;
      color: var(--gray);
      margin-bottom: 8px;
    }

    .stat-value {
      font-size: 28px;
      font-weight: 700;
      color: var(--dark);
    }

    .stat-change {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 12px;
      margin-top: 5px;
      color: var(--success);
    }

    /* Form Styles */
    .sell-container {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    .form-header {
      background: linear-gradient(120deg, var(--primary), var(--secondary));
      color: white;
      padding: 25px 30px;
    }

    .form-header h2 {
      display: flex;
      align-items: center;
      gap: 15px;
      font-weight: 700;
      font-size: 24px;
    }

    .sell-form {
      padding: 30px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }

    .form-group {
      margin-bottom: 0;
    }

    .form-group.full-width {
      grid-column: 1 / -1;
    }

    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .form-label i {
      color: var(--primary);
      font-size: 18px;
    }

    .form-input {
      width: 100%;
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      padding: 14px 16px;
      border: 1px solid #e0e6ed;
      border-radius: 10px;
      background-color: #f9fbfd;
      transition: all 0.25s ease;
      color: #333;
    }

    .form-input:focus {
      border-color: var(--primary);
      background-color: #fff;
      outline: none;
      box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.15);
    }

    textarea.form-input {
      min-height: 120px;
      resize: vertical;
    }

    .file-upload {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 30px;
      border: 2px dashed #dce6f0;
      border-radius: 12px;
      background: #f9fbfd;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .file-upload:hover {
      border-color: var(--primary);
      background: rgba(26, 188, 156, 0.05);
    }

    .file-upload i {
      font-size: 40px;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .file-upload-text {
      text-align: center;
      margin-bottom: 15px;
    }

    .file-upload-text h3 {
      font-size: 18px;
      color: var(--dark);
      margin-bottom: 5px;
    }

    .file-upload-text p {
      font-size: 13px;
      color: var(--gray);
    }

    .file-input {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: 0;
      cursor: pointer;
    }

    .submit-btn {
      background: linear-gradient(120deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      padding: 16px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      grid-column: 1 / -1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow: 0 4px 15px rgba(26, 188, 156, 0.3);
    }

    .submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(26, 188, 156, 0.4);
    }

    .submit-btn:active {
      transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 992px) {
      .seller-container {
        flex-direction: column;
      }
      
      .sidebar {
        width: 100%;
        padding: 15px;
      }
      
      .nav-menu {
        display: flex;
        overflow-x: auto;
        padding-bottom: 10px;
      }
      
      .nav-item {
        flex: 0 0 auto;
        margin-bottom: 0;
        margin-right: 10px;
      }
    }

    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }
      
      .stats-container {
        grid-template-columns: 1fr;
      }
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
      animation: fadeIn 0.5s ease forwards;
    }
  </style>
</head>
<body>

<div class="seller-container">
  <!-- Seller Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="logo">
        <i class="fa-solid fa-car"></i>
        <span>AutoParts</span>
      </div>
      
      <div class="seller-info">
        <div class="seller-avatar"><?php echo substr($_SESSION['full_name'], 0, 1); ?></div>
        <div>
          <div class="seller-name"><?php echo $_SESSION['full_name']; ?></div>
          <div class="seller-status">
            <div class="status-dot"></div>
            <span>Online</span>
          </div>
        </div>
      </div>
    </div>
    
    <ul class="nav-menu">
      <li class="nav-item">
        <a href="#" class="nav-link active">
          <i class="fa-solid fa-gauge"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-plus"></i>
          <span>Sell Parts</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-box"></i>
          <span>My Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-chart-line"></i>
          <span>Analytics</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-money-bill"></i>
          <span>Earnings</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-gear"></i>
          <span>Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
  
  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <div class="page-title">
        <i class="fa-solid fa-car-wrench"></i>
        <h1>Sell Vehicle Parts</h1>
      </div>
      <div class="header-actions">
        <button class="btn">
          <i class="fa-solid fa-bell"></i>
        </button>
      </div>
    </div>
    
    <div class="stats-container">
      <div class="stat-card fade-in" style="animation-delay: 0.1s">
        <div class="stat-title">Active Listings</div>
        <div class="stat-value">24</div>
        <div class="stat-change">
          <i class="fa-solid fa-arrow-up"></i>
          <span>12% from last month</span>
        </div>
      </div>
      
      <div class="stat-card fade-in" style="animation-delay: 0.2s">
        <div class="stat-title">Total Earnings</div>
        <div class="stat-value">₹86,450</div>
        <div class="stat-change">
          <i class="fa-solid fa-arrow-up"></i>
          <span>₹12,450 this month</span>
        </div>
      </div>
      
      <div class="stat-card fade-in" style="animation-delay: 0.3s">
        <div class="stat-title">Conversion Rate</div>
        <div class="stat-value">42%</div>
        <div class="stat-change">
          <i class="fa-solid fa-arrow-down"></i>
          <span>3% from last month</span>
        </div>
      </div>
      
      <div class="stat-card fade-in" style="animation-delay: 0.4s">
        <div class="stat-title">Customer Rating</div>
        <div class="stat-value">4.8/5</div>
        <div class="stat-change">
          <i class="fa-solid fa-star"></i>
          <span>98% positive</span>
        </div>
      </div>
    </div>
    
    <div class="sell-container fade-in" style="animation-delay: 0.5s">
      <div class="form-header">
        <h2><i class="fa-solid fa-circle-plus"></i> Add New Product</h2>
      </div>
      
      <form action="submit_part.php" method="POST" enctype="multipart/form-data" class="sell-form">
        <div class="form-group">
          <label class="form-label" for="product_name">
            <i class="fa-solid fa-box"></i>
            Product Name
          </label>
          <input type="text" id="product_name" name="product_name" class="form-input" placeholder="e.g. Brake Pads Set" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="part_brand">
            <i class="fa-solid fa-trademark"></i>
            Product Brand
          </label>
          <select id="part_brand" name="part_brand" class="form-input" required>
            <option value="">- Select Brand -</option>
            <option value="Bosch">Bosch</option>
            <option value="Amaron">Amaron</option>
            <option value="Philips">Philips</option>
            <option value="Mann">Mann</option>
            <option value="Exide">Exide</option>
            <option value="Hella">Hella</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="vehicle_brand">
            <i class="fa-solid fa-car"></i>
            Vehicle Brand
          </label>
          <select id="vehicle_brand" name="vehicle_brand" class="form-input" required>
            <option value="">- Select Vehicle Brand -</option>
            <option value="Maruti">Maruti</option>
            <option value="Honda">Honda</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Kia">Kia</option>
            <option value="Mahindra">Mahindra</option>
            <option value="Tata">Tata</option>
            <option value="Toyota">Toyota</option>
            <option value="Ford">Ford</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="model">
            <i class="fa-solid fa-car-side"></i>
            Vehicle Model
          </label>
          <input type="text" id="model" name="model" class="form-input" placeholder="e.g. Swift Dzire, i20" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="price">
            <i class="fa-solid fa-indian-rupee-sign"></i>
            Price (₹)
          </label>
          <input type="number" id="price" name="price" class="form-input" placeholder="e.g. 2499" min="1" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="category">
            <i class="fa-solid fa-list"></i>
            Category
          </label>
          <select id="category" name="category" class="form-input" required>
            <option value="">- Select Category -</option>
            <option value="Engine">Engine Parts</option>
            <option value="Brakes">Brakes</option>
            <option value="Electrical">Electrical</option>
            <option value="Lighting">Lighting</option>
            <option value="Suspension">Suspension</option>
            <option value="Interior">Interior</option>
          </select>
        </div>
        
        <div class="form-group full-width">
          <label class="form-label" for="description">
            <i class="fa-solid fa-file-lines"></i>
            Product Description
          </label>
          <textarea id="description" name="description" class="form-input" placeholder="Describe the part, its features, and condition..." required></textarea>
        </div>
        
        <div class="form-group full-width">
          <label class="form-label" for="part_image">
            <i class="fa-solid fa-image"></i>
            Product Images
          </label>
          <div class="file-upload">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <div class="file-upload-text">
              <h3>Upload Product Images</h3>
              <p>Click to browse or drag & drop your images here</p>
              <p>PNG, JPG, JPEG up to 5MB</p>
            </div>
            <input type="file" id="part_image" name="part_image" class="file-input" accept="image/*" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="seller_name">
            <i class="fa-solid fa-user"></i>
            Seller Name
          </label>
          <input type="text" id="seller_name" name="seller_name" class="form-input" placeholder="Your name" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="phone">
            <i class="fa-solid fa-phone"></i>
            Contact Number
          </label>
          <input type="tel" id="phone" name="phone" class="form-input" placeholder="10-digit mobile number" pattern="[0-9]{10}" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="state">
            <i class="fa-solid fa-location-dot"></i>
            State
          </label>
          <select id="state" name="state" class="form-input" required>
            <option value="">- Select State -</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Kerala">Kerala</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Delhi">Delhi</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Rajasthan">Rajasthan</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="district">
            <i class="fa-solid fa-map"></i>
            District
          </label>
          <input type="text" id="district" name="district" class="form-input" placeholder="Your district" required>
        </div>
        
        <button type="submit" class="submit-btn">
          <i class="fa-solid fa-paper-plane"></i>
          Post Product
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  // Simple animation for form elements
  document.addEventListener('DOMContentLoaded', function() {
    const formGroups = document.querySelectorAll('.form-group');
    
    formGroups.forEach((group, index) => {
      group.style.opacity = '0';
      group.style.transform = 'translateY(20px)';
      group.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
    });
    
    // File upload hover effect
    const fileUpload = document.querySelector('.file-upload');
    const fileInput = document.querySelector('.file-input');
    
    fileInput.addEventListener('change', function() {
      if(this.files.length > 0) {
        fileUpload.innerHTML = `
          <i class="fa-solid fa-check-circle" style="color: #2ecc71; font-size: 40px;"></i>
          <div class="file-upload-text">
            <h3>${this.files.length} file(s) selected</h3>
            <p>${this.files[0].name}</p>
          </div>
        `;
      }
    });
  });
</script>

</body>
</html>