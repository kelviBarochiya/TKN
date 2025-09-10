@include('front-end.header')
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8" />-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<!--  <title>IT & Digital Transformation | Siyara CloudAI</title>-->
<!--  <meta name="description" content="Secure, scalable IT & cloud solutions for digital transformation. Talk to Siyara CloudAI experts today.">-->
<!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">-->
  <style>
    :root {
      --blue: #004aad;
      --orange: #ff6f00;
      --bg-light: #f9fafe;
      --bg-dark: #0e0e1a;
      --text: #222;
      --font: 'Inter', sans-serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: var(--font);
      background: var(--bg-light);
      color: var(--text);
    }

    header {
      background: linear-gradient(135deg, var(--blue), #031c46);
      color: white;
      padding: 80px 20px 100px;
      text-align: center;
      position: relative;
    }

    header h1 {
      font-size: 2.8rem;
      font-weight: 800;
      margin-bottom: 20px;
    }

    header p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: auto;
      line-height: 1.8;
    }

    .top-cta {
      margin-top: 30px;
    }

    .top-cta a {
      background: var(--orange);
      color: #fff;
      padding: 14px 30px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
      transition: 0.3s ease;
    }

    .top-cta a:hover {
      background: #e65100;
    }

    section.features {
      padding: 80px 20px;
      background: white;
      clip-path: polygon(0 4%, 100% 0%, 100% 96%, 0% 100%);
    }

    .features-inner {
      max-width: 1100px;
      margin: auto;
      text-align: center;
    }

    .features h2 {
      font-size: 2rem;
      color: var(--blue);
      margin-bottom: 20px;
    }

    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }

    .service-card {
      background: #f3f6fd;
      border-radius: 12px;
      padding: 25px;
      text-align: left;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
      transition: 0.3s ease;
    }

    .service-card:hover {
      transform: translateY(-5px);
    }

    .service-card h3 {
      font-size: 1.2rem;
      color: var(--orange);
      margin-bottom: 10px;
    }

    .service-card p {
      font-size: 1rem;
      color: #444;
    }

    .mid-cta {
      margin-top: 60px;
      text-align: center;
    }

    .mid-cta a {
      background: var(--blue);
      color: white;
      padding: 14px 28px;
      font-weight: 600;
      text-decoration: none;
      border-radius: 6px;
      font-size: 1rem;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .mid-cta a:hover {
      background: #002d74;
    }

    section.visual-block {
      background: #fefefe;
      padding: 80px 20px;
      text-align: center;
    }

    .visual-block h2 {
      font-size: 1.8rem;
      color: var(--blue);
      margin-bottom: 20px;
    }

    .visual-block p {
      font-size: 1.1rem;
      max-width: 750px;
      margin: auto;
      margin-bottom: 40px;
    }

    .visual-placeholder {
      width: 100%;
      max-width: 720px;
      height: 300px;
      margin: auto;
      background: repeating-linear-gradient(135deg, #e0e0e0, #e0e0e0 10px, #f9f9f9 10px, #f9f9f9 20px);
      border-radius: 10px;
      box-shadow: inset 0 0 30px rgba(0, 0, 0, 0.04);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      color: #999;
    }

    .final-cta {
      background: var(--orange);
      color: white;
      padding: 60px 20px;
      text-align: center;
    }

    .final-cta h2 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .final-cta a {
      display: inline-block;
      background: white;
      color: var(--orange);
      font-weight: 700;
      padding: 14px 32px;
      font-size: 1rem;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
      transition: 0.3s ease;
    }

    .final-cta a:hover {
      background: #ffe0b2;
    }

    @media (max-width: 600px) {
      header h1 {
        font-size: 2rem;
      }
    }
  </style>
<!--</head>-->
<!--<body>-->

  <!-- HERO SECTION -->
  <header>
    <h1 style="color:#FFF;">Scale Your Business with Smart IT & Cloud Solutions</h1>
    <p>
      Digital transformation isn’t optional — it’s essential. At Siyara CloudAI LLC, we deliver secure, scalable IT solutions that enable businesses to modernize infrastructure, improve system performance, and enhance digital agility.
    </p>
    <div class="top-cta">
      <a href="https://siyaracloud.com/contact" target="_blank">⚙️ Talk to Our IT Experts</a>
    </div>
  </header>

  <!-- SERVICES SECTION -->
<section class="features">
  <div class="features-inner">
    <h2 style="font-size: 2rem; color: #004aad; text-align: center; margin-bottom: 40px;">
      Our Key IT & Transformation Services
    </h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px; max-width: 1200px; margin: auto;">
      
      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">☁️ Cloud Infrastructure & Migration</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Seamless migration to scalable cloud environments with high performance, strong security, and zero operational disruption.
        </p>
      </div>

      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">⚙️ Intelligent Workflow Automation</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Boost efficiency by automating business-critical tasks, reducing manual errors, and enabling smarter process flows.
        </p>
      </div>

      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">🌱 Digital Transformation Strategy</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Strategic guidance and execution to modernize legacy systems and align your IT roadmap with scalable digital goals.
        </p>
      </div>

      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">🔐 Cyber-secure IT Architecture</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Designing secure, future-ready infrastructure tailored to your compliance needs, industry standards, and performance.
        </p>
      </div>

      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">🧠 AI-Driven Performance Monitoring</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Continuously monitor system performance with AI to detect issues proactively, optimize uptime, and reduce downtime risk.
        </p>
      </div>

      <div style="background: #f5f9ff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="color: #ff6f00; font-size: 1.1rem; margin-bottom: 10px;">📲 Enterprise App Modernization</h3>
        <p style="font-size: 0.95rem; color: #333;">
          Upgrade legacy applications to modern, cloud-native stacks for improved scalability, faster deployments, and better UX.
        </p>
      </div>

    </div>
  </div>
</section>


  <!-- VISUAL SECTION PLACEHOLDER -->
  <section class="visual-block">
    <h2>Visualize Your IT Growth</h2>
    <p>We can generate an AI-based illustration or infographic here explaining your transformation roadmap.</p>
    <div class="visual-placeholder">
     <img src="https://siyaracloud.com/public/front-end/img/ai_content_siyra.png">
    </div>
  </section>

  <!-- FINAL CTA -->
  <section class="final-cta">
    <h2>⚙️ Future-proof Your Operations Today</h2>
    <a href="https://siyaracloud.com/contact" target="_blank">📞 Talk to Our IT Experts</a>
  </section>

<!--</body>-->
<!--</html>-->



@include('front-end.footer')