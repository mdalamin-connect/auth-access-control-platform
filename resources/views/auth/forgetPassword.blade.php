<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Reset your Mirsaige account password to regain access to premium construction project management services in Bangladesh.">
    <meta name="keywords" content="Mirsaige PMC password reset, construction management password recovery, project consultancy Bangladesh, building solutions login help">
    <meta name="author" content="Mirsaige Construction Consultants">
    <meta property="og:title" content="Password Reset | Mirsaige PMC : Project Management Consultancy">
    <meta property="og:description" content="Reset your Mirsaige account password for construction project management services in Bangladesh.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mirsaige-bd.com/password/reset">
    <link rel="icon" href="{{ asset('img/Logo_Transparent.webp') }}" />
    <title>Forgot Password | Mirsaige PMC: Project Management Consultancy Experts in Bangladesh</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Butter:wght@400;700&display=swap");
      
      :root {
        /* Mirsaige Official Color Palette */
        --mirsaige-primary: #000000;
        --mirsaige-secondary: #080835;
        --mirsaige-text: #838D97;
        --mirsaige-accent: #FFB23E;
        --mirsaige-light-accent: #E0E4EA;
        --mirsaige-white: #FFFFFF;
        --mirsaige-white-transparent: #FFFFFF3D;
        --mirsaige-white-transparent-full: #FFFFFF00;
        --mirsaige-blue: #1C5CDB;
        --mirsaige-gold: #DD9933;
        --mirsaige-light-gray: #C4C8CE;
        --mirsaige-light-bg: #F5F7FA;
        --mirsaige-dark: #202334;
        --mirsaige-dark-transparent: #20233480;
        --mirsaige-light-blue: #E0ECFFCC;
        --mirsaige-medium-gray: #4B4D5C;
        --mirsaige-dark-blue: #272A3D;
        --mirsaige-darker-blue: #11131F;
        --mirsaige-dark-gold: #5C3A08;
        --mirsaige-dark-gray: #373949;
        
        /* Typography */
        --mirsaige-font-primary: "Butter", sans-serif;
        --mirsaige-font-secondary: "Butter", sans-serif;
        --mirsaige-font-text: "DM Sans", sans-serif;
        --mirsaige-font-accent: "DM Sans", sans-serif;
        
        /* Spacing System */
        --mirsaige-space-3xs: 4px;
        --mirsaige-space-2xs: 8px;
        --mirsaige-space-xs: 12px;
        --mirsaige-space-sm: 16px;
        --mirsaige-space-md: 24px;
        --mirsaige-space-lg: 32px;
        --mirsaige-space-xl: 48px;
        --mirsaige-space-2xl: 64px;
        --mirsaige-space-3xl: 80px;
      }
      
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      
      body.mirsaige-forgot-password {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background:
          linear-gradient(
            to top,
            rgba(32, 35, 52, 0.95) 0%,
            rgba(32, 35, 52, 0.75) 20%,
            rgba(32, 35, 52, 0.45) 40%,
            rgba(32, 35, 52, 0.2) 60%,
            rgba(32, 35, 52, 0.05) 80%,
            rgba(32, 35, 52, 0) 100%
          ),
          url("{{ asset('img/mirsaige-login-background.webp') }}");
        background-size: cover;
        background-position: 0% 22%;
        background-attachment: fixed;
        background-repeat: no-repeat;
        color: var(--mirsaige-light);
      }
      
      /* Logo in top-left corner */
      .mirsaige-login-logo-corner {
        position: fixed;
        top: var(--mirsaige-space-md);
        left: var(--mirsaige-space-md);
        width: 120px;
        height: auto;
        z-index: 1000;
      }
      
      /* Main Wrapper */
      .mirsaige-login-wrapper {
        position: relative;
        width: 90%;
        max-width: 800px;
        min-height: 500px;
        background: rgba(32, 35, 52, 0.8);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 178, 62, 0.2);
        display: flex;
        margin-top: 80px;
      }
      
      /* Form Container */
      .mirsaige-login-form-container {
        width: 100%;
        padding: var(--mirsaige-space-xl);
        display: flex;
        flex-direction: column;
        justify-content: center;
        z-index: 2;
      }
      
      /* Info Container */
      .mirsaige-login-info-container {
        width: 100%;
        padding: var(--mirsaige-space-xl);
        background: linear-gradient(135deg, var(--mirsaige-secondary), var(--mirsaige-dark-blue));
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
      }
      
      .mirsaige-login-info-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
          45deg,
          transparent,
          rgba(255, 178, 62, 0.1),
          transparent
        );
        transform: rotate(45deg);
        animation: mirsaige-shine 8s infinite;
      }
      
      @keyframes mirsaige-shine {
        0% { left: -100%; }
        20% { left: 100%; }
        100% { left: 100%; }
      }
      
      /* Logo & Branding */
      .mirsaige-login-logo {
        font-family: var(--mirsaige-font-primary);
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: var(--mirsaige-space-md);
        color: var(--mirsaige-gold);
        text-shadow: 0 0 12px rgba(221, 153, 51, 0.4);
        position: relative;
      }
      .mirsaige-typing-text {
        color: #FFB23E;
        font-weight: 600;
        min-height: 60px;
        display: inline-block;
        font-family: var(--mirsaige-font-text);
      }
      .mirsaige-login-title {
        font-family: var(--mirsaige-font-primary);
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: var(--mirsaige-space-md);
        color: var(--mirsaige-white);
        line-height: 1.3;
      }
      
      .mirsaige-login-subtitle {
        font-family: var(--mirsaige-font-text);
        font-size: 1rem;
        color: var(--mirsaige-text);
        margin-bottom: var(--mirsaige-space-xl);
        max-width: 80%;
      }
      
      /* Form Elements */
      .mirsaige-login-form {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
      }
      
      .mirsaige-login-form h2 {
        font-family: var(--mirsaige-font-primary);
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: var(--mirsaige-space-lg);
        color: var(--mirsaige-white);
        text-align: center;
      }
      
      .mirsaige-input-group {
        position: relative;
        margin-bottom: var(--mirsaige-space-lg);
      }
      
      .mirsaige-input-group input {
        width: 100%;
        padding: var(--mirsaige-space-sm) 0;
        font-size: 1rem;
        color: var(--mirsaige-white);
        background: transparent;
        border: none;
        border-bottom: 1px solid var(--mirsaige-medium-gray);
        outline: none;
        font-family: var(--mirsaige-font-text);
      }
      
      .mirsaige-input-group input:focus {
        border-bottom-color: var(--mirsaige-accent);
      }
      
      .mirsaige-input-group label {
        position: absolute;
        top: var(--mirsaige-space-sm);
        left: 0;
        font-size: 1rem;
        color: var(--mirsaige-text);
        pointer-events: none;
        font-family: var(--mirsaige-font-text);
      }
      
      .mirsaige-input-group input:focus ~ label,
      .mirsaige-input-group input:valid ~ label {
        top: -12px;
        font-size: 0.75rem;
        color: var(--mirsaige-accent);
      }
      
      .mirsaige-input-icon {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        color: var(--mirsaige-text);
        cursor: pointer;
      }
      
      .mirsaige-input-group input:focus ~ .mirsaige-input-icon {
        color: var(--mirsaige-accent);
      }
      
      /* Button */
      .mirsaige-login-btn {
        width: 100%;
        padding: var(--mirsaige-space-sm);
        background: transparent;
        border: 2px solid var(--mirsaige-accent);
        color: var(--mirsaige-white);
        font-size: 1rem;
        font-weight: 600;
        border-radius: 30px;
        cursor: pointer;
        margin-top: var(--mirsaige-space-md);
        position: relative;
        overflow: hidden;
        z-index: 1;
        font-family: var(--mirsaige-font-accent);
      }
      
      .mirsaige-login-btn:hover {
        color: var(--mirsaige-dark);
      }
      
      .mirsaige-login-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: var(--mirsaige-accent);
        z-index: -1;
      }
      
      .mirsaige-login-btn:hover::before {
        width: 100%;
      }
      
      /* Links */
      .mirsaige-login-links {
        margin-top: var(--mirsaige-space-lg);
        text-align: center;
      }
      
      .mirsaige-login-link {
        color: var(--mirsaige-text);
        font-size: 0.875rem;
        text-decoration: none;
        display: block;
        margin-bottom: var(--mirsaige-space-xs);
        font-family: var(--mirsaige-font-text);
      }
      
      .mirsaige-login-link:hover {
        color: var(--mirsaige-accent);
        text-decoration: underline;
      }
      
      .mirsaige-login-link-accent {
        color: var(--mirsaige-accent);
        font-weight: 600;
      }
      
      /* Message styles */
      .mirsaige-message {
        padding: var(--mirsaige-space-xs);
        margin-bottom: var(--mirsaige-space-md);
        border-radius: 4px;
        font-family: var(--mirsaige-font-text);
        text-align: center;
      }
      
      .mirsaige-message-success {
        color: #4BB543;
        background-color: rgba(75, 181, 67, 0.1);
      }
      
      .mirsaige-message-error {
        color: #FF3333;
        background-color: rgba(255, 51, 51, 0.1);
      }
      
      /* Auto-fill styles */
      input:-webkit-autofill,
      input:-webkit-autofill:hover, 
      input:-webkit-autofill:focus, 
      input:-webkit-autofill:active {
        -webkit-text-fill-color: var(--mirsaige-white) !important;
        -webkit-box-shadow: 0 0 0 1000px var(--mirsaige-dark) inset !important;
        transition: background-color 5000s ease-in-out 0s;
      }
      
      /* ================= RESPONSIVE STYLES ================= */
      /* Extra small devices (phones, 600px and down) */
      @media (max-width: 600px) {
        .mirsaige-login-logo-corner {
          width: 60px;
          top: 10px;
          left: 10px;
        }
       

        body.mirsaige-forgot-password {
          background-position: 20% 0%;
        }
        
        .mirsaige-login-wrapper {
          flex-direction: column;
          margin-top: 70px;
          min-height: auto;
          max-width: 70%;
        }
        .mirsaige-login-info-container{
          display: none;
        }
        .mirsaige-login-form-container
         {
          padding: var(--mirsaige-space-md);
        }
        
        .mirsaige-login-title {
          font-size: 1.5rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 1.35rem;
        }
        
        .mirsaige-login-logo {
          font-size: 2rem;
        }
        
        .mirsaige-login-subtitle {
          max-width: 90%;
          font-size: 0.9rem;
        }
      }
      
      /* Small devices (portrait tablets and large phones, 600px and up) */
      @media (min-width: 600px) and (max-width: 767px) {
          .mirsaige-login-logo-corner {
          width: 60px;
          top: 10px;
          left: 20px;
        }
        .mirsaige-login-info-container{
          display: none;
        }
        .mirsaige-login-wrapper {
          margin-top:60px;
          max-width: 600px;
        }
      }
      
      /* Medium devices (landscape tablets, 768px and up) */
      @media (min-width: 768px) {
        .mirsaige-login-wrapper {
          flex-direction: row;
          min-height: 450px;
          margin-top: 100px;
        }
        
         .mirsaige-login-logo-corner {
          width: 70px;
          top: 30px;
          left: 30px;
        }
        .mirsaige-login-form-container,
        .mirsaige-login-info-container {
          width: 50%;
          padding: var(--mirsaige-space-xl) var(--mirsaige-space-lg);
        }
      }
      
      /* Large devices (laptops/desktops, 992px and up) */
      @media (min-width: 992px) {
        .mirsaige-login-logo-corner {
          width: 70px;
          top: 30px;
          left: 30px;
        }
        
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-2xl);
        }
        
        .mirsaige-login-wrapper {
          min-height: 500px;
          max-width: 800px;
        }
        
        .mirsaige-login-title {
          font-size: 2.25rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 2rem;
        }
      }
      
      /* Landscape orientation adjustments */
      @media (max-height: 600px) and (orientation: landscape) {
        .mirsaige-login-wrapper {
          min-height: 100vh;
          border-radius: 0;
          margin-top: 0;
        }
        
        .mirsaige-login-logo-corner {
          width: 80px;
          top: 15px;
          left: 15px;
        }
        .mirsaige-login-info-container{
          display: none;
        }
        .mirsaige-login-form-container{
          padding: var(--mirsaige-space-md);
        }
      }
         @media (min-width: 1440px) {
        .mirsaige-login-logo-corner {
          width: 150px;
          top: 30px;
          left: 30px;
        }
         .mirsaige-login-wrapper {
          min-height: 450px;
          max-width: 1000px;
            margin-top: 100px;
        }
        
        .mirsaige-login-title {
          font-size: 2.25rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 2rem;
        }
      }
    </style>
  </head>
  <body class="mirsaige-forgot-password">
    <!-- Logo in top-left corner -->
    <img src="{{ asset('img/Logo_Transparent.webp') }}" alt="Mirsaige Logo" class="mirsaige-login-logo-corner">
    
    <div class="mirsaige-login-wrapper">
      <!-- Form Section -->
      <div class="mirsaige-login-form-container">
        <form class="mirsaige-login-form" action="{{ route('forget.password.post') }}" method="POST">
          @csrf
          <h2>Reset Password</h2>
          
          @if (Session::has('message'))
            <div class="mirsaige-message mirsaige-message-success">
              {{ Session::get('message') }}
            </div>
          @endif
          
          <div class="mirsaige-input-group">
            <input type="email" name="email" id="email_address" value="{{ old('email') }}" required />
            <label for="email_address">Email Address</label>
            <i class="bx bxs-envelope mirsaige-input-icon"></i>
          </div>
          
          @if ($errors->has('email'))
            <div class="mirsaige-message mirsaige-message-error">
              {{ $errors->first('email') }}
            </div>
          @endif
          
          <button type="submit" class="mirsaige-login-btn">Send Reset Link</button>
          
          <div class="mirsaige-login-links">
            <a href="{{ route('/') }}" class="mirsaige-login-link">Remember your password? <span class="mirsaige-login-link-accent">Sign In</span></a>
          </div>
        </form>
      </div>
      
      <!-- Info Section -->
      <div class="mirsaige-login-info-container">
        <div class="mirsaige-login-logo">Mirsaige</div>
        <h1 class="mirsaige-login-title"> </h1>
        <p class="mirsaige-login-subtitle">
          Hi, We are <span class="mirsaige-typing-text" id="mirsaige-typing-text"></span>
        </p>
        <p class="mirsaige-login-subtitle">
          Enter your email address and we'll send you a link to reset your password.
        </p>
      </div>
    </div>
    
     
    <script>
      // Responsive adjustments
      function handleResize() {
        const wrapper = document.querySelector('.mirsaige-login-wrapper');
        
        if (window.innerHeight < 600 && window.innerWidth > window.innerHeight) {
          // Landscape mode on small screens
          wrapper.style.minHeight = '100vh';
          wrapper.style.borderRadius = '0';
        } else {
          wrapper.style.minHeight = '';
          wrapper.style.borderRadius = '';
        }
      }
      
      window.addEventListener('resize', handleResize);
      handleResize(); // Initial check
        
      // Typing Animation
      const texts = [
        "Trusted Real Estate Company in Bangladesh",
        "Customized Construction Solutions",
        "Construction Project Planning Experts",
        "Quality Construction Management"
      ];
      
      const typingElement = document.getElementById('mirsaige-typing-text');
      const typingSpeed = 100;
      const erasingSpeed = 60;
      const delayBetweenTexts = 1000;
      
      let textIndex = 0;
      let charIndex = 0;
      let isDeleting = false;
      
      function type() {
        const currentText = texts[textIndex];
        
        if (isDeleting) {
          typingElement.textContent = currentText.substring(0, charIndex - 1);
          charIndex--;
        } else {
          typingElement.textContent = currentText.substring(0, charIndex + 1);
          charIndex++;
        }
        
        if (!isDeleting && charIndex === currentText.length) {
          isDeleting = true;
          setTimeout(type, delayBetweenTexts);
        } else if (isDeleting && charIndex === 0) {
          isDeleting = false;
          textIndex = (textIndex + 1) % texts.length;
          setTimeout(type, typingSpeed);
        } else {
          setTimeout(type, isDeleting ? erasingSpeed : typingSpeed);
        }
      }
      
      // Start typing animation
      setTimeout(type, 1000);
    </script>
  </body>
</html>