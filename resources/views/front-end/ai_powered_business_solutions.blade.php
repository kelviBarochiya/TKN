@include('front-end.header')
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8" />-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<!--  <title>Siyara CloudAI – AI Business Automation Solutions</title>-->
<!--  <meta name="description" content="Transform your business with Siyara CloudAI's cutting-edge AI solutions. Book a free consultation today!">-->
<!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">-->
  <style>
    :root {
      --primary: #004aad;
      --accent: #ffc107;
      --dark: #0a0a23;
      --light: #f4f6fa;
      --font: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font);
      background: var(--light);
      color: var(--dark);
      margin: 0;
    }

    .hero {
      background: linear-gradient(135deg, var(--primary), #031c46);
      color: white;
      padding: 80px 20px;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 20px;
      text-transform: uppercase;
    }

    .hero p {
      font-size: 1.3rem;
      max-width: 800px;
      margin: auto;
      line-height: 1.8;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .feature-box {
      background: white;
      border-left: 5px solid var(--accent);
      box-shadow: 0 10px 25px rgba(0,0,0,0.07);
      padding: 25px;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .feature-box:hover {
      transform: translateY(-5px);
    }

    .feature-box h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: var(--primary);
    }

    .feature-box p {
      font-size: 1rem;
      color: #333;
    }

    .cta {
      background: #f9fafe;
      padding: 60px 20px;
      text-align: center;
    }

    .cta-box {
      max-width: 600px;
      margin: 0 auto;
      background: white;
      padding: 30px 20px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .cta-box h2 {
      font-size: 1.8rem;
      color: var(--primary);
      margin-bottom: 20px;
    }

    .cta-box p {
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .cta-box a {
      display: inline-block;
      background: var(--accent);
      color: #000;
      font-weight: 600;
      padding: 14px 28px;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 4px 14px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }

    .cta-box a:hover {
      background: #e0a800;
    }

    @media (max-width: 600px) {
      .hero h1 {
        font-size: 2rem;
      }
    }
  </style>
<!--</head>-->
<!--<body>-->

  <!-- HERO SECTION -->
  <section class="hero">
    <h1>Unlock Business Efficiency with AI</h1>
    <p>
      Supercharge your operations with Siyara CloudAI LLC — leveraging platforms like ChatGPT, Claude, Jasper, and DeepSeek to drive productivity, automate workflows, and elevate customer experiences.
    </p>
  </section>

  <!-- FEATURES SECTION -->
  <section class="features">
    <div class="feature-box">
      <h3>🚀 Custom AI Workflows</h3>
      <p>Automate repetitive tasks, improve team focus, and scale faster with intelligent automation.</p>
    </div>
    <div class="feature-box">
      <h3>🔌 Seamless Integration</h3>
      <p>Connect AI with your CRM, ERP, or legacy tools without disrupting your current systems.</p>
    </div>
    <div class="feature-box">
      <h3>🧠 Smart Language Processing</h3>
      <p>Use NLP to analyze data, predict trends, and respond to customers in real-time.</p>
    </div>
    <div class="feature-box">
      <h3>⏱ 24/7 AI Support Systems</h3>
      <p>Deploy AI chatbots that solve problems, answer queries, and drive conversions round-the-clock.</p>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="cta" id="consultation">
    <div class="cta-box">
      <h2>🚀 Ready to Transform Your Business with AI?</h2>
      <p>Book a free consultation and discover how Siyara CloudAI LLC can build automation that scales with your growth.</p>
      <a href="https://siyaracloud.com/contact" target="_blank">📅 Schedule Free Consultation</a>
    </div>
  </section>

<!--</body>-->
<!--</html>-->



@include('front-end.footer')