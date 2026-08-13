/* ==========================================================================
   DESIGN FUSION: DANGOTE × TESLA × DEEPIN OS × XIAOMI HYPEROS
   HAULA ENTERPRISES — INTERACTIVE ENGINE & INFINITE LOADING OVERLAY
   SLOGAN: SMART LIFE, REAL VALUE
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* 1. Dynamic Footer Year */
  const yearEl = document.getElementById('currentYear');
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }

  /* 2. Floating Dock Header Scroll Effect */
  const header = document.querySelector('.deepin-dock-header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  });

  /* 3. Hero Slideshow Carousel System */
  const slideshowContainer = document.getElementById('heroSlideshow');
  if (slideshowContainer) {
    const slides = slideshowContainer.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('#slideDots .dot');
    const prevBtn = document.getElementById('prevSlideBtn');
    const nextBtn = document.getElementById('nextSlideBtn');

    const slideH1 = document.getElementById('slideH1');
    const slideP = document.getElementById('slideP');
    const slideTagText = document.getElementById('slideTagText');

    const slideData = [
      {
        tag: "HAULA ENTERPRISES // SMART LIFE, REAL VALUE",
        h1_en: "Transportation, Trade, Security, Tech & Hub",
        h1_sw: "Usafirishaji, Biashara, Security, Tech & Hub",
        p_en: "Smart Life, Real Value — Haula Enterprises integrates Freight Logistics, Global Trade, Security Firm Training & Security Systems, Cyber Security, Software Development, and Technology Hub.",
        p_sw: "Smart Life, Real Value — Haula Enterprises huunganisha Huduma za Usafirishaji, Biashara ya Kimataifa, Elimu ya Ulinzi na Software za Ulinzi, Cyber Security, Software Services, na Haula Technology Hub."
      },
      {
        tag: "HAULA TRADING // PORT & CUSTOMS CLEARING",
        h1_en: "Express Port Customs Clearance & Trade",
        h1_sw: "Kutoa Mizigo Bandarini Chini ya Masaa 24",
        p_en: "Direct Dar es Salaam port clearing, bonded warehouse logistics, and global commercial trade procurement.",
        p_sw: "Kutoa mizigo Bandari ya Dar es Salaam kwa haraka, ghala za kuhifadhia, na biashara ya kimataifa."
      },
      {
        tag: "HAULA TECHNOLOGIES // DAWAFY & ICT INFRASTRUCTURE",
        h1_en: "Software Engineering & Enterprise Networking",
        h1_sw: "Mifumo ya Software & Mtandao wa Networking",
        p_en: "Architecting Dawafy Pharmacy OS, Tanzanite Insights, High-Speed LAN Cabling, Cisco Routers & Wireless setups.",
        p_sw: "Ubunifu wa Dawafy Pharmacy OS, Tanzanite Insights, usimikaji wa Cat6A LAN, Cisco Routers na Mtandao wa Wireless."
      }
    ];

    let currentSlide = 0;
    let autoSlideInterval = null;

    function goToSlide(index) {
      slides[currentSlide]?.classList.remove('active');
      dots[currentSlide]?.classList.remove('active');

      currentSlide = (index + slides.length) % slides.length;

      slides[currentSlide]?.classList.add('active');
      dots[currentSlide]?.classList.add('active');

      if (slideH1 && slideP && slideTagText) {
        slideH1.style.opacity = '0';
        slideP.style.opacity = '0';

        setTimeout(() => {
          const isSw = document.getElementById('langSW')?.classList.contains('active-lang');
          slideTagText.textContent = slideData[currentSlide].tag;
          slideH1.textContent = isSw ? slideData[currentSlide].h1_sw : slideData[currentSlide].h1_en;
          slideP.textContent = isSw ? slideData[currentSlide].p_sw : slideData[currentSlide].p_en;

          slideH1.style.opacity = '1';
          slideP.style.opacity = '1';
        }, 200);
      }
    }

    function startAutoSlide() {
      stopAutoSlide();
      autoSlideInterval = setInterval(() => {
        goToSlide(currentSlide + 1);
      }, 6000);
    }

    function stopAutoSlide() {
      if (autoSlideInterval) clearInterval(autoSlideInterval);
    }

    prevBtn?.addEventListener('click', () => {
      goToSlide(currentSlide - 1);
      startAutoSlide();
    });

    nextBtn?.addEventListener('click', () => {
      goToSlide(currentSlide + 1);
      startAutoSlide();
    });

    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => {
        goToSlide(idx);
        startAutoSlide();
      });
    });

    startAutoSlide();
  }

  /* 4. English / Swahili Language Toggle System */
  const langToggleBtn = document.getElementById('langToggle');
  const langEN = document.getElementById('langEN');
  const langSW = document.getElementById('langSW');

  if (langToggleBtn) {
    langToggleBtn.addEventListener('click', () => {
      const isCurrentlyEN = langEN?.classList.contains('active-lang');

      if (isCurrentlyEN) {
        langEN?.classList.remove('active-lang');
        langSW?.classList.add('active-lang');
        switchLanguage('sw');
      } else {
        langSW?.classList.remove('active-lang');
        langEN?.classList.add('active-lang');
        switchLanguage('en');
      }
    });
  }

  function switchLanguage(lang) {
    const translatableEls = document.querySelectorAll('[data-en][data-sw]');
    translatableEls.forEach(el => {
      const text = el.getAttribute(`data-${lang}`);
      if (text) {
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
          el.placeholder = text;
        } else {
          el.textContent = text;
        }
      }
    });
  }

  /* 5. INFINITE LOADING OVERLAY SYSTEM (FOR ALL DIVISIONS INCL. TECH HUB) */
  const loadingOverlay = document.getElementById('loadingOverlay');
  const loaderBadge = document.getElementById('loaderBadge');
  const loaderTitle = document.getElementById('loaderTitle');
  const loaderSub = document.getElementById('loaderSub');
  const closeLoadingBtn = document.getElementById('closeLoadingBtn');
  const dismissLoadingBtn = document.getElementById('dismissLoadingBtn');

  const loadingData = {
    transport: {
      badge: "HAULA TRANSPORTATION // COMING SOON",
      title_en: "Haula Transportation — Coming Soon",
      title_sw: "Haula Transportation — Inakuja Hivi Karibuni",
      sub_en: "This division is currently under active preparation and will launch soon. For active services, please explore Haula Technologies.",
      sub_sw: "Idara hii ipo kwenye maandalizi ya mwisho na itakuwa hewani hivi karibuni. Kwa huduma zinazofanya kazi sasa, karibu utembelee Haula Technologies."
    },
    trading: {
      badge: "HAULA TRADING // COMING SOON",
      title_en: "Haula Trading & Customs — Coming Soon",
      title_sw: "Haula Trading & Customs — Inakuja Hivi Karibuni",
      sub_en: "This division is currently under active preparation and will launch soon. For active services, please explore Haula Technologies.",
      sub_sw: "Idara hii ipo kwenye maandalizi ya mwisho na itakuwa hewani hivi karibuni. Kwa huduma zinazofanya kazi sasa, karibu utembelee Haula Technologies."
    },
    security: {
      badge: "HAULA SECURITY // COMING SOON",
      title_en: "Haula Security & Cyber — Coming Soon",
      title_sw: "Haula Security & Cyber — Inakuja Hivi Karibuni",
      sub_en: "This division is currently under active preparation and will launch soon. For active services, please explore Haula Technologies.",
      sub_sw: "Idara hii ipo kwenye maandalizi ya mwisho na itakuwa hewani hivi karibuni. Kwa huduma zinazofanya kazi sasa, karibu utembelee Haula Technologies."
    },
    techhub: {
      badge: "HAULA TECH HUB // COMING SOON",
      title_en: "Haula Technology Hub — Coming Soon",
      title_sw: "Haula Technology Hub — Inakuja Hivi Karibuni",
      sub_en: "This division is currently under active preparation and will launch soon. For active services, please explore Haula Technologies.",
      sub_sw: "Idara hii ipo kwenye maandalizi ya mwisho na itakuwa hewani hivi karibuni. Kwa huduma zinazofanya kazi sasa, karibu utembelee Haula Technologies."
    }
  };

  /* Intercept clicks to coming soon loader triggers */
  document.addEventListener('click', (e) => {
    const targetLink = e.target.closest('.loader-trigger, .coming-soon-trigger');

    if (targetLink) {
      let moduleKey = targetLink.getAttribute('data-module') || targetLink.getAttribute('data-division');
      
      const divSaved = localStorage.getItem('haula_div_config');
      const divConfig = divSaved ? JSON.parse(divSaved) : { transport: 'soon', trading: 'soon', security: 'soon', techhub: 'soon' };

      if (moduleKey && divConfig[moduleKey] === 'live') {
        return;
      }

      e.preventDefault();

      if (moduleKey && loadingData[moduleKey] && loadingOverlay) {
        const isSw = document.getElementById('langSW')?.classList.contains('active-lang');
        const data = loadingData[moduleKey];

        if (loaderBadge) loaderBadge.textContent = data.badge;
        if (loaderTitle) loaderTitle.textContent = isSw ? data.title_sw : data.title_en;
        if (loaderSub) loaderSub.textContent = isSw ? data.sub_sw : data.sub_en;

        loadingOverlay.classList.add('active');
      }
    }
  });

  function closeLoader() {
    loadingOverlay?.classList.remove('active');
  }

  closeLoadingBtn?.addEventListener('click', closeLoader);
  dismissLoadingBtn?.addEventListener('click', closeLoader);
  loadingOverlay?.addEventListener('click', (e) => {
    if (e.target === loadingOverlay) closeLoader();
  });

  /* 6. INTERACTIVE FAQ ACCORDION LOGIC */
  const faqButtons = document.querySelectorAll('.faq-question-btn');
  faqButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const faqItem = btn.parentElement;
      const isActive = faqItem?.classList.contains('active');

      document.querySelectorAll('.faq-item').forEach(item => {
        item.classList.remove('active');
      });

      if (!isActive) {
        faqItem?.classList.add('active');
      }
    });
  });

  /* 7. LIVE CARGO TRACKER PREVIEW BOX */
  const trackBtn = document.getElementById('trackBtn');
  const trackingIdInput = document.getElementById('trackingIdInput');
  const trackerResultBox = document.getElementById('trackerResultBox');
  const trackResId = document.getElementById('trackResId');

  if (trackBtn && trackingIdInput && trackerResultBox) {
    trackBtn.addEventListener('click', () => {
      const inputVal = trackingIdInput.value.trim().toUpperCase() || 'HL-8829-TZ';
      if (trackResId) trackResId.textContent = `WAYBILL: #${inputVal}`;
      trackerResultBox.classList.add('active');
    });
  }

  /* 8. CORPORATE PROFILE PDF MODAL LOGIC */
  const openProfileBtn = document.getElementById('openProfilePdfBtn');
  const profilePdfModal = document.getElementById('profilePdfModal');
  const closeProfileModalBtn = document.getElementById('closeProfileModalBtn');

  if (openProfileBtn && profilePdfModal) {
    openProfileBtn.addEventListener('click', () => {
      profilePdfModal.classList.add('active');
    });
  }

  if (closeProfileModalBtn && profilePdfModal) {
    closeProfileModalBtn.addEventListener('click', () => {
      profilePdfModal.classList.remove('active');
    });

    profilePdfModal.addEventListener('click', (e) => {
      if (e.target === profilePdfModal) profilePdfModal.classList.remove('active');
    });
  }

  /* 9. Form Submission & Admin Inbox Integration */
  const contactForm = document.getElementById('contactForm');
  const formStatus = document.getElementById('formStatus');

  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const inputs = contactForm.querySelectorAll('input, select, textarea');
      const name = inputs[0]?.value || 'Anonymous Client';
      const email = inputs[1]?.value || 'N/A';
      const deptSelect = document.getElementById('formDept');
      const dept = deptSelect ? deptSelect.options[deptSelect.selectedIndex].text : 'General Inquiry';
      const msg = inputs[inputs.length - 1]?.value || '';

      const payload = { name, email, dept, msg };

      fetch('backend/api_messages.php?action=submit', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      })
      .then(res => res.json())
      .then(data => {
        if (formStatus) {
          const isSw = document.getElementById('langSW')?.classList.contains('active-lang');
          formStatus.textContent = isSw ? "✓ Ujumbe wako umetumwa kwa mafanikio! Timu ya Haula itawasiliana nawe hivi karibuni." : "✓ Your message has been sent successfully! The Haula leadership team will get back to you shortly.";
          contactForm.reset();
        }
      })
      .catch(err => {
        // Fallback to local state if offline
        const newMsg = { id: Date.now(), date: new Date().toLocaleString(), name, email, dept, msg };
        const saved = localStorage.getItem('haula_messages');
        const messages = saved ? JSON.parse(saved) : [];
        messages.unshift(newMsg);
        localStorage.setItem('haula_messages', JSON.stringify(messages));

        if (formStatus) {
          formStatus.textContent = "✓ Your message has been stored locally and will sync to server.";
          contactForm.reset();
        }
      });
    });
  }
  /* 10. MOBILE NAVIGATION DRAWER TOGGLE */
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileDrawerMenu = document.getElementById('mobileDrawerMenu');

  if (mobileMenuBtn && mobileDrawerMenu) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileMenuBtn.classList.toggle('active');
      mobileDrawerMenu.classList.toggle('active');
    });

    mobileDrawerMenu.querySelectorAll('.m-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenuBtn.classList.remove('active');
        mobileDrawerMenu.classList.remove('active');
      });
    });
  }

  /* 11. DYNAMIC FRONTEND DOM SYNC WITH ADMIN CONFIGS */
  function syncDynamicBranding() {
    const saved = localStorage.getItem('haula_branding');
    if (!saved) return;
    const brand = JSON.parse(saved);

    if (brand.slogan) {
      document.querySelectorAll('.hyper-brand-slogan').forEach(el => {
        el.textContent = brand.slogan;
      });
    }

    if (brand.email) {
      document.querySelectorAll('a[href^="mailto:"]').forEach(el => {
        el.textContent = brand.email;
        el.href = `mailto:${brand.email}`;
      });
    }

    if (brand.phone) {
      document.querySelectorAll('.c-info-list a[href^="tel:"]').forEach(el => {
        el.textContent = brand.phone;
      });
    }

    if (brand.address) {
      document.querySelectorAll('footer a[title="Executive Portal"]').forEach(el => {
        el.textContent = brand.address;
      });
    }
  }

  function syncDivisionCardVisibility() {
    const saved = localStorage.getItem('haula_div_config');
    const divConfig = saved ? JSON.parse(saved) : { transport: 'loader', trading: 'loader', security: 'loader', techhub: 'loader' };

    // 1. Sync Homepage Cards
    document.querySelectorAll('[data-div-card]').forEach(card => {
      const cardKey = card.getAttribute('data-div-card');
      if (cardKey === 'technologies') {
        card.style.display = 'flex';
        return;
      }
      if (cardKey && divConfig[cardKey]) {
        card.style.display = (divConfig[cardKey] === 'disabled') ? 'none' : 'flex';
      }
    });

    // 2. Sync Header Dropdown Menu Items & Mobile Drawer Items
    document.querySelectorAll('.dropdown-item[data-module], .m-link[data-module]').forEach(item => {
      const moduleKey = item.getAttribute('data-module');
      if (moduleKey && divConfig[moduleKey]) {
        if (divConfig[moduleKey] === 'disabled') {
          item.style.display = 'none';
        } else {
          item.style.display = item.classList.contains('m-link') ? 'block' : 'flex';
        }
      }
    });
  }

  function syncDynamicPartners() {
    const saved = localStorage.getItem('haula_partners');
    if (!saved) return;
    const partners = JSON.parse(saved);
    if (!Array.isArray(partners) || partners.length === 0) return;

    const track1 = document.querySelector('.track-row-1');
    if (track1) {
      track1.innerHTML = partners.map(p => `
        <div class="partner-card-emblem">
          <span class="p-icon">${p.icon}</span>
          <div class="p-info">
            <strong>${p.name}</strong>
            <small>${p.scope}</small>
          </div>
        </div>
      `).join('');
    }
  }

  /* DYNAMIC SOFTWARE ECOSYSTEM CARD FILTERING BASED ON ADMIN STATUS CONFIG */
  function syncEcosystemVisibility() {
    const saved = localStorage.getItem('haula_ecosystem_config');
    if (!saved) return;
    const ecoConfig = JSON.parse(saved);

    document.querySelectorAll('[data-product]').forEach(btn => {
      const prodKey = btn.getAttribute('data-product');
      const card = btn.closest('.eco-card');

      if (prodKey && ecoConfig[prodKey] && card) {
        if (ecoConfig[prodKey] === 'disabled') {
          card.style.display = 'none';
        } else {
          card.style.display = 'block';
        }
      }
    });
  }

  /* DYNAMIC CUSTOM DIVISIONS RENDER */
  function renderCustomDivisions() {
    const saved = localStorage.getItem('haula_custom_divisions');
    if (!saved) return;
    const customDivs = JSON.parse(saved);
    if (!Array.isArray(customDivs) || customDivs.length === 0) return;

    const grid = document.querySelector('.conglomerate-pillars-grid');
    if (!grid) return;

    customDivs.forEach((div, idx) => {
      if (document.getElementById(div.id)) return;

      const article = document.createElement('article');
      article.className = 'entity-card';
      article.id = div.id;
      article.innerHTML = `
        <div class="entity-badge">0${idx + 6} // CUSTOM DIVISION</div>
        <div class="entity-icon">${div.icon}</div>
        <h3>${div.title}</h3>
        <p>${div.desc}</p>
        <button class="entity-link loader-trigger" data-module="techhub" style="background:none; border:none; cursor:pointer;">Loading Module &rarr;</button>
      `;
      grid.appendChild(article);
    });
  }

  /* DYNAMIC CUSTOM PROJECTS RENDER */
  function renderCustomProjects() {
    const saved = localStorage.getItem('haula_custom_projects');
    if (!saved) return;
    const customProjs = JSON.parse(saved);
    if (!Array.isArray(customProjs) || customProjs.length === 0) return;

    const row = document.querySelector('.ecosystem-cards-row');
    if (!row) return;

    customProjs.forEach(proj => {
      if (document.getElementById(proj.key)) return;

      const article = document.createElement('article');
      article.className = 'eco-card';
      article.id = proj.key;
      article.innerHTML = `
        <div class="eco-icon">${proj.icon}</div>
        <h4>${proj.title}</h4>
        <p>${proj.desc}</p>
        <button class="eco-link open-drawer-btn" onclick="openSpecsDrawer('dawafy')" data-product="${proj.key}">View Specifications &rarr;</button>
      `;
      row.appendChild(article);
    });
  }

  syncDynamicBranding();
  syncDivisionCardVisibility();
  syncDynamicPartners();
  syncEcosystemVisibility();
  renderCustomDivisions();
  renderCustomProjects();

  /* 12. PRODUCT SPECIFICATIONS DRAWER MODAL ENGINE */
  const productSpecsData = {
    dawafy: {
      badge: "SOFTWARE PRODUCT SPECIFICATIONS // V3.4",
      title: "Dawafy Pharmacy Enterprise OS v3.4",
      sub: "Comprehensive Technical Blueprint & Operational Specs",
      specs: [
        { label: "Core Architecture", val: "Node.js / React / SQLite Local-First Engine with Cloud Sync" },
        { label: "Offline Resilience", val: "100% Offline Functional (Store & Forward Sync on reconnect)" },
        { label: "Tax Compliance", val: "Automated TRA EFD Statutory API Integration & Fiscal Receipts" },
        { label: "Expiry Management", val: "90-Day, 60-Day & 30-Day Automated Medicine Expiration Warnings" },
        { label: "Inventory Control", val: "Barcode Scanning, Batch Tracking, Stock In/Out & Wholesale Conversions" },
        { label: "Reporting Engine", val: "Real-Time Profit/Loss Analytics & Daily Cashier Reconciliation" }
      ]
    },
    tanzanite: {
      badge: "ANALYTICS ENGINE // SPECIFICATIONS",
      title: "Tanzanite Insights System",
      sub: "Executive Business Intelligence & Predictive Analytics Suite",
      specs: [
        { label: "Data Pipeline", val: "Real-time Telemetry aggregation across all branch POS terminals" },
        { label: "Predictive Analytics", val: "AI-driven inventory re-order forecasting based on sales velocity" },
        { label: "Executive Dashboards", val: "Custom KPI Widgets, Profit Margin heatmaps & Hourly Revenue charts" },
        { label: "Export Formats", val: "Automated PDF, Excel & Financial Statement Exports" }
      ]
    },
    taskora: {
      badge: "PROJECT MANAGEMENT // SPECIFICATIONS",
      title: "Taskora System (Project Hub)",
      sub: "Agile Enterprise Task & Operations Execution Platform",
      specs: [
        { label: "Task Execution", val: "Kanban Boards, Interactive Gantt Timelines & Milestone Milestones" },
        { label: "Team Collaboration", val: "Real-time task assignments, automated SLA deadlines & SMS/Email alerts" },
        { label: "Security & Auditing", val: "Role-Based Access Control (RBAC) & Immutable Activity Audit Logs" },
        { label: "Resource Allocation", val: "Workload balancing & team productivity tracking" }
      ]
    },
    eduka: {
      badge: "E-COMMERCE SYSTEM // SPECIFICATIONS",
      title: "E-Duka System",
      sub: "Multi-Vendor & Retail Digital E-Commerce Platform",
      specs: [
        { label: "Payment Gateway", val: "Integrated Mobile Money (M-Pesa, TigoPesa, AirtelMoney, NMB/CRDB)" },
        { label: "Store Management", val: "Catalog Control, Dynamic Discount Coupons & Stock Sync" },
        { label: "Order Tracking", val: "Real-time Customer Order Status & Dispatch Telemetry" },
        { label: "Mobile-First UX", val: "Ultra-Fast Progressive Web App (PWA) & Touch Interface" }
      ]
    },
    wamas: {
      badge: "FOOD WAREHOUSE OS // SPECIFICATIONS",
      title: "WAMAS System (Food Grain Warehouse & Supply Chain OS)",
      sub: "Food Grain Storage Management, Quality Telemetry & Procurement Suite",
      specs: [
        { label: "Food Grain Warehousing", val: "Multi-silo bin allocation, moisture control & food stock batch tracking" },
        { label: "Procurement & Supply Chain", val: "Automated supplier purchase orders, crop procurement & distribution logs" },
        { label: "Stock Telemetry", val: "Real-time grain stock level alerts, batch expiration & bin capacity heatmaps" },
        { label: "Logistics Fleet Sync", val: "Seamless dispatch integration with Haula Heavy Transportation Fleet" }
      ]
    },
    agromarket: {
      badge: "AGRI-TECH MARKETPLACE // SPECIFICATIONS",
      title: "Haula Agro Market System",
      sub: "Digital Agricultural Produce Trading Platform & Regional Price Telemetry Engine",
      specs: [
        { label: "Commodity Trading Engine", val: "Direct digital buying, selling & bulk grain auctioning for traders & farmers" },
        { label: "Market Price Telemetry", val: "Real-time crop price tracking across major East African produce markets" },
        { label: "Contracting & Escrow", val: "Digital escrow trading contracts, produce quality grading & instant mobile payout" },
        { label: "WAMAS & Logistics Sync", val: "Direct grain reservation in WAMAS food warehouses & Haula Fleet haulage" }
      ]
    },
    ams: {
      badge: "ASSET MANAGEMENT OS // SPECIFICATIONS",
      title: "AMS (Asset Management System)",
      sub: "Enterprise Fixed Assets, Equipment Lifecycle & Fleet Audit Suite",
      specs: [
        { label: "Asset Tagging & Tracking", val: "QR-Code, Barcode & RFID Tagging for all corporate machinery & equipment" },
        { label: "Depreciation Accounting", val: "Automated Straight-Line & Reducing Balance depreciation calculation" },
        { label: "Maintenance Telemetry", val: "Scheduled preventive maintenance alerts, repair logs & lifecycle audits" },
        { label: "Asset Disposal & Audit", val: "Inter-branch asset transfer authorization & disposal auditing" }
      ]
    },
    api: {
      badge: "ENTERPRISE INTEGRATION // SPECIFICATIONS",
      title: "Enterprise Custom RESTful APIs & Middleware",
      sub: "Secure Microservices, Gateway & Database Integration Suite",
      specs: [
        { label: "API Gateway", val: "Secure RESTful & GraphQL Microservices Architecture" },
        { label: "Statutory & Banking", val: "TRA EFD, Payment Gateways & Banking ERP API Integrations" },
        { label: "Security Standard", val: "OAuth 2.0 / JWT Authentication, TLS 1.3 Encryption & Rate-Limiting" },
        { label: "Database Scaling", val: "PostgreSQL / MySQL / Redis High-Availability Clustering" }
      ]
    }
  };

  window.openSpecsDrawer = function(prodKey) {
    prodKey = prodKey || 'dawafy';
    const data = productSpecsData[prodKey] || productSpecsData.dawafy;
    const dBackdrop = document.getElementById('drawerBackdrop');
    const dBody = document.getElementById('drawerBody');

    if (dBackdrop && dBody) {
      let html = `
        <span class="loading-badge" style="margin-bottom:12px; display:inline-block;">${data.badge}</span>
        <h2 style="font-family:var(--font-heading); font-size:24px; font-weight:700; color:var(--tesla-black); margin-bottom:6px;">${data.title}</h2>
        <p style="font-size:13.5px; color:#64748b; margin-bottom:24px;">${data.sub}</p>
        <div style="display:flex; flex-direction:column; gap:12px; border-top:1px solid rgba(0,0,0,0.08); padding-top:20px;">
      `;

      data.specs.forEach(item => {
        html += `
          <div style="background:#f8fafc; padding:14px 18px; border-radius:14px; border:1px solid rgba(0,0,0,0.06);">
            <strong style="display:block; font-size:11px; color:var(--hyper-orange); text-transform:uppercase; letter-spacing:0.5px;">${item.label}</strong>
            <span style="font-size:13.5px; color:var(--tesla-black); font-weight:600;">${item.val}</span>
          </div>
        `;
      });

      html += `
        </div>
        <div style="margin-top:24px; text-align:right;">
          <a href="#contact" class="hyper-btn-primary close-drawer-link" style="display:inline-flex; width:auto; padding:0 24px; text-decoration:none;">Request Demo &rarr;</a>
        </div>
      `;

      dBody.innerHTML = html;
      dBackdrop.classList.add('active');

      const demoLink = dBody.querySelector('.close-drawer-link');
      if (demoLink) {
        demoLink.addEventListener('click', () => {
          dBackdrop.classList.remove('active');
        });
      }
    }
  };

  document.addEventListener('click', (e) => {
    const openBtn = e.target.closest('.open-drawer-btn');
    if (openBtn) {
      e.preventDefault();
      const prodKey = openBtn.getAttribute('data-product') || 'dawafy';
      window.openSpecsDrawer(prodKey);
    }

    const closeBtn = e.target.closest('#closeDrawerBtn');
    if (closeBtn) {
      document.getElementById('drawerBackdrop')?.classList.remove('active');
    }

    if (e.target && e.target.id === 'drawerBackdrop') {
      document.getElementById('drawerBackdrop')?.classList.remove('active');
    }
  });

  /* Dynamic Testimonials Loader from Database API */
  async function loadDynamicTestimonials() {
    const grid = document.getElementById('testimonialsGrid');
    if (!grid) return;

    try {
      const response = await fetch('/api/testimonials');
      if (!response.ok) return;
      const testimonials = await response.json();
      const currentLang = localStorage.getItem('haula_lang') || 'EN';

      if (testimonials && testimonials.length > 0) {
        let html = '';
        testimonials.forEach(item => {
          const ratingCount = parseInt(item.rating) || 5;
          const stars = '★'.repeat(ratingCount);
          const quote = (currentLang === 'SW' && item.quote_sw) ? item.quote_sw : item.quote_en;
          const avatar = item.avatar || '👨‍💼';
          const role = item.author_role ? `<small>${item.author_role}</small>` : '';

          html += `
            <div class="testimonial-card">
              <div class="test-stars">${stars}</div>
              <p class="test-quote">"${quote}"</p>
              <div class="test-author-row">
                <div class="author-avatar">${avatar}</div>
                <div class="author-info">
                  <strong>${item.author_name}</strong>
                  ${role}
                </div>
              </div>
            </div>
          `;
        });
        grid.innerHTML = html;
      } else {
        grid.innerHTML = `
          <div style="grid-column: 1 / -1; text-align: center; padding: 40px 20px; background: rgba(255,255,255,0.6); border-radius: 16px; border: 1px dashed rgba(0,0,0,0.1);">
            <div style="font-size: 32px; margin-bottom: 8px;">⭐️</div>
            <p style="color: #64748b; font-size: 14px; font-weight: 500;" data-sw="Hakuna ushuhuda uliowekwa kwa sasa." data-en="No verified client testimonials available yet.">No verified client testimonials available yet.</p>
          </div>
        `;
      }
  /* Dynamic Testimonials Loader - Deferred via IntersectionObserver to avoid critical path request chaining */
  const testimonialsGrid = document.getElementById('testimonialsGrid');
  if (testimonialsGrid) {
    if ('IntersectionObserver' in window) {
      const testimonialsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            loadDynamicTestimonials();
            testimonialsObserver.disconnect();
          }
        });
      }, { rootMargin: '300px' });
      testimonialsObserver.observe(testimonialsGrid);
    } else {
      setTimeout(loadDynamicTestimonials, 2000);
    }
  }

});
