<?php
session_start();
include 'db.php';?>
<!DOCTYPE> 
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmer Resources</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    header {
      background: #4CAF50;
      color: white;
      padding: 20px 0;
      text-align: center;
    }
    .container {
      padding: 20px;
      max-width: 1200px;
      margin: auto;
      background: white;
    }
    h2 {
      color: #4CAF50;
      border-bottom: 2px solid #4CAF50;
      padding-bottom: 5px;
    }
    ul {
      list-style: disc;
      padding-left: 20px;
    }
    a {
      color: #0066cc;
      text-decoration: none;
    }
    
    .section {
      margin-bottom: 40px;
    }
  </style>
</head>
<body>
<nav style="background:#25632f; padding:10px; text-align:center;">
  <a href="homepage.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">Home</a>
  <a href="dashboard.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">Dashboard</a>
  <a href="resources.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">Resources</a>
  <a href="logout.php" style="color:white; margin:0 15px; text-decoration:none; font-weight:bold;">Logout</a>
</nav>
  <header>
    <h1>Farmer Resources</h1>

    <p>Empowering farmers with information, tools, and support.</p>
  </header>

  <div class="container">

    <div class="section">
      <h2>🌾 Government Schemes & Subsidies</h2>
      <ul>
        <li><a href="https://pmkisan.gov.in/" target="_blank">PM-KISAN Scheme</a></li>
        <li>Fasal Bima Yojana (Crop Insurance)</li>
        <li>Soil Health Card Scheme</li>
        <li>Subsidy application forms and how-to guides</li>
        <li>State-level schemes and benefits</li>
      </ul>
    </div>

    <div class="section">
      <h2>📊 Market Information</h2>
      <ul>
        <li>Daily mandi prices</li>
        <li>Price trends for major crops</li>
        <li>Export opportunities for seasonal crops</li>
        <li><a href="https://agmarknet.gov.in/" target="_blank">Agmarknet Portal</a></li>
      </ul>
    </div>

    <div class="section">
      <h2>📅 Crop Calendar / Planting Guides</h2>
      <ul>
        <li>Season-wise crop planning</li>
        <li>Region-specific sowing and harvesting guides</li>
        <li>Intercropping and crop rotation techniques</li>
      </ul>
    </div>

    <div class="section">
      <h2>🚜 Agricultural Tools & Technology</h2>
      <ul>
        <li>Modern farm machinery usage</li>
        <li>Renting equipment in your area</li>
        <li>Precision and smart farming techniques</li>
        <li>Organic farming guides</li>
      </ul>
    </div>

    <div class="section">
      <h2>💧 Irrigation & Water Management</h2>
      <ul>
        <li>Drip and sprinkler systems</li>
        <li>Rainwater harvesting methods</li>
        <li>Water-saving farming practices</li>
        <li>Soil moisture sensors and tools</li>
      </ul>
    </div>

    <div class="section">
      <h2>🐄 Animal Husbandry & Fisheries</h2>
      <ul>
        <li>Cattle and poultry care tips</li>
        <li>Common livestock diseases and prevention</li>
        <li>Fish farming best practices</li>
        <li>Veterinary services and helplines</li>
      </ul>
    </div>

    <div class="section">
      <h2>🧪 Soil & Crop Health</h2>
      <ul>
        <li>Soil testing services</li>
        <li>Pest and disease identification tools</li>
        <li>Fertilizer recommendations based on crop and region</li>
        <li>Organic pest control solutions</li>
      </ul>
    </div>

    <div class="section">
      <h2>💼 Training & Education</h2>
      <ul>
        <li>Free and paid farming courses (online & offline)</li>
        <li>Webinars and agriculture expos</li>
        <li>Success stories of farmers</li>
        <li>Extension centers and agri-universities</li>
      </ul>
    </div>

    <div class="section">
      <h2>📱 Useful Apps & Websites</h2>
      <ul>
        <li><a href="https://mkisan.gov.in/" target="_blank">mKisan Portal</a></li>
        <li>Kisan Suvidha App</li>
        <li>Weather forecast apps</li>
        <li>Agri e-commerce platforms</li>
      </ul>
    </div>

    <div class="section">
      <h2>🏦 Finance & Insurance</h2>
      <ul>
        <li>Crop loans from banks/co-ops</li>
        <li>Microfinance & self-help group info</li>
        <li>Crop insurance claim steps</li>
        <li>Loan calculators</li>
      </ul>
    </div>

    <div class="section">
      <h2>🆘 Emergency Helplines & Support</h2>
      <ul>
        <li>Natural disaster support contacts</li>
        <li>Farmer grievance redressal portals</li>
        <li>Farmer distress helplines</li>
      </ul>
    </div>

    <div class="section">
      <h2>🌍 Sustainability & Climate Resources</h2>
      <ul>
        <li>Climate-resilient farming methods</li>
        <li>Agroforestry practices</li>
        <li>Eco-friendly fertilizers and techniques</li>
        <li>Carbon farming info</li>
      </ul>
    </div>

    <div class="section">
      <h2>🗂 Downloads & Templates</h2>
      <ul>
        <li>Loan application forms (PDF)</li>
        <li>Crop calendar PDF (regional languages)</li>
        <li>Farm record-keeping templates (Excel/Word)</li>
        <li>Sample lease agreements</li>
      </ul>
    </div>

    <div class="section">
      <h2>🎥 Videos & Tutorials</h2>
      <ul>
        <li>Step-by-step guides for pest control, irrigation, etc.</li>
        <li>Farmer success stories</li>
        <li>How to use farm machinery videos</li>
      </ul>
    </div>

    <div class="section">
      <h2>📰 News & Updates</h2>
      <ul>
        <li>Agriculture policy changes</li>
        <li>Crop disease alerts</li>
        <li>Latest news in the farming sector</li>
      </ul>
    </div>

  </div>
</body>
</html>