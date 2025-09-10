@include('front-end.header')
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8" />-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<!--  <title>AI-Powered Business Intelligence | Siyara CloudAI</title>-->
<!--  <meta name="description" content="Use AI-enhanced analytics to turn your data into actionable business insights. Book a data strategy session with Siyara CloudAI.">-->
<!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">-->
  <style>
    :root {
      --primary: #004aad;
      --accent: #ffc107;
      --dark: #0a0a23;
      --light: #f4f6fa;
      --font: 'Inter', sans-serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: var(--font);
      background: var(--light);
      color: var(--dark);
    }

    .wrapper {
      max-width: 1200px;
      margin: auto;
      padding: 60px 20px;
    }

    .intro {
      text-align: left;
      max-width: 800px;
      margin-bottom: 40px;
    }

    .intro h1 {
      font-size: 2.8rem;
      font-weight: 800;
      color: var(--primary);
      margin-bottom: 20px;
    }

    .intro p {
      font-size: 1.2rem;
      line-height: 1.8;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }

    .feature {
      background: white;
      padding: 25px;
      border-radius: 10px;
      border-left: 4px solid var(--primary);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .feature:hover {
      transform: translateY(-5px);
    }

    .feature h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: var(--primary);
    }

    .feature p {
      font-size: 1rem;
      color: #333;
    }

    .cta-section {
      margin-top: 60px;
      background: white;
      border-radius: 12px;
      padding: 40px 30px;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
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
      background: #e0a800;
    }

    @media (max-width: 600px) {
      .intro h1 {
        font-size: 2rem;
      }
      .cta-section h2 {
        font-size: 1.4rem;
      }
    }
  </style>
<!--</head>-->
<!--<body>-->

  <div class="wrapper">
    <!-- INTRO -->
    <div class="intro">
      <h1>Turn Raw Data into Real Business Intelligence</h1>
      <p>
        Data is only valuable when it drives action. At <strong>Siyara CloudAI LLC</strong>, we help businesses harness their data through AI-enhanced analytics and predictive modeling. From real-time dashboards to long-term forecasting, we equip you with the insights to make smarter decisions, faster.
      </p>
      <p style="margin-top: 20px;">
        Our analytics solutions dig deep into customer behavior, operational trends, and market movements — delivering actionable intelligence that puts you ahead of the curve.
      </p>
    </div>

    <!-- FEATURES -->
    <div class="features">
      <div class="feature">
        <h3>📈 Predictive Analytics & Forecasting</h3>
        <p>Anticipate market trends, customer behavior, and operational bottlenecks before they happen.</p>
      </div>
      <div class="feature">
        <h3>📊 Real-Time Dashboards</h3>
        <p>Interactive, up-to-the-minute dashboards that help you monitor performance and KPIs live.</p>
      </div>
      <div class="feature">
        <h3>🧠 AI-Driven Decision Intelligence</h3>
        <p>Empower every team to make data-backed decisions with intelligent recommendations.</p>
      </div>
      <div class="feature">
        <h3>🗂 Custom Department Reports</h3>
        <p>Get tailored insights for HR, sales, finance, or operations — all from one platform.</p>
      </div>
    </div>

    <!-- CTA -->
    <div class="cta-section" id="cta">
      <h2>📊 Let Your Data Work for You</h2>
      <p style="text-align: center;">Book a data strategy session with our AI analytics experts today.</p>
      <a href="https://siyaracloud.com/contact" target="_blank">📅 Book a Data Strategy Session</a>
    </div>
  </div>

<!--</body>-->
<!--</html>-->



@include('front-end.footer')