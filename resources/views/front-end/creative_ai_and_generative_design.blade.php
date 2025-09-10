@include('front-end.header')

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8" />-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
<!--  <title>Creative AI & Generative Design | Siyara CloudAI</title>-->
<!--  <meta name="description" content="Create stunning visuals using MidJourney, DALL·E & more with Siyara CloudAI's generative AI tools.">-->
<!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">-->
  <style>
    :root {
      --gradient: linear-gradient(135deg, #4e54c8, #8f94fb);
      --dark-bg: #0f111a;
      --text: #f1f1f1;
      --card-bg: rgba(255, 255, 255, 0.05);
      --highlight: #ff5f6d;
      --button: #ff7e5f;
      --font: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      font-family: var(--font);
      background: var(--dark-bg);
      color: var(--text);
    }

    .section {
      padding: 80px 20px;
      text-align: center;
    }

    .headline h1 {
      font-size: 2.8rem;
      font-weight: 800;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 20px;
    }

    .headline p {
      font-size: 1.2rem;
      max-width: 850px;
      margin: auto;
      line-height: 1.7;
      color: #ccc;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      max-width: 1100px;
      margin: 60px auto 20px;
    }

    .card {
      background: var(--card-bg);
      border-radius: 15px;
      padding: 30px 20px;
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .card h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #ffffff;
    }

    .card p {
      font-size: 1rem;
      color: #c9c9c9;
    }

    .cta-section {
      margin-top: 70px;
    }

    .cta-box {
      background: var(--card-bg);
      border: 1px solid rgba(255,255,255,0.08);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 40px 30px;
      max-width: 600px;
      margin: 0 auto;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    .cta-box h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .cta-box p {
      font-size: 1.1rem;
      color: #ccc;
      margin-bottom: 30px;
    }

    .cta-box a {
      display: inline-block;
      background: var(--gradient);
      color: #fff;
      font-weight: 600;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    .cta-box a:hover {
      filter: brightness(1.2);
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .headline h1 {
        font-size: 2rem;
      }
      .cta-box h2 {
        font-size: 1.5rem;
      }
    }
  </style>
<!--</head>-->
<!--<body>-->

  <!-- HEADLINE -->
  <section class="section headline">
    <h1>Create Stunning Visuals with Generative AI</h1>
    <p>
      Visual storytelling just got smarter. With Siyara CloudAI LLC, you can produce high-quality, AI-generated visuals for your marketing, design, and content needs using tools like MidJourney, DALL·E, and Stable Diffusion.
    </p>
    <p style="margin-top: 20px;">
      Whether you need original graphics, campaign assets, product prototypes, or concept art, our creative AI services make design faster, scalable, and incredibly cost-effective.
    </p>
  </section>

  <!-- FEATURE CARDS -->
  <section class="section">
    <div class="cards">
      <div class="card">
        <h3>📢 Marketing & Ad Visuals</h3>
        <p>Quickly generate bold, scroll-stopping visuals for campaigns across all platforms.</p>
      </div>
      <div class="card">
        <h3>📦 Product Mockups</h3>
        <p>Create concept art and packaging visuals in minutes — before a single prototype exists.</p>
      </div>
      <div class="card">
        <h3>🎨 Brand Illustration</h3>
        <p>Design brand identity, mood boards, or pitch visuals with artistic, AI-crafted imagery.</p>
      </div>
      <div class="card">
        <h3>📱 Social Content</h3>
        <p>Feed your social pipeline with fresh, branded, AI-generated visual content regularly.</p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section cta-section">
    <div class="cta-box">
      <h2>🎨 Let AI Bring Your Ideas to Life</h2>
      <p>Kickstart your next design project powered by the magic of generative AI.</p>
      <a href="https://siyaracloud.com/contact" target="_blank">🚀 Start Your Creative AI Project</a>
    </div>
  </section>

<!--</body>-->
<!--</html>-->


@include('front-end.footer')