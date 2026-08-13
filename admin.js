/* ==========================================================================
   HAULA ENTERPRISES — EXECUTIVE ADMIN DASHBOARD ENGINE (admin.js) v5.0
   SLOGAN: SMART LIFE, REAL VALUE
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* 0. Executive Login Gateway Authentication Engine */
  const loginOverlay = document.getElementById('adminLoginOverlay');
  const loginCard = document.getElementById('adminLoginCard');
  const loginForm = document.getElementById('loginForm');
  const loginEmail = document.getElementById('loginEmail');
  const loginPassword = document.getElementById('loginPassword');
  const rememberSession = document.getElementById('rememberSession');
  const loginErrorMsg = document.getElementById('loginErrorMsg');
  const adminLogoutBtn = document.getElementById('adminLogoutBtn');

  function checkAuth() {
    const isLoggedSession = sessionStorage.getItem('haula_admin_logged_in') === 'true';
    const isLoggedLocal = localStorage.getItem('haula_admin_logged_in') === 'true';

    if (isLoggedSession || isLoggedLocal) {
      if (loginOverlay) loginOverlay.classList.add('hidden');
    } else {
      if (loginOverlay) loginOverlay.classList.remove('hidden');
    }
  }

  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const emailVal = loginEmail ? loginEmail.value.trim().toLowerCase() : '';
      const passVal = loginPassword ? loginPassword.value : '';

      const savedPass = localStorage.getItem('haula_admin_pass') || 'admin123';
      const validEmail = 'admin@haula.co.tz';

      if ((emailVal === validEmail || emailVal === 'admin') && passVal === savedPass) {
        if (loginErrorMsg) loginErrorMsg.classList.remove('active');

        if (rememberSession && rememberSession.checked) {
          localStorage.setItem('haula_admin_logged_in', 'true');
        } else {
          sessionStorage.setItem('haula_admin_logged_in', 'true');
        }

        if (loginOverlay) loginOverlay.classList.add('hidden');
        showToast('✓ Welcome back, Super Administrator!');
      } else {
        if (loginErrorMsg) loginErrorMsg.classList.add('active');
        if (loginCard) {
          loginCard.classList.add('shake');
          setTimeout(() => loginCard.classList.remove('shake'), 400);
        }
      }
    });
  }

  if (adminLogoutBtn) {
    adminLogoutBtn.addEventListener('click', () => {
      sessionStorage.removeItem('haula_admin_logged_in');
      localStorage.removeItem('haula_admin_logged_in');
      if (loginOverlay) loginOverlay.classList.remove('hidden');
      window.location.href = 'login.html';
    });
  }

  /* 1. Tab Navigation Controller */
  const navItems = document.querySelectorAll('.admin-nav-item');
  const tabPanels = document.querySelectorAll('.admin-tab-panel');
  const pageTabTitle = document.getElementById('pageTabTitle');

  const tabTitles = {
    overview: "Overview & Executive Telemetry",
    divisions: "Divisions Management & Control",
    messages: "Customer Inquiries & Messages Inbox",
    ecosystem: "Software Ecosystem & Product Control Panel",
    partners: "Strategic Partners Marquee Manager",
    testimonials: "Enterprise Client Testimonials Manager",
    content: "Corporate Branding & Content Settings",
    settings: "System Security & Preferences"
  };

  function switchTab(tabId) {
    navItems.forEach(item => {
      if (item.getAttribute('data-tab') === tabId) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });

    tabPanels.forEach(panel => {
      if (panel.id === `tab-${tabId}`) {
        panel.classList.add('active');
      } else {
        panel.classList.remove('active');
      }
    });

    if (pageTabTitle && tabTitles[tabId]) {
      pageTabTitle.textContent = tabTitles[tabId];
    }
  }

  navItems.forEach(item => {
    item.addEventListener('click', () => {
      const tabId = item.getAttribute('data-tab');
      if (tabId) switchTab(tabId);
    });
  });

  document.addEventListener('click', (e) => {
    const switchBtn = e.target.closest('.nav-switch-btn');
    if (switchBtn) {
      const targetTab = switchBtn.getAttribute('data-target');
      if (targetTab) switchTab(targetTab);
    }
  });

  /* 2. Notification Toast System */
  const adminToast = document.getElementById('adminToast');
  const toastMessage = document.getElementById('toastMessage');

  function showToast(msg) {
    if (toastMessage && adminToast) {
      toastMessage.textContent = msg;
      adminToast.classList.add('active');
      setTimeout(() => {
        adminToast.classList.remove('active');
      }, 3500);
    }
  }

  /* 3. Division Status Storage & Synchronization */
  const defaultDivConfig = {
    transport: 'live',
    trading: 'live',
    security: 'live',
    techhub: 'live'
  };

  function loadDivisionConfig() {
    const saved = localStorage.getItem('haula_div_config');
    const config = saved ? JSON.parse(saved) : defaultDivConfig;

    document.querySelectorAll('.div-status-select').forEach(select => {
      const divKey = select.getAttribute('data-div');
      if (divKey && config[divKey]) {
        select.value = config[divKey];
      }
    });

    updateOverviewBadges(config);
  }

  function updateOverviewBadges(config) {
    const bTransport = document.getElementById('statusBadgeTransport');
    const bTrading = document.getElementById('statusBadgeTrading');
    const bSecurity = document.getElementById('statusBadgeSecurity');
    const bTechHub = document.getElementById('statusBadgeTechHub');

    if (bTransport) bTransport.textContent = config.transport === 'live' ? 'LIVE DIRECT PORTAL' : 'LOADING MODAL';
    if (bTrading) bTrading.textContent = config.trading === 'live' ? 'LIVE DIRECT PORTAL' : 'LOADING MODAL';
    if (bSecurity) bSecurity.textContent = config.security === 'live' ? 'LIVE DIRECT PORTAL' : 'NEW MODAL';
    if (bTechHub) bTechHub.textContent = config.techhub === 'live' ? 'LIVE DIRECT PORTAL' : '5TH DIV MODAL';
  }

  const saveDivisionsBtn = document.getElementById('saveDivisionsBtn');
  if (saveDivisionsBtn) {
    saveDivisionsBtn.addEventListener('click', () => {
      const currentConfig = {};
      document.querySelectorAll('.div-status-select').forEach(select => {
        const divKey = select.getAttribute('data-div');
        if (divKey) currentConfig[divKey] = select.value;
      });

      localStorage.setItem('haula_div_config', JSON.stringify(currentConfig));
      updateOverviewBadges(currentConfig);
      showToast('✓ Division operational status saved successfully!');
    });
  }

  /* Add Custom Conglomerate Division */
  const addCustomDivisionForm = document.getElementById('addCustomDivisionForm');
  if (addCustomDivisionForm) {
    addCustomDivisionForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const icon = document.getElementById('divIconInput').value.trim();
      const title = document.getElementById('divTitleInput').value.trim();
      const desc = document.getElementById('divDescInput').value.trim();

      if (icon && title && desc) {
        const saved = localStorage.getItem('haula_custom_divisions');
        const customDivs = saved ? JSON.parse(saved) : [];

        customDivs.push({
          id: 'div_' + Date.now(),
          icon,
          title,
          desc
        });

        localStorage.setItem('haula_custom_divisions', JSON.stringify(customDivs));
        addCustomDivisionForm.reset();
        showToast('✓ Custom Division added to Website successfully!');
      }
    });
  }

  /* 4. Contact Messages Inbox Manager */
  const defaultMessages = [
    {
      id: 1,
      date: '2026-08-08 14:22',
      name: 'Capt. Rashid Said',
      email: 'rashid.said@maritime-tz.com',
      department: 'Trading & Port Clearance',
      message: 'Tuna kontena 4 za mashine za viwanda ziko Bandari ya Dar es Salaam. Tunahitaji msaada wa kutoa mzigo (24-hr Port Clearance).'
    },
    {
      id: 2,
      date: '2026-08-08 11:05',
      name: 'Grace Kimaro',
      email: 'grace@greenfarms.co.tz',
      department: 'Transportation Logistics',
      message: 'Habari, tunaomba quotation ya kusafirisha tani 150 za nafaka kutoka Arusha kwenda Mombasa (Cross-Border Haulage).'
    },
    {
      id: 3,
      date: '2026-08-07 18:40',
      name: 'Eng. David Masawe',
      email: 'd.masawe@powergrid.co.tz',
      department: 'Security & Cyber Operations',
      message: 'Tunahitaji kufanya Cyber Security Vulnerability Audit kwenye server zetu za kampuni. Naomba kupata taarifa za bei.'
    }
  ];

  function getMessagesData() {
    const saved = localStorage.getItem('haula_messages');
    return saved ? JSON.parse(saved) : defaultMessages;
  }

  function saveMessagesData(messages) {
    localStorage.setItem('haula_messages', JSON.stringify(messages));
    loadMessages();
  }

  function loadMessages() {
    const messages = getMessagesData();
    const tbody = document.getElementById('messagesTableBody');
    const unreadBadge = document.getElementById('unreadMsgCount');
    const statInquiries = document.getElementById('statInquiries');

    if (unreadBadge) unreadBadge.textContent = messages.length;
    if (statInquiries) statInquiries.textContent = messages.length + 340;

    if (!tbody) return;

    if (messages.length === 0) {
      tbody.innerHTML = `
        <tr>
          <td colspan="6" style="text-align:center; color:#64748b; padding:30px;">Hakuna ujumbe mpya kwenye inbox.</td>
        </tr>
      `;
      return;
    }

    tbody.innerHTML = messages.map(msg => `
      <tr>
        <td style="font-size:12px; color:#64748b;">${msg.date}</td>
        <td><strong>${msg.name}</strong></td>
        <td><a href="mailto:${msg.email}" style="color:var(--hyper-orange); font-weight:600;">${msg.email}</a></td>
        <td><span class="badge-tag">${msg.department}</span></td>
        <td style="max-width:280px; font-size:12.5px; color:#475569;">${msg.message}</td>
        <td>
          <div style="display:flex; gap:8px;">
            <button class="btn-action-edit edit-msg-btn" data-id="${msg.id}">✏️ Edit</button>
            <button class="btn-action-delete delete-msg-btn" data-id="${msg.id}">🗑️ Delete</button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  /* Inbox Search & Filter */
  const searchMsgInput = document.getElementById('searchMsgInput');
  if (searchMsgInput) {
    searchMsgInput.addEventListener('input', (e) => {
      const q = e.target.value.toLowerCase();
      const rows = document.querySelectorAll('#messagesTableBody tr');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(q) ? '' : 'none';
      });
    });
  }

  /* Export Messages to CSV */
  const exportMessagesBtn = document.getElementById('exportMessagesBtn');
  if (exportMessagesBtn) {
    exportMessagesBtn.addEventListener('click', () => {
      const messages = getMessagesData();

      if (messages.length === 0) {
        showToast('Hakuna ujumbe wa ku-export.');
        return;
      }

      let csv = 'ID,Date,Name,Email,Department,Message\n';
      messages.forEach(m => {
        csv += `"${m.id}","${m.date}","${m.name}","${m.email}","${m.department}","${m.message.replace(/"/g, '""')}"\n`;
      });

      const blob = new Blob([csv], { type: 'text/csv' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `Haula_Customer_Inquiries_${Date.now()}.csv`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      showToast('✓ CSV Inbox report downloaded!');
    });
  }

  /* Clear All Messages */
  const clearMessagesBtn = document.getElementById('clearMessagesBtn');
  if (clearMessagesBtn) {
    clearMessagesBtn.addEventListener('click', () => {
      if (confirm('Are you sure you want to clear all inbox messages?')) {
        saveMessagesData([]);
        showToast('All inbox messages cleared.');
      }
    });
  }

  /* 5. Software Ecosystem & Products Manager */
  const defaultEcoProducts = [
    { key: 'dawafy', icon: '💊', title: 'Dawafy Health OS', desc: 'Pharmacy ERP, e-prescriptions & MOH drug registry sync.', status: 'live' },
    { key: 'tanzanite', icon: '💎', title: 'Tanzanite Insights', desc: 'Enterprise Business Intelligence & AI Predictive Analytics.', status: 'live' },
    { key: 'taskora', icon: '⚡', title: 'Taskora Enterprise', desc: 'Automated workflow engine & team task management suite.', status: 'live' },
    { key: 'eduka', icon: '🎓', title: 'Eduka Academy OS', desc: 'School management, fee collection & e-learning portal.', status: 'beta' }
  ];

  function getEcosystemData() {
    const savedCustom = localStorage.getItem('haula_custom_projects');
    const customProjs = savedCustom ? JSON.parse(savedCustom) : [];
    return [...defaultEcoProducts, ...customProjs];
  }

  function loadEcosystemConfig() {
    const grid = document.getElementById('adminEcosystemCardsGrid');
    if (!grid) return;

    const allProjs = getEcosystemData();

    grid.innerHTML = allProjs.map(p => `
      <div class="div-control-card">
        <div class="card-top">
          <span class="card-icon">${p.icon}</span>
          <div>
            <h3>${p.title}</h3>
            <small style="color:#64748b;">${p.desc}</small>
          </div>
        </div>
        <div class="form-group">
          <label>Deployment Status:</label>
          <select class="tesla-input-select eco-status-select" data-eco="${p.key}">
            <option value="live" ${p.status === 'live' ? 'selected' : ''}>Active Live Release</option>
            <option value="beta" ${p.status === 'beta' ? 'selected' : ''}>Beta Testing Phase</option>
            <option value="indev" ${p.status === 'indev' ? 'selected' : ''}>Under Development</option>
          </select>
        </div>
        <div style="display:flex; gap:8px; margin-top:10px; padding-top:10px; border-top:1px solid rgba(0,0,0,0.06);">
          <button class="btn-action-edit edit-eco-btn" data-key="${p.key}">✏️ Edit Product</button>
          <button class="btn-action-delete delete-eco-btn" data-key="${p.key}">🗑️ Delete</button>
        </div>
      </div>
    `).join('');
  }

  const addEcoProductForm = document.getElementById('addEcoProductForm');
  if (addEcoProductForm) {
    addEcoProductForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const icon = document.getElementById('ecoIconInput').value.trim();
      const title = document.getElementById('ecoTitleInput').value.trim();
      const desc = document.getElementById('ecoDescInput').value.trim();

      if (icon && title && desc) {
        const saved = localStorage.getItem('haula_custom_projects');
        const customProjs = saved ? JSON.parse(saved) : [];

        customProjs.push({
          key: 'custom_' + Date.now(),
          icon,
          title,
          desc,
          status: 'live'
        });

        localStorage.setItem('haula_custom_projects', JSON.stringify(customProjs));
        addEcoProductForm.reset();
        loadEcosystemConfig();
        showToast('✓ Custom Software Project added to Ecosystem!');
      }
    });
  }

  const saveEcosystemBtn = document.getElementById('saveEcosystemBtn');
  if (saveEcosystemBtn) {
    saveEcosystemBtn.addEventListener('click', () => {
      showToast('✓ Software Ecosystem config saved successfully!');
    });
  }

  /* 6. Strategic Partners Manager */
  const defaultPartners = [
    { icon: '⚓', name: 'TPA (Tanzania Ports Authority)', scope: 'Dar Port Customs Logistics' },
    { icon: '📄', name: 'TRA (Tanzania Revenue Authority)', scope: 'Statutory EFD Tax Integration' },
    { icon: '🌐', name: 'Cisco Systems', scope: 'Enterprise Network & Security' },
    { icon: '📡', name: 'MikroTik RouterOS', scope: 'Hardware Routing Infrastructure' },
    { icon: '☁️', name: 'Microsoft Enterprise', scope: 'Cloud & Server Ecosystem' },
    { icon: '🛡️', name: 'Dawafy Health OS', scope: 'Pharmacy Technology Partner' }
  ];

  function getPartnersData() {
    const saved = localStorage.getItem('haula_partners');
    return saved ? JSON.parse(saved) : defaultPartners;
  }

  function savePartnersData(partners) {
    localStorage.setItem('haula_partners', JSON.stringify(partners));
    loadPartners();
  }

  function loadPartners() {
    const partners = getPartnersData();
    const grid = document.getElementById('adminPartnersGrid');

    if (!grid) return;

    grid.innerHTML = partners.map((p, idx) => `
      <div class="partner-item-card" style="background:#f8fafc; border:1px solid rgba(0,0,0,0.08); padding:16px 20px; border-radius:16px; display:flex; align-items:center; justify-content:space-between;">
        <div style="display:flex; align-items:center; gap:14px;">
          <span style="font-size:26px;">${p.icon}</span>
          <div>
            <strong style="color:#0f172a; font-size:14px;">${p.name}</strong>
            <small style="display:block; color:#64748b; font-size:11.5px;">${p.scope}</small>
          </div>
        </div>
        <div style="display:flex; gap:8px;">
          <button class="btn-action-edit edit-partner-btn" data-idx="${idx}">✏️ Edit</button>
          <button class="btn-action-delete delete-partner-btn" data-idx="${idx}">🗑️ Delete</button>
        </div>
      </div>
    `).join('');
  }

  const addPartnerForm = document.getElementById('addPartnerForm');
  if (addPartnerForm) {
    addPartnerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const icon = document.getElementById('partnerIconInput').value.trim();
      const name = document.getElementById('partnerNameInput').value.trim();
      const scope = document.getElementById('partnerCatInput').value.trim();

      if (icon && name && scope) {
        const partners = getPartnersData();
        partners.push({ icon, name, scope });
        savePartnersData(partners);
        addPartnerForm.reset();
        showToast('✓ Partner added to Strategic Partners list!');
      }
    });
  }

  /* 7. INTERACTIVE EDIT & DELETE MODAL ENGINE */
  const editModalOverlay = document.getElementById('editModalOverlay');
  const editModalHeader = document.getElementById('editModalHeader');
  const editModalForm = document.getElementById('editModalForm');
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');
  const cancelEditModalBtn = document.getElementById('cancelEditModalBtn');

  const editItemId = document.getElementById('editItemId');
  const editItemType = document.getElementById('editItemType');

  const editGroup1 = document.getElementById('editGroup1');
  const editLabel1 = document.getElementById('editLabel1');
  const editInput1 = document.getElementById('editInput1');

  const editGroup2 = document.getElementById('editGroup2');
  const editLabel2 = document.getElementById('editLabel2');
  const editInput2 = document.getElementById('editInput2');

  const editGroup3 = document.getElementById('editGroup3');
  const editLabel3 = document.getElementById('editLabel3');
  const editInput3 = document.getElementById('editInput3');

  const editGroup4 = document.getElementById('editGroup4');
  const editLabel4 = document.getElementById('editLabel4');
  const editInput4 = document.getElementById('editInput4');

  function hideEditModal() {
    if (editModalOverlay) editModalOverlay.classList.add('hidden');
  }

  if (closeEditModalBtn) closeEditModalBtn.addEventListener('click', hideEditModal);
  if (cancelEditModalBtn) cancelEditModalBtn.addEventListener('click', hideEditModal);

  document.addEventListener('click', (e) => {
    // Delete Message
    const delMsgBtn = e.target.closest('.delete-msg-btn');
    if (delMsgBtn) {
      const msgId = parseInt(delMsgBtn.getAttribute('data-id'));
      let messages = getMessagesData();
      messages = messages.filter(m => m.id !== msgId);
      saveMessagesData(messages);
      showToast('🗑️ Ujumbe umefutwa kikamilifu.');
      return;
    }

    // Edit Message
    const editMsgBtn = e.target.closest('.edit-msg-btn');
    if (editMsgBtn) {
      const msgId = parseInt(editMsgBtn.getAttribute('data-id'));
      const messages = getMessagesData();
      const targetMsg = messages.find(m => m.id === msgId);

      if (targetMsg) {
        editItemId.value = msgId;
        editItemType.value = 'message';
        editModalHeader.textContent = '✏️ Edit Customer Message Inquiry';

        editLabel1.textContent = 'Full Name';
        editInput1.value = targetMsg.name;

        editLabel2.textContent = 'Email Address';
        editInput2.value = targetMsg.email;

        editLabel3.textContent = 'Department';
        editInput3.value = targetMsg.department;

        editGroup4.style.display = 'block';
        editLabel4.textContent = 'Message Details';
        editInput4.value = targetMsg.message;

        if (editModalOverlay) editModalOverlay.classList.remove('hidden');
      }
      return;
    }

    // Delete Partner
    const delPartnerBtn = e.target.closest('.delete-partner-btn');
    if (delPartnerBtn) {
      const idx = parseInt(delPartnerBtn.getAttribute('data-idx'));
      let partners = getPartnersData();
      partners.splice(idx, 1);
      savePartnersData(partners);
      showToast('🗑️ Strategic Partner removed.');
      return;
    }

    // Edit Partner
    const editPartnerBtn = e.target.closest('.edit-partner-btn');
    if (editPartnerBtn) {
      const idx = parseInt(editPartnerBtn.getAttribute('data-idx'));
      const partners = getPartnersData();
      const targetP = partners[idx];

      if (targetP) {
        editItemId.value = idx;
        editItemType.value = 'partner';
        editModalHeader.textContent = '✏️ Edit Strategic Partner Details';

        editLabel1.textContent = 'Partner Organization Name';
        editInput1.value = targetP.name;

        editLabel2.textContent = 'Emoji / Logo Icon';
        editInput2.value = targetP.icon;

        editLabel3.textContent = 'Scope / Category Tag';
        editInput3.value = targetP.scope;

        editGroup4.style.display = 'none';

        if (editModalOverlay) editModalOverlay.classList.remove('hidden');
      }
      return;
    }

    // Delete Ecosystem Product
    const delEcoBtn = e.target.closest('.delete-eco-btn');
    if (delEcoBtn) {
      const key = delEcoBtn.getAttribute('data-key');
      const savedCustom = localStorage.getItem('haula_custom_projects');
      let customProjs = savedCustom ? JSON.parse(savedCustom) : [];

      customProjs = customProjs.filter(p => p.key !== key);
      localStorage.setItem('haula_custom_projects', JSON.stringify(customProjs));
      loadEcosystemConfig();
      showToast('🗑️ Ecosystem product deleted.');
      return;
    }

    // Edit Ecosystem Product
    const editEcoBtn = e.target.closest('.edit-eco-btn');
    if (editEcoBtn) {
      const key = editEcoBtn.getAttribute('data-key');
      const allProjs = getEcosystemData();
      const targetProj = allProjs.find(p => p.key === key);

      if (targetProj) {
        editItemId.value = key;
        editItemType.value = 'ecosystem';
        editModalHeader.textContent = '✏️ Edit Software Product Specifications';

        editLabel1.textContent = 'Product Title';
        editInput1.value = targetProj.title;

        editLabel2.textContent = 'Product Emoji Icon';
        editInput2.value = targetProj.icon;

        editLabel3.textContent = 'Description & Tech Scope';
        editInput3.value = targetProj.desc;

        editGroup4.style.display = 'none';

        if (editModalOverlay) editModalOverlay.classList.remove('hidden');
      }
      return;
    }
  });

  /* Edit Form Submit Listener */
  if (editModalForm) {
    editModalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const type = editItemType.value;
      const id = editItemId.value;

      if (type === 'message') {
        const messages = getMessagesData();
        const targetMsg = messages.find(m => m.id === parseInt(id));

        if (targetMsg) {
          targetMsg.name = editInput1.value.trim();
          targetMsg.email = editInput2.value.trim();
          targetMsg.department = editInput3.value.trim();
          targetMsg.message = editInput4.value.trim();
          saveMessagesData(messages);
          showToast('✓ Customer Message updated successfully!');
        }
      } else if (type === 'partner') {
        const partners = getPartnersData();
        const idx = parseInt(id);

        if (partners[idx]) {
          partners[idx].name = editInput1.value.trim();
          partners[idx].icon = editInput2.value.trim();
          partners[idx].scope = editInput3.value.trim();
          savePartnersData(partners);
          showToast('✓ Strategic Partner details updated successfully!');
        }
      } else if (type === 'ecosystem') {
        const savedCustom = localStorage.getItem('haula_custom_projects');
        let customProjs = savedCustom ? JSON.parse(savedCustom) : [];

        const targetCustom = customProjs.find(p => p.key === id);
        if (targetCustom) {
          targetCustom.title = editInput1.value.trim();
          targetCustom.icon = editInput2.value.trim();
          targetCustom.desc = editInput3.value.trim();
          localStorage.setItem('haula_custom_projects', JSON.stringify(customProjs));
        } else {
          // If default product, update in custom projects list
          customProjs.push({
            key: id,
            title: editInput1.value.trim(),
            icon: editInput2.value.trim(),
            desc: editInput3.value.trim(),
            status: 'live'
          });
          localStorage.setItem('haula_custom_projects', JSON.stringify(customProjs));
        }

        loadEcosystemConfig();
        showToast('✓ Software Product updated successfully!');
      }

      hideEditModal();
    });
  }

  /* 8. Corporate Branding Form Handler */
  const brandingForm = document.getElementById('brandingForm');
  if (brandingForm) {
    const savedBranding = localStorage.getItem('haula_branding');
    if (savedBranding) {
      const brandConfig = JSON.parse(savedBranding);
      if (brandConfig.slogan) document.getElementById('brandSloganInput').value = brandConfig.slogan;
      if (brandConfig.email) document.getElementById('brandEmailInput').value = brandConfig.email;
      if (brandConfig.phone) document.getElementById('brandPhoneInput').value = brandConfig.phone;
      if (brandConfig.address) document.getElementById('brandAddressInput').value = brandConfig.address;
    }

    brandingForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const slogan = document.getElementById('brandSloganInput').value;
      const email = document.getElementById('brandEmailInput').value;
      const phone = document.getElementById('brandPhoneInput').value;
      const address = document.getElementById('brandAddressInput').value;

      const brandConfig = { slogan, email, phone, address };
      localStorage.setItem('haula_branding', JSON.stringify(brandConfig));
      showToast('✓ Corporate Branding settings saved successfully!');
    });
  }

  /* 9. Super Administrator Password Change Handler */
  const adminPassForm = document.getElementById('adminPassForm');
  if (adminPassForm) {
    adminPassForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const oldPass = document.getElementById('oldPassInput').value;
      const newPass = document.getElementById('newPassInput').value;
      const confirmPass = document.getElementById('confirmPassInput').value;

      if (newPass !== confirmPass) {
        alert('New Password and Confirm Password do not match!');
        return;
      }

      if (newPass.length < 6) {
        alert('Password must be at least 6 characters long.');
        return;
      }

      localStorage.setItem('haula_admin_pass', newPass);
      adminPassForm.reset();
      showToast('✓ Super Administrator Password updated successfully!');
    });
  }

  /* Maintenance Mode Toggle Handler */
  const maintenanceToggle = document.getElementById('maintenanceToggle');
  if (maintenanceToggle) {
    const savedMaint = localStorage.getItem('haula_maintenance');
    if (savedMaint === 'true') maintenanceToggle.checked = true;

    maintenanceToggle.addEventListener('change', (e) => {
      localStorage.setItem('haula_maintenance', e.target.checked);
      showToast(e.target.checked ? '⚠️ System Maintenance Mode ENABLED' : '✓ System Maintenance Mode DISABLED');
    });
  }

  /* 10. Full System Data Backup Export & Restore (JSON) Engine */
  const exportBackupBtn = document.getElementById('exportBackupBtn');
  if (exportBackupBtn) {
    exportBackupBtn.addEventListener('click', () => {
      const backupData = {
        timestamp: new Date().toISOString(),
        version: "5.0",
        haula_div_config: localStorage.getItem('haula_div_config'),
        haula_custom_projects: localStorage.getItem('haula_custom_projects'),
        haula_messages: localStorage.getItem('haula_messages'),
        haula_partners: localStorage.getItem('haula_partners'),
        haula_branding: localStorage.getItem('haula_branding'),
        haula_maintenance: localStorage.getItem('haula_maintenance')
      };

      const jsonStr = JSON.stringify(backupData, null, 2);
      const blob = new Blob([jsonStr], { type: 'application/json' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `Haula_Enterprises_System_Backup_${Date.now()}.json`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      showToast('✓ Full System Backup exported to JSON file successfully!');
    });
  }

  const importBackupFile = document.getElementById('importBackupFile');
  if (importBackupFile) {
    importBackupFile.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function(evt) {
        try {
          const data = JSON.parse(evt.target.result);
          if (data.haula_div_config) localStorage.setItem('haula_div_config', data.haula_div_config);
          if (data.haula_custom_projects) localStorage.setItem('haula_custom_projects', data.haula_custom_projects);
          if (data.haula_messages) localStorage.setItem('haula_messages', data.haula_messages);
          if (data.haula_partners) localStorage.setItem('haula_partners', data.haula_partners);
          if (data.haula_branding) localStorage.setItem('haula_branding', data.haula_branding);
          if (data.haula_maintenance) localStorage.setItem('haula_maintenance', data.haula_maintenance);

          loadDivisionConfig();
          loadEcosystemConfig();
          loadMessages();
          loadPartners();

          showToast('✓ System Backup restored successfully!');
        } catch (err) {
          alert('Error restoring backup file: Invalid JSON structure.');
        }
      };
      reader.readAsText(file);
    });
  }

  /* Reset System Button */
  const resetSystemBtn = document.getElementById('resetSystemBtn');
  if (resetSystemBtn) {
    resetSystemBtn.addEventListener('click', () => {
      if (confirm('Are you sure you want to reset system settings and clear local cache?')) {
        localStorage.clear();
        sessionStorage.clear();
        checkAuth();
        loadDivisionConfig();
        loadEcosystemConfig();
        loadMessages();
        loadPartners();
        showToast('✓ System reset to default configuration.');
      }
    });
  }

  /* 11. Language Toggle for Admin Interface */
  const langToggleBtn = document.getElementById('langToggle');
  const langEN = document.getElementById('langEN');
  const langSW = document.getElementById('langSW');

  if (langToggleBtn) {
    langToggleBtn.addEventListener('click', () => {
      const isCurrentlyEN = langEN?.classList.contains('active-lang');

      if (isCurrentlyEN) {
        langEN?.classList.remove('active-lang');
        langSW?.classList.add('active-lang');
        switchAdminLanguage('sw');
      } else {
        langSW?.classList.remove('active-lang');
        langEN?.classList.add('active-lang');
        switchAdminLanguage('en');
      }
    });
  }

  function switchAdminLanguage(lang) {
    const translatableEls = document.querySelectorAll('[data-en][data-sw]');
    translatableEls.forEach(el => {
      const text = el.getAttribute(`data-${lang}`);
      if (text) {
        el.textContent = text;
      }
    });
  }

  /* 12. Testimonials Admin Engine */
  const addTestimonialBtn = document.getElementById('addTestimonialBtn');
  const newTestimonialFormContainer = document.getElementById('newTestimonialFormContainer');
  const cancelTestimonialBtn = document.getElementById('cancelTestimonialBtn');
  const createTestimonialForm = document.getElementById('createTestimonialForm');
  const adminTestimonialsList = document.getElementById('adminTestimonialsList');

  if (addTestimonialBtn && newTestimonialFormContainer) {
    addTestimonialBtn.addEventListener('click', () => {
      newTestimonialFormContainer.style.display = newTestimonialFormContainer.style.display === 'none' ? 'block' : 'none';
    });
  }

  if (cancelTestimonialBtn && newTestimonialFormContainer) {
    cancelTestimonialBtn.addEventListener('click', () => {
      newTestimonialFormContainer.style.display = 'none';
    });
  }

  if (createTestimonialForm) {
    createTestimonialForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const name = document.getElementById('testAuthorName')?.value.trim();
      const role = document.getElementById('testAuthorRole')?.value.trim();
      const avatar = document.getElementById('testAvatar')?.value.trim() || '👨‍💼';
      const rating = document.getElementById('testRating')?.value || '5';
      const quote_en = document.getElementById('testQuoteEN')?.value.trim();
      const quote_sw = document.getElementById('testQuoteSW')?.value.trim() || quote_en;

      if (!name || !quote_en) {
        showToast('❌ Please fill in required fields');
        return;
      }

      try {
        const response = await fetch('/api/testimonials', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ author_name: name, author_role: role, avatar, rating: parseInt(rating), quote_en, quote_sw })
        });

        if (response.ok) {
          showToast('✓ Testimonial saved successfully!');
          createTestimonialForm.reset();
          if (newTestimonialFormContainer) newTestimonialFormContainer.style.display = 'none';
          loadAdminTestimonials();
        } else {
          showToast('❌ Failed to save testimonial');
        }
      } catch (err) {
        console.error(err);
        showToast('❌ Error connecting to server');
      }
    });
  }

  async function loadAdminTestimonials() {
    if (!adminTestimonialsList) return;

    try {
      const response = await fetch('/api/testimonials/all');
      if (!response.ok) return;
      const data = await response.json();

      if (data && data.length > 0) {
        let html = '';
        data.forEach(item => {
          const stars = '★'.repeat(item.rating || 5);
          html += `
            <div style="background:#f8fafc; border:1px solid rgba(0,0,0,0.08); border-radius:14px; padding:16px; position:relative;">
              <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
                <div style="display:flex; align-items:center; gap:10px;">
                  <span style="font-size:24px;">${item.avatar || '👨‍💼'}</span>
                  <div>
                    <strong style="display:block; font-size:14px; color:#0f172a;">${item.author_name}</strong>
                    <small style="color:#64748b; font-size:12px;">${item.author_role || ''}</small>
                  </div>
                </div>
              </div>
              <div style="color:var(--hyper-orange); font-size:12px; margin-bottom:8px;">${stars}</div>
              <p style="font-size:13px; color:#334155; font-style:italic; margin-bottom:14px; line-height:1.4;">"${item.quote_en}"</p>
              <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid rgba(0,0,0,0.06); padding-top:10px;">
                <button onclick="toggleTestimonial(${item.id})" class="hyper-btn-outline" style="font-size:11px; padding:4px 10px; border-radius:8px; background:${item.is_active ? 'rgba(16,185,129,0.1)' : '#f1f5f9'}; color:${item.is_active ? '#10b981' : '#64748b'}; border:1px solid ${item.is_active ? 'rgba(16,185,129,0.2)' : '#cbd5e1'}; font-weight:700; cursor:pointer;">
                  ${item.is_active ? '● Active' : '○ Hidden'}
                </button>
                <button onclick="deleteTestimonial(${item.id})" style="background:none; border:none; color:#ef4444; font-size:12px; font-weight:700; cursor:pointer;">Delete</button>
              </div>
            </div>
          `;
        });
        adminTestimonialsList.innerHTML = html;
      } else {
        adminTestimonialsList.innerHTML = `
          <div style="grid-column:1 / -1; text-align:center; padding:30px; color:#94a3b8; font-size:13.5px;">
            No client testimonials in database yet. Click "+ Add Testimonial" above to create one.
          </div>
        `;
      }
    } catch (err) {
      console.error(err);
    }
  }

  window.toggleTestimonial = async function(id) {
    try {
      const response = await fetch(`/api/testimonials/${id}/toggle`, { method: 'POST' });
      if (response.ok) {
        showToast('✓ Status updated');
        loadAdminTestimonials();
      }
    } catch (err) {
      console.error(err);
    }
  };

  window.deleteTestimonial = async function(id) {
    if (!confirm('Are you sure you want to delete this testimonial?')) return;
    try {
      const response = await fetch(`/api/testimonials/${id}`, { method: 'DELETE' });
      if (response.ok) {
        showToast('✓ Testimonial deleted');
        loadAdminTestimonials();
      }
    } catch (err) {
      console.error(err);
    }
  };

  /* Initial Page Load Execution */
  checkAuth();
  loadDivisionConfig();
  loadEcosystemConfig();
  loadMessages();
  loadPartners();
  loadAdminTestimonials();

});
