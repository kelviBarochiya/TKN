@include('front-end.header')
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8" />-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<!--  <title>Sustainable Digital Solutions</title>-->
<!--  <meta name="description" content="Go green with AI-driven digital solutions from Siyara CloudAI LLC. Reduce your footprint while improving efficiency.">-->
<!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">-->
  <style>
    :root {
      --primary: #2e7d32;  /* green */
      --accent: #aeea00;   /* lime accent */
      --dark: #0a0a23;
      --light: #f5fef5;
      --font: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font);
      background: var(--light);
      color: var(--dark);
      margin: 0;
      padding: 0;
    }

    .section {
      padding: 60px 20px;
      text-align: center;
    }

    .headline h1 {
      font-size: 2.8rem;
      color: var(--primary);
      font-weight: 800;
      margin-bottom: 20px;
    }

    .headline p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: auto;
      line-height: 1.8;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      max-width: 1100px;
      margin: 50px auto 20px;
    }

    .feature-card {
      background: white;
      border-left: 6px solid var(--primary);
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-card h3 {
      color: var(--primary);
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .feature-card p {
      font-size: 1rem;
      color: #333;
    }

    .cta-section {
      background: white;
      border-radius: 12px;
      padding: 40px 30px;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      max-width: 600px;
      margin: 50px auto;
    }

    .cta-section h2 {
      font-size: 1.8rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .cta-section p {
      font-size: 1.1rem;
      margin-bottom: 25px;
    }

    .cta-section a {
      background: var(--accent);
      color: black;
      text-decoration: none;
      padding: 14px 28px;
      font-weight: 600;
      border-radius: 8px;
      display: inline-block;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }

    .cta-section a:hover {
      background: #c6ff00;
    }

    @media (max-width: 600px) {
      .headline h1 {
        font-size: 2rem;
      }
    }
  </style>
<!--</head>-->
<!--<body>-->

  <!-- Headline Section -->
  <section class="section headline">
    <h1>Go Green with Smart, AI-Driven Technology</h1>
    <p>
      Sustainability isn’t just a trend — it’s a business imperative. Siyara CloudAI LLC delivers go-green solutions that leverage AI to help your business reduce its environmental impact while staying competitive.
    </p>
    <p style="margin-top: 20px;">
      Our smart systems use data to optimize energy use, minimize waste, and support paperless operations — helping your organization meet both compliance goals and environmental commitments.
    </p>
  </section>

  <!-- Features Section -->
  <section class="section">
    <div class="features">
      <div class="feature-card">
        <h3>🌱 AI-based Carbon Monitoring</h3>
        <p>Track your environmental footprint in real time and optimize impact across departments.</p>
      </div>
      <div class="feature-card">
        <h3>⚡ Digital Energy Optimization</h3>
        <p>Use AI to fine-tune energy consumption, detect inefficiencies, and cut down waste.</p>
      </div>
      <div class="feature-card">
        <h3>♻️ Smart Waste Tracking</h3>
        <p>Analyze resource usage and reduce physical waste with intelligent sensor-based insights.</p>
      </div>
      <div class="feature-card">
        <h3>📝 Paperless Eco-Workflows</h3>
        <p>Eliminate paper processes with secure, cloud-first solutions that save trees and time.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section">
    <div class="cta-section">
      <h2>🌿 Build a Smarter, Greener Business Today</h2>
      <p>Schedule your free sustainability consultation with our AI experts.</p>
      <a href="https://siyaracloud.com/contact" target="_blank">📅 Get a Sustainability Consultation</a>
    </div>
  </section>

<!--</body>-->
<!--</html>-->



@include('front-end.footer')