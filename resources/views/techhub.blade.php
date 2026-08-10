<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Haula Technology Hub — AI Innovation Center, ICT & Coding Bootcamps, and Digital Startup Incubator in Tanzania." />
    <meta name="theme-color" content="#f8fafc" />
    <title>Haula Technology Hub | Smart Life, Real Value</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/imgs/logo.png" />

    <!-- Google Fonts: Space Grotesk & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="styles.css?v=19.0" />
  </head>
  <body>

    <!-- Deepin OS Floating Glass Dock Header -->
    <header class="deepin-dock-header" id="top">
      <div class="dock-inner">
        <a class="hyper-brand" href="index.html" aria-label="Haula Enterprises">
          <img src="assets/imgs/logo.png" alt="Haula Enterprises Logo" class="header-logo-img" />
          <div class="brand-text-col">
            <span class="hyper-brand-name">HAULA ENTERPRISES<span class="mi-dot"></span></span>
            <span class="hyper-brand-slogan">Smart Life, Real Value</span>
          </div>
        </a>

        <nav class="dock-nav" aria-label="Main Navigation">
          <a href="index.html" data-sw="Mwanzo" data-en="Home">Home</a>
          <a href="index.html#about" data-sw="Kuhusu Sisi" data-en="About Us">About Us</a>

          <!-- Divisions Dropdown Menu -->
          <div class="nav-dropdown-wrapper">
            <button class="nav-dropdown-btn" aria-haspopup="true" aria-expanded="false">
              <span data-sw="Idara Zetu (5)" data-en="Divisions (5)">Divisions (5)</span>
              <svg class="dropdown-chevron" viewBox="0 0 20 20" fill="currentColor" width="14" height="14">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <div class="nav-dropdown-menu" role="menu">
              <a href="javascript:void(0)" class="dropdown-item loader-trigger coming-soon-trigger" data-module="transport" role="menuitem">
                <span class="d-icon">🚚</span>
                <div class="d-txt">
                  <strong data-sw="Transportation" data-en="Transportation">Transportation <small class="soon-badge coming-soon">COMING SOON</small></strong>
                  <small data-sw="Usafirishaji wa mizigo mizito & mepesi" data-en="Heavy cargo haulage & logistics">Heavy cargo haulage & logistics</small>
                </div>
              </a>

              <a href="javascript:void(0)" class="dropdown-item loader-trigger coming-soon-trigger" data-module="trading" role="menuitem">
                <span class="d-icon">🌐</span>
                <div class="d-txt">
                  <strong data-sw="Trading & Customs" data-en="Trading & Customs">Trading & Customs <small class="soon-badge coming-soon">COMING SOON</small></strong>
                  <small data-sw="Biashara ya kimataifa & kutoa mizigo bandarini" data-en="Global trade & express port clearance">Global trade & express port clearance</small>
                </div>
              </a>

              <a href="javascript:void(0)" class="dropdown-item loader-trigger coming-soon-trigger" data-module="security" role="menuitem">
                <span class="d-icon">🛡️</span>
                <div class="d-txt">
                  <strong data-sw="Security & Cyber" data-en="Security & Cyber">Security & Cyber <small class="soon-badge coming-soon">COMING SOON</small></strong>
                  <small data-sw="Mafunzo ya ulinzi, software & Cyber Security" data-en="Guard Academy, Security ERP & Cyber Security">Guard Academy, Security ERP & Cyber Security</small>
                </div>
              </a>

              <a href="technologies.html" class="dropdown-item" role="menuitem">
                <span class="d-icon">⚡</span>
                <div class="d-txt">
                  <strong data-sw="Technologies" data-en="Technologies">Technologies <small class="soon-badge live-badge" style="background:rgba(16,185,129,0.15); color:#10b981;">ACTIVE</small></strong>
                  <small data-sw="Mifumo ya Software & Networking" data-en="Software & Networking Infrastructure">Software & Networking Infrastructure</small>
                </div>
              </a>

              <a href="javascript:void(0)" class="dropdown-item loader-trigger coming-soon-trigger" data-module="techhub" role="menuitem">
                <span class="d-icon">🚀</span>
                <div class="d-txt">
                  <strong data-sw="Technology Hub" data-en="Technology Hub">Technology Hub <small class="soon-badge coming-soon">COMING SOON</small></strong>
                  <small data-sw="Mafunzo ya ICT, AI & Startup Incubator" data-en="AI Innovation, ICT Bootcamps & Incubator">AI Innovation, ICT Bootcamps & Incubator</small>
                </div>
              </a>
            </div>
          </div>

          <a href="index.html#faq" data-sw="Maswali (FAQ)" data-en="FAQ">FAQ</a>
          <a href="index.html#testimonials" data-sw="Ushuhuda" data-en="Reviews">Reviews</a>
          <a href="index.html#partners" data-sw="Washirika" data-en="Partners">Partners</a>
          <a href="#contact" data-sw="Mawasiliano" data-en="Contacts">Contacts</a>
        </nav>

        <div class="dock-actions">
          <button class="hyper-lang-btn" id="langToggle">
            <span id="langEN" class="active-lang">EN</span>
            <span class="sep">/</span>
            <span id="langSW">SW</span>
          </button>
          <a href="#enroll" class="hyper-btn-orange" style="background:linear-gradient(135deg, #00f2fe, #0072ff);" data-sw="Jiunge Hub" data-en="Join Hub">Join Hub</a>
          <button class="mobile-menu-toggle" id="mobileMenuBtn" aria-label="Toggle Navigation">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
          </button>
        </div>
      </div>
    </header>

    <!-- Mobile Navigation Drawer -->
    <div class="mobile-drawer-menu" id="mobileDrawerMenu">
      <div class="mobile-drawer-inner">
        <a href="index.html" class="m-link" data-sw="🏠 Mwanzo" data-en="🏠 Home">🏠 Home</a>
        <a href="index.html#about" class="m-link" data-sw="🏢 Kuhusu Sisi" data-en="🏢 About Us">🏢 About Us</a>
        <div class="m-dropdown-header">OUR 5 CORE DIVISIONS</div>
        <a href="transportation.html" class="m-link">🚚 Transportation Logistics</a>
        <a href="trading.html" class="m-link">🌐 Trading & Customs Clearance</a>
        <a href="security.html" class="m-link">🛡️ Security & Cyber Operations</a>
        <a href="technologies.html" class="m-link">⚡ Technologies (Dawafy OS)</a>
        <a href="techhub.html" class="m-link">🚀 Technology Hub & AI Lab</a>
        <hr style="border:none; border-top:1px solid rgba(0,0,0,0.06); margin:8px 0;" />
        <a href="index.html#faq" class="m-link" data-sw="❓ Maswali (FAQ)" data-en="❓ FAQ">❓ FAQ</a>
        <a href="index.html#testimonials" class="m-link" data-sw="⭐️ Ushuhuda" data-en="⭐️ Testimonials">⭐️ Testimonials</a>
        <a href="#contact" class="m-link" data-sw="📞 Mawasiliano" data-en="📞 Contacts">📞 Contacts</a>
      </div>
    </div>

    <main class="fusion-container">

      <!-- HERO SECTION -->
      <section class="tesla-hero-section page-hero-techhub" id="hero">
        <div class="hero-bg-media" style="background-image: url('https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=2400&q=85');"></div>
        <div class="hero-vignette"></div>

        <div class="tesla-hero-top-text">
          <div class="hyper-pill-tag" style="background:rgba(0,242,254,0.15); border-color:rgba(0,242,254,0.4);">
            <span class="pulse-dot" style="background:#00f2fe;"></span>
            <span style="color:#0284c7;" data-sw="HAULA TECHNOLOGY HUB // AI & ICT INCUBATOR" data-en="HAULA TECHNOLOGY HUB // AI & ICT INCUBATOR">HAULA TECHNOLOGY HUB // AI & ICT INCUBATOR</span>
          </div>

          <h1 class="tesla-hero-h1" data-sw="AI Innovation Center, ICT Bootcamps & Startup Incubator" data-en="AI Innovation Center, ICT Bootcamps & Startup Incubator">
            AI Innovation Center, ICT Bootcamps & Startup Incubator
          </h1>
          <p class="tesla-hero-p" data-sw="Smart Life, Real Value — Haula Technology Hub ndio kituo cha 5 cha Haula Enterprises kinachokuza vipaji vya vijana na wataalamu kupitia mafunzo ya ICT, Artificial Intelligence (AI) Bootcamps, na Incubator ya kukuza startups za kidijitali Tanzania." data-en="Smart Life, Real Value — Haula Group's 5th Core Division dedicated to empowering youth & tech professionals through AI innovation, full-stack coding bootcamps, and digital startup incubation in Tanzania.">
            Smart Life, Real Value — Haula Group's 5th Core Division dedicated to empowering youth & tech professionals through AI innovation, full-stack coding bootcamps, and digital startup incubation in Tanzania.
          </p>

          <div class="hero-action-buttons">
            <a href="#enroll" class="hyper-btn-orange" style="background:linear-gradient(135deg, #00f2fe, #0072ff);" data-sw="🚀 Jiunge na Coding Bootcamp" data-en="🚀 Apply for Tech Bootcamp">🚀 Apply for Tech Bootcamp</a>
            <a href="#incubator" class="hyper-btn-glass" data-sw="💡 Startup Incubator" data-en="💡 Startup Incubator">💡 Startup Incubator</a>
          </div>
        </div>
      </section>

      <!-- STATS BAR -->
      <section class="deepin-stats-strip">
        <div class="stats-grid">
          <div class="stat-card">
            <span class="stat-num">500+</span>
            <span class="stat-label" data-sw="Wahitimu wa Coding Bootcamps" data-en="Bootcamp Graduates">Bootcamp Graduates</span>
          </div>
          <div class="stat-card">
            <span class="stat-num">15+</span>
            <span class="stat-label" data-sw="Startups Zilizotatuliwa (Incubated)" data-en="Incubated Tech Startups">Incubated Tech Startups</span>
          </div>
          <div class="stat-card">
            <span class="stat-num">95%</span>
            <span class="stat-label" data-sw="Kiwango cha Ajira na Ujasiriamali" data-en="Career Placement Rate">Career Placement Rate</span>
          </div>
          <div class="stat-card">
            <span class="stat-num">100%</span>
            <span class="stat-label" data-sw="Praktiko & Practical AI Labs" data-en="Practical Hands-on AI Labs">Practical Hands-on AI Labs</span>
          </div>
        </div>
      </section>

      <!-- PILLARS SHOWCASE -->
      <section class="section-container" id="incubator" style="padding: 80px 24px;">
        <div class="text-center" style="margin-bottom: 48px;">
          <span class="section-kicker" data-sw="PROGRAMU ZETU ZA TECH HUB" data-en="HUB PROGRAMS & INITIATIVES">HUB PROGRAMS & INITIATIVES</span>
          <h2 class="section-title" data-sw="Mafunzo, AI & Ujasiriamali" data-en="AI Labs, Bootcamps & Startup Incubator">AI Labs, Bootcamps & Startup Incubator</h2>
        </div>

        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
          <div class="hyper-glass-card" style="padding: 28px;">
            <div style="font-size:36px; margin-bottom:12px;">🤖</div>
            <h3 style="font-family:var(--font-heading); margin-bottom:8px;" data-sw="AI & Robotics Innovation Lab" data-en="AI & Robotics Innovation Lab">AI & Robotics Innovation Lab</h3>
            <p style="font-size:14px; color:#475569;" data-sw="Maabara ya kisasa ya kukuza mifumo ya Artificial Intelligence, Machine Learning, na AI Agents kwa viwanda na biashara." data-en="Developing enterprise AI agents, Large Language Models (LLMs), machine vision algorithms, and robotic automation for local industry.">Developing enterprise AI agents, Large Language Models (LLMs), machine vision algorithms, and robotic automation for local industry.</p>
          </div>

          <div class="hyper-glass-card" style="padding: 28px;">
            <div style="font-size:36px; margin-bottom:12px;">💻</div>
            <h3 style="font-family:var(--font-heading); margin-bottom:8px;" data-sw="ICT & Coding Bootcamps" data-en="Full-Stack Coding Bootcamps">Full-Stack Coding Bootcamps</h3>
            <p style="font-size:14px; color:#475569;" data-sw="Mafunzo ya vitendo ya miezi 3 na 6 (Full-Stack Web & Mobile App Development, Python Data Science, Laravel, na React/Flutter)." data-en="Intensive 12 to 24-week bootcamps covering Full-Stack JavaScript/Python, Laravel, Flutter, cloud infrastructure, and DevOps.">Intensive 12 to 24-week bootcamps covering Full-Stack JavaScript/Python, Laravel, Flutter, cloud infrastructure, and DevOps.</p>
          </div>

          <div class="hyper-glass-card" style="padding: 28px;">
            <div style="font-size:36px; margin-bottom:12px;">🚀</div>
            <h3 style="font-family:var(--font-heading); margin-bottom:8px;" data-sw="Digital Startup Incubator" data-en="Digital Tech Startup Incubator">Digital Tech Startup Incubator</h3>
            <p style="font-size:14px; color:#475569;" data-sw="Programu ya miezi 6 inayowapa waasisi wa startups mtaji (seed funding), ushauri wa kitaalamu (mentorship), na Co-Working Space." data-en="Incubating tech-driven startups with seed investment opportunities, executive mentorship, legal structure, and high-speed co-working space.">Incubating tech-driven startups with seed investment opportunities, executive mentorship, legal structure, and high-speed co-working space.</p>
          </div>

          <div class="hyper-glass-card" style="padding: 28px;">
            <div style="font-size:36px; margin-bottom:12px;">🏢</div>
            <h3 style="font-family:var(--font-heading); margin-bottom:8px;" data-sw="Corporate ICT Training" data-en="Corporate Tech Executive Training">Corporate Tech Executive Training</h3>
            <p style="font-size:14px; color:#475569;" data-sw="Mafunzo maalum ya teknolojia kwa wafanyakazi wa benki, mashirika ya serikali, na makampuni ya mawasiliano." data-en="Custom tailored technology workshops for corporate teams: Cyber awareness, cloud migrations, database administration, and AI tools.">Custom tailored technology workshops for corporate teams: Cyber awareness, cloud migrations, database administration, and AI tools.</p>
          </div>
        </div>
      </section>

      <!-- ENROLMENT & APPLICATION FORM -->
      <section class="section-container" id="enroll" style="padding: 40px 24px 80px;">
        <div class="hyper-glass-card" style="padding: 40px; border-radius: 28px; background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(248,250,252,0.95)); border:1px solid rgba(0,242,254,0.4);">
          <div class="text-center" style="margin-bottom: 32px;">
            <span class="section-kicker" style="color:#0284c7;" data-sw="APPLICATION PORTAL" data-en="APPLICATION PORTAL">APPLICATION PORTAL</span>
            <h2 class="section-title" data-sw="Jiunge na Coding Bootcamp au Startup Incubator" data-en="Apply for Bootcamp Cohort or Startup Incubator">Apply for Bootcamp Cohort or Startup Incubator</h2>
          </div>

          <form id="hubEnrollForm" style="max-width:640px; margin:0 auto; display:flex; flex-direction:column; gap:16px;">
            <input type="text" placeholder="Full Name" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <input type="email" placeholder="Email Address" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <input type="text" placeholder="Phone / WhatsApp Number" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <select id="hubProgramSelect" style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);">
              <option value="Full-Stack Web & Mobile Bootcamp">Full-Stack Web & Mobile App Bootcamp (6 Months)</option>
              <option value="AI & Python Data Science Intensive">AI & Python Data Science Intensive (3 Months)</option>
              <option value="Digital Startup Incubator Pitch">Digital Startup Incubator Pitch (Pitch Seed Funding)</option>
              <option value="Corporate ICT Workshop">Corporate ICT Workshop Request</option>
            </select>
            <textarea placeholder="Tell us about your background, motivation, or startup idea..." rows="4" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);"></textarea>
            <button type="submit" class="hyper-btn-orange" style="background:linear-gradient(135deg, #00f2fe, #0072ff); padding:14px; font-weight:700;" data-sw="Tuma Maombi Sasa" data-en="Submit Application Now">Submit Application Now</button>
            <div id="hubFormStatus" style="font-size:14px; color:#0284c7; text-align:center; font-weight:600;"></div>
          </form>
        </div>
      </section>

      <!-- CONTACT INQUIRY SECTION -->
      <section class="section-container" id="contact" style="padding: 40px 24px 80px;">
        <div class="text-center" style="margin-bottom: 40px;">
          <span class="section-kicker" data-sw="MAWASILIANO YA TECH HUB" data-en="TECH HUB DESK">TECH HUB DESK</span>
          <h2 class="section-title" data-sw="Wasiliana na Haula Tech Hub Campus" data-en="Contact Haula Tech Hub Innovation Desk">Contact Haula Tech Hub Innovation Desk</h2>
        </div>

        <div style="max-width: 680px; margin:0 auto;" class="hyper-glass-card">
          <form id="hubContactForm" style="padding:32px; display:flex; flex-direction:column; gap:16px;">
            <input type="text" placeholder="Your Name" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <input type="email" placeholder="Email Address" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <input type="text" placeholder="Phone Number / WhatsApp" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);" />
            <textarea placeholder="Your questions regarding cohort intake dates, fees, or co-working space..." rows="4" required style="padding:14px; border-radius:12px; border:1px solid rgba(0,0,0,0.12);"></textarea>
            <button type="submit" class="hyper-btn-orange" style="background:linear-gradient(135deg, #00f2fe, #0072ff); padding:14px; font-weight:700;" data-sw="Tuma Ujumbe" data-en="Send Campus Inquiry">Send Campus Inquiry</button>
            <div id="hubContactStatus" style="font-size:14px; color:#10b981; text-align:center; font-weight:600;"></div>
          </form>
        </div>
      </section>

    </main>

    <!-- FOOTER -->
    <footer class="hyper-footer" style="margin-top: 60px;">
      <div class="section-container">
        <div class="footer-grid">
          <div class="f-col main-brand-col">
            <a href="index.html" class="footer-brand">
              <img src="assets/imgs/logo.png" alt="Haula Enterprises Logo" class="footer-logo-img" />
              <span class="f-brand-name">HAULA ENTERPRISES</span>
            </a>
            <p class="f-tagline" data-sw="Smart Life, Real Value — Usafirishaji, Biashara, Security, Software Services & Technology Hub." data-en="Smart Life, Real Value — Transportation, Trading, Security, Software Engineering & Technology Hub.">
              Smart Life, Real Value — Transportation, Trading, Security, Software Engineering & Technology Hub.
            </p>
          </div>

          <div class="f-col">
            <h4 class="f-heading" data-sw="Idara Zetu (5)" data-en="Our 5 Divisions">Our 5 Divisions</h4>
            <ul class="f-links">
              <li><a href="transportation.html">🚚 Haula Transportation</a></li>
              <li><a href="trading.html">🌐 Haula Trading & Customs</a></li>
              <li><a href="security.html">🛡️ Haula Security & Cyber</a></li>
              <li><a href="technologies.html">⚡ Haula Technologies</a></li>
              <li><a href="techhub.html">🚀 Haula Technology Hub</a></li>
            </ul>
          </div>

          <div class="f-col">
            <h4 class="f-heading" data-sw="Mawasiliano" data-en="Direct Contacts">Direct Contacts</h4>
            <div class="c-info-list">
              <p>📍 Dar es Salaam, Tanzania</p>
              <p>📞 <a href="tel:+255713000000">+255 713 000 000</a></p>
              <p>✉️ <a href="mailto:info@haula.co.tz">info@haula.co.tz</a></p>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>© <span id="currentYear">2026</span> Haula Enterprises. All Rights Reserved. Smart Life, Real Value.</p>
        </div>
      </div>
    </footer>

    <script src="script.js?v=19.0"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const hubEnrollForm = document.getElementById('hubEnrollForm');
        const hubFormStatus = document.getElementById('hubFormStatus');

        if (hubEnrollForm) {
          hubEnrollForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const inputs = hubEnrollForm.querySelectorAll('input, select, textarea');
            const payload = {
              name: inputs[0].value,
              email: inputs[1].value,
              dept: 'Haula Tech Hub: Bootcamp / Incubator Application',
              msg: `[Phone: ${inputs[2].value}] [Program: ${inputs[3].value}] ${inputs[4].value}`
            };

            fetch('api/messages', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify(payload)
            }).catch(() => {
              fetch('backend/api_messages.php?action=submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
              });
            });

            if (hubFormStatus) {
              hubFormStatus.textContent = '✓ Your Haula Tech Hub application has been submitted! Admissions team will contact you shortly.';
              hubEnrollForm.reset();
            }
          });
        }

        const hubContactForm = document.getElementById('hubContactForm');
        const hubContactStatus = document.getElementById('hubContactStatus');
        if (hubContactForm) {
          hubContactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const inputs = hubContactForm.querySelectorAll('input, textarea');
            const payload = {
              name: inputs[0].value,
              email: inputs[1].value,
              dept: 'Haula Tech Hub: General Inquiry',
              msg: `[Phone: ${inputs[2].value}] ${inputs[3].value}`
            };

            fetch('api/messages', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify(payload)
            }).catch(() => {
              fetch('backend/api_messages.php?action=submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
              });
            });

            if (hubContactStatus) {
              hubContactStatus.textContent = '✓ Your message has been sent to Haula Tech Hub Campus desk!';
              hubContactForm.reset();
            }
          });
        }
      });
    </script>
  </body>
</html>
