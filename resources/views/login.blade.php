<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Haula Enterprises — Executive Admin Login Portal" />
    <meta name="theme-color" content="#f8fafc" />
    <title>Executive Login | Haula Admin OS</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/imgs/logo.png" />

    <!-- Google Fonts: Space Grotesk & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="styles.css?v=25.0" />
    <style>
      body.login-page-body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: #f8fafc linear-gradient(135deg, #f1f5f9 0%, #f8fafc 50%, #e2e8f0 100%) fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-main);
        color: #0f172a;
      }

      .login-container-card {
        width: 100%;
        max-width: 440px;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        padding: 42px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
        display: flex;
        flex-direction: column;
        gap: 22px;
        margin: 20px;
        animation: loginFadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      }

      @keyframes loginFadeIn {
        from { opacity: 0; transform: translateY(20px) scale(0.96); }
        to { opacity: 1; transform: translateY(0) scale(1); }
      }

      .login-container-card.shake {
        animation: loginShake 0.4s ease-in-out;
      }

      @keyframes loginShake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-10px); }
        40%, 80% { transform: translateX(10px); }
      }

      .l-brand-header {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding-bottom: 22px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
      }

      .l-brand-header img {
        height: 50px !important;
        width: auto !important;
        object-fit: contain !important;
      }

      .l-brand-header h1 {
        font-family: var(--font-heading);
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        letter-spacing: -0.5px;
        margin: 0;
      }

      .l-brand-header span {
        font-size: 11px;
        color: var(--hyper-orange);
        font-weight: 800;
        letter-spacing: 1px;
      }

      .l-form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .l-form-group label {
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .l-input {
        width: 100%;
        padding: 14px 18px;
        background: #f8fafc;
        border: 1px solid rgba(0, 0, 0, 0.12);
        border-radius: 14px;
        color: #0f172a;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
        transition: all var(--transition-hyper);
      }

      .l-input:focus {
        border-color: var(--hyper-orange);
        box-shadow: 0 0 0 4px rgba(255, 105, 0, 0.15);
        background: #ffffff;
      }

      .l-submit-btn {
        width: 100%;
        height: 52px;
        background: linear-gradient(135deg, var(--hyper-orange), #e05d00);
        color: #ffffff;
        font-family: var(--font-main);
        font-size: 14.5px;
        font-weight: 700;
        border-radius: 14px;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(255, 105, 0, 0.35);
        transition: all var(--transition-hyper);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
      }

      .l-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(255, 105, 0, 0.5);
      }

      .l-error-alert {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.25);
        color: #ef4444;
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 12.5px;
        font-weight: 700;
        text-align: center;
        display: none;
      }

      .l-error-alert.active {
        display: block;
      }
    </style>
  </head>
  <body class="login-page-body">

    <div class="login-container-card" id="loginCard">
      <div class="l-brand-header">
        <img src="assets/imgs/logo.png" alt="Haula Logo" />
        <h1>HAULA EXECUTIVE OS</h1>
        <span>● ENCRYPTED SECURITY GATEWAY v5.0 (LIGHT THEME)</span>
      </div>

      <form id="standaloneLoginForm" style="display:flex; flex-direction:column; gap:18px;">
        <div class="l-form-group">
          <label for="pEmail">Administrator Email / Username</label>
          <input type="email" id="pEmail" class="l-input" value="admin@haula.co.tz" required autocomplete="username" />
        </div>

        <div class="l-form-group">
          <label for="pPassword">Security Password</label>
          <input type="password" id="pPassword" class="l-input" value="admin123" placeholder="••••••••" required autocomplete="current-password" />
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; font-size:12px; color:#64748b;">
          <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
            <input type="checkbox" id="pRemember" checked style="accent-color:var(--hyper-orange);" />
            <span>Keep me logged in</span>
          </label>
          <span style="color:var(--hyper-orange); font-size:11px; font-weight:700;">🔒 256-Bit SSL Auth</span>
        </div>

        <div class="l-error-alert" id="pErrorAlert">
          ❌ Incorrect Administrator Email or Password!
        </div>

        <button type="submit" class="l-submit-btn" id="pSubmitBtn">
          <span>Authenticate & Access OS &rarr;</span>
        </button>
      </form>

      <div style="text-align:center; padding-top:10px; border-top:1px solid rgba(0,0,0,0.08);">
        <p style="font-size:11px; color:#64748b; margin:0 0 6px 0;">Default Executive Login Credentials:</p>
        <code style="font-size:11px; color:var(--hyper-orange); background:rgba(255,105,0,0.1); padding:4px 10px; border-radius:6px;">admin@haula.co.tz</code>
        <span style="color:#64748b; font-size:11px; margin:0 6px;">|</span>
        <code style="font-size:11px; color:#0284c7; background:rgba(2,132,199,0.1); padding:4px 10px; border-radius:6px;">admin123</code>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('standaloneLoginForm');
        const card = document.getElementById('loginCard');
        const errorAlert = document.getElementById('pErrorAlert');

        form.addEventListener('submit', (e) => {
          e.preventDefault();
          const email = document.getElementById('pEmail').value.trim().toLowerCase();
          const pass = document.getElementById('pPassword').value;
          const remember = document.getElementById('pRemember').checked;

          const savedPass = localStorage.getItem('haula_admin_pass') || 'admin123';
          const validEmail = 'admin@haula.co.tz';

          if ((email === validEmail || email === 'admin') && pass === savedPass) {
            errorAlert.classList.remove('active');
            
            if (remember) {
              localStorage.setItem('haula_admin_logged_in', 'true');
            } else {
              sessionStorage.setItem('haula_admin_logged_in', 'true');
            }

            // Redirect to Admin Dashboard
            window.location.href = 'admin.html';
          } else {
            errorAlert.classList.add('active');
            card.classList.add('shake');
            setTimeout(() => card.classList.remove('shake'), 400);
          }
        });
      });
    </script>
  </body>
</html>
