<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Login to your Mirsaige account to access premium construction project management services, consultancy, and customized solutions in Bangladesh.">
    <meta name="keywords" content="Mirsaige PMC login, construction management login, project consultancy Bangladesh, building solutions login, construction experts Bangladesh">
    <meta name="author" content="Mirsaige Construction Consultants">
    <meta property="og:title" content="Login | Mirsaige PMC : Project Management Consultancy">
    <meta property="og:description" content="Access your Mirsaige account for premium construction project management services in Bangladesh.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mirsaige-bd.com/login">
    <link rel="icon" href="{{ asset('img/Logo_Transparent.webp') }}" />
    <title>Mirsaige PMC - log in or sign up | Trusted Real Estate Company in Bangladesh</title>
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
        --mirsaige-space-xl: 68px;
        --mirsaige-space-2xl: 74px;
        --mirsaige-space-3xl: 80px;
      }
      
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      
      body.mirsaige-login {
        position: relative;
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
          url("{{ asset('img/MIRSAIGE-LOGIN-BACKGROUND.png') }}") no-repeat center center fixed;
        background-size: cover;
        color: var(--mirsaige-light);
        font-family: var(--mirsaige-font-text);
        padding: var(--mirsaige-space-sm);
        background-position:0 15% ;     }
      
      /* Logo in top-left corner - Responsive */
      .mirsaige-login-logo-corner {
        position: fixed;
        top: var(--mirsaige-space-sm);
        left: var(--mirsaige-space-lg);

        width: 120px;
        height: auto;
        z-index: 1000;
        transition: all 0.3s ease;
      }
      
      /* Main Wrapper */
      .mirsaige-login-wrapper {
        position: absolute;
        width: 100%;
        max-width: 1000px;
        min-height: 500px;
        
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 178, 62, 0.2);
        display: flex;
        flex-direction: row;
        margin: var(--mirsaige-space-md) 0;
      }
      
      /* Form Container */
      .mirsaige-login-form-container {
        width: 100%;
        padding: var(--mirsaige-space-xl);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 2;
        background-color: rgba(0, 0, 0, 0);
      }
      
      /* Info Container */
      .mirsaige-login-info-container {
        width: 100%;
        padding: var(--mirsaige-space-xl);
        background: #020617;
        border-left: 1px solid rgba(255, 178, 62, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0);
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
        font-size: 3rem;
        margin-bottom: var(--mirsaige-space-xl);
        color: var(--mirsaige-gold);
        text-shadow: 0 0 12px rgba(221, 153, 51, 0.4);
        position: relative;
      }
      
      .mirsaige-login-title {
        font-family: var(--mirsaige-font-primary);
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: var(--mirsaige-space-md);
        color: var(--mirsaige-white);
        line-height: 1.3;
      }
      
      .mirsaige-login-subtitle {
        font-family: var(--mirsaige-font-text);
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        margin-bottom: var(--mirsaige-space-xl);
        max-width: 90%;
        line-height: 1.5;
      }
      
      /* Form Elements */
      .mirsaige-login-form {
        width: 100%;
        max-width: 400px;
      }
      
      .mirsaige-login-form h2 {
        font-family: var(--mirsaige-font-primary);
        font-weight: 700;
        font-size: 1.5rem;
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
        transition: all 0.3s ease;
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
        transition: all 0.3s ease;
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
        transition: all 0.3s ease;
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
        transition: all 0.3s ease;
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
        transition: all 0.3s ease;
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
        display: inline-block;
        margin-bottom: var(--mirsaige-space-xs);
        font-family: var(--mirsaige-font-text);
        transition: all 0.2s ease;
        position: relative;
      }
      
      .mirsaige-login-link:hover {
        color: var(--mirsaige-accent);
      }
      
      .mirsaige-login-link::after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 1px;
        bottom: -2px;
        left: 0;
        background-color: var(--mirsaige-accent);
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
      }
      
      .mirsaige-login-link:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
      }
      
      .mirsaige-login-link-accent {
        color: var(--mirsaige-accent);
        font-weight: 600;
      }
      
      /* Typing Animation */
      .mirsaige-typing-text {
        color: var(--mirsaige-gold);
        font-weight: 600;
        min-height: 60px;
        display: inline-block;
        font-family: var(--mirsaige-font-text);
      }
      
      /* Remember Me Checkbox */
      .mirsaige-remember-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: var(--mirsaige-space-md);
        width: 100%;
      }
      
      .mirsaige-remember-me {
        display: flex;
        align-items: center;
      }
      
      .mirsaige-remember-me input {
        appearance: none;
        -webkit-appearance: none;
        width: 16px;
        height: 16px;
        border: 1px solid var(--mirsaige-medium-gray);
        border-radius: 3px;
        margin-right: var(--mirsaige-space-xs);
        position: relative;
        cursor: pointer;
        transition: all 0.2s ease;
      }
      
      .mirsaige-remember-me input:checked {
        background-color: var(--mirsaige-accent);
        border-color: var(--mirsaige-accent);
      }
      
      .mirsaige-remember-me input:checked::after {
        content: '\2713';
        position: absolute;
        color: var(--mirsaige-dark);
        font-size: 10px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      
      .mirsaige-remember-me label {
        color: var(--mirsaige-text);
        font-size: 0.875rem;
        font-family: var(--mirsaige-font-text);
        cursor: pointer;
      }
      
      .mirsaige-remember-me input:hover {
        border-color: var(--mirsaige-accent);
      }
      
/* Remove autofill background and text color */
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
    -webkit-text-fill-color: var(--mirsaige-white) !important;
    transition: background-color 5000s ease-in-out 0s;
    caret-color: var(--mirsaige-white);
}

/* For Firefox */
input:-moz-autofill,
input:-moz-autofill:hover,
input:-moz-autofill:focus {
    filter: none;
    background: transparent !important;
    color: var(--mirsaige-white) !important;
}
      
      /* ================= RESPONSIVE STYLES ================= */
      /* iPhone SE / small phones (320px-375px) */
      @media (max-width: 375px) {
        .mirsaige-login-logo-corner {
          width: 60px;
        }
        
        .mirsaige-login-wrapper {
          min-height: auto;
          margin-top: 100px;
          max-width: 240px;
          position: absolute;
        }
        
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-xs);
        }
        .mirsaige-login-info-container{
          display: none;
        }
        .mirsaige-login-title {
          font-size: 1.5rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 1.35rem;
        }
        
        .mirsaige-login-logo {
          font-size: 1.75rem;
        }
        
        .mirsaige-login-subtitle {
          font-size: 0.85rem;
          max-width: 100%;
        }
        
        .mirsaige-input-group {
          margin-bottom: var(--mirsaige-space-md);
        }
        
        .mirsaige-remember-container {
          flex-direction: column;
          align-items: flex-start;
          gap: var(--mirsaige-space-xs);
        }
      }
      
      /* iPhone XR, 12, 13, 14, etc. (376px-430px) */
      @media (min-width: 376px) and (max-width: 430px) {
        .mirsaige-login-logo-corner {
          width: 60px;

        }
       
        .mirsaige-login-wrapper {
          min-height: auto;
          margin-top: 300px;
          max-width: 280px;
         
        }
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-xs);
        }
        .mirsaige-login-form h2 {
          font-size: 1.35rem;
        }
        .mirsaige-login-info-container{
          display: none;
        }
        
        .mirsaige-remember-container {
          flex-direction: column;
          align-items: flex-start;
          gap: var(--mirsaige-space-xs);
        }
      }
      
      /* Extra small devices (phones, portrait) (up to 575px) */
      @media (max-width: 575.98px) {
        body.mirsaige-login {
          padding: var(--mirsaige-space-xs);
        }
        .mirsaige-login-logo-corner {
          width: 60px;

        }
        .mirsaige-login-wrapper {
          max-width: 370px;
          margin-top: var(--mirsaige-space-3xl);
          position: absolute;

        }
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-md);
        }
        .mirsaige-login-form h2 {
          font-size: 1.5rem;
        }
        .mirsaige-login-info-container{
          display: none;
        }
      }
      
      /* Small devices (phones landscape and small tablets) (576px-767px) */
      @media (min-width: 576px) and (max-width: 767.98px) {
         body.mirsaige-login {
          padding: var(--mirsaige-space-xs);
        }
        .mirsaige-login-logo-corner {
          width: 60px;
         
        }
        
        .mirsaige-login-wrapper {
          min-height: 380px;
          max-width: 350px;
          margin-top: 55px;
          position: absolute;

        }
        
        .mirsaige-login-title {
          font-size: 1.8rem;
        }
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-md);
        }
        .mirsaige-login-info-container{
          display: none;
        }
        .mirsaige-login-form h2 {
          font-size: 1.6rem;
        }
      }
      
      /* Medium devices (tablets, portrait) (768px-991px) */
      @media (min-width: 768px) and (max-width: 991.98px) {
        .mirsaige-login-wrapper {
          flex-direction: row;
          min-height: 500px;
          max-width: 500px;
          position: absolute;
        }
        
        .mirsaige-login-form-container{

          padding: var(--mirsaige-space-md);
        }
        .mirsaige-login-info-container{
          display: none;
        }
        
        .mirsaige-login-logo-corner {
          width: 90px;
          top: var(--mirsaige-space-lg);
          left: var(--mirsaige-space-lg);
        }
        
        .mirsaige-login-title {
          font-size: 2rem;
        }
      }
      
      /* iPad (Portrait) */
      @media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
        .mirsaige-login-wrapper {
          min-height: 750px;
          max-width: 750px;
          position: absolute;
        }
        .mirsaige-login-form-container{

          padding: var(--mirsaige-space-md);
        }
        .mirsaige-login-logo-corner {
          width: 70px;
          
        }
        .mirsaige-login-subtitle {
          max-width: 80%;
        }
        .mirsaige-login-info-container{
          display: none;
        }
      }
      
      /* iPad (Landscape) */
      @media (min-width: 1024px) and (max-width: 1366px) and (orientation: landscape) {
        .mirsaige-login-wrapper {
          max-width: 900px;
          position: absolute;
        }
        .mirsaige-login-form-container{

          padding: var(--mirsaige-space-md);
        }
        .mirsaige-login-logo-corner {
          width: 80px;
          
        }
      }
      
      /* Large devices (tablets landscape / small desktops) (992px-1199px) */
      @media (min-width: 992px) and (max-width: 1199.98px) {
        .mirsaige-login-wrapper {
          margin-top: 70px;
          max-width: 750px;
          min-height: 400px;
          position: absolute;
          
        }
        .mirsaige-login-logo-corner {
          width: 70px;
          margin: 0;
          
        }
        .mirsaige-login-form-container {
          padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-login-title {
          font-size: 2.25rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 1.75rem;
        }
      }
      
      /* Extra large devices (desktops, laptops) (1200px-1399px) */
      @media (min-width: 1200px) and (max-width: 1399.98px) {
        .mirsaige-login-wrapper {
          max-width: 800px;
          min-height: 450px;
          position: absolute;
        }
        
        .mirsaige-login-logo-corner {
          width: 100px;
          top: var(--mirsaige-space-md);
          left: var(--mirsaige-space-md);
        }
      }
      
      /* Extra extra large devices (large desktops, 4K+) (1400px and up) */
      @media (min-width: 1400px) {
        .mirsaige-login-wrapper {
          max-width: 1000px;
          min-height: 400px;
          position: absolute;
        }
        
        .mirsaige-login-title {
          font-size: 2rem;
        }
        
        .mirsaige-login-form h2 {
          font-size: 2rem;
        }
         .mirsaige-login-logo-corner {
          width: 100px;
          top: var(--mirsaige-space-md);
          left: var(--mirsaige-space-md);
        }
        .mirsaige-login-subtitle {
          font-size: 1.1rem;
        }
      }
      
      /* Landscape orientation adjustments */
      @media (max-height: 600px) and (orientation: landscape) {
        .mirsaige-login-wrapper {
          min-height: 100vh;
          border-radius: 0;
          margin: 0;
          position: absolute;
        }
        
        .mirsaige-login-logo-corner {
          width: 70px;
          top: var(--mirsaige-space-sm);
          left: var(--mirsaige-space-sm);
        }
        
        .mirsaige-login-form-container,
        .mirsaige-login-info-container {
          padding: var(--mirsaige-space-md);
        }
        
        .mirsaige-login-title {
          font-size: 1.5rem;
          margin-bottom: var(--mirsaige-space-sm);
        }
        
        .mirsaige-login-subtitle {
          margin-bottom: var(--mirsaige-space-md);
          font-size: 0.85rem;
        }
      }
    </style>
  </head>
  <body class="mirsaige-login">
    <!-- Logo in top-left corner -->
    <img src="{{ asset('img/Logo_Transparent.webp') }}" alt="Mirsaige Logo" class="mirsaige-login-logo-corner">
    
    <div class="mirsaige-login-wrapper">
      <!-- Login Form Section -->
      <div class="mirsaige-login-form-container">
        <form class="mirsaige-login-form" action="{{route('login')}}" method="POST">
          @csrf
          <h2>Welcome Back</h2>
          
          <div class="mirsaige-input-group">
            <input type="text" name="username" value="{{old('username')}}" id="username" required />
            <label for="username">Username or Email</label>
            <i class="bx bxs-user mirsaige-input-icon"></i>
          </div>
          
          <div class="mirsaige-input-group">
            <input type="password" name="password" id="password" required />
            <label for="password">Password</label>
            <i class="bx bxs-lock-alt mirsaige-input-icon" id="password-toggle"></i>
          </div>
          
          <button type="submit" class="mirsaige-login-btn">Login</button>
          
          <div class="mirsaige-remember-container">
            <div class="mirsaige-remember-me">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Remember me</label>
            </div>
            
            <a href="{{ route('forget.password.get') }}" class="mirsaige-login-link">Reset Password?</a>
          </div>
          
          <div class="mirsaige-login-links">
            <a href="#" class="mirsaige-login-link">Don't have an account? <span class="mirsaige-login-link-accent">Sign Up</span></a>
          </div>
        </form>
      </div>
      
      <!-- Info Section -->
      <div class="mirsaige-login-info-container">
        <div class="mirsaige-login-logo">Mirsaige</div>
        <h1 class="mirsaige-login-title">Construction Excellence</h1>
        <p class="mirsaige-login-subtitle">
          Hi, We are <span class="mirsaige-typing-text" id="mirsaige-typing-text"></span>
        </p>
      </div>
    </div>

    <script>
      // Password Toggle
      const passwordInput = document.getElementById('password');
      const passwordToggle = document.getElementById('password-toggle');
      
      passwordToggle.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          passwordToggle.classList.remove('bxs-lock-alt');
          passwordToggle.classList.add('bxs-lock-open');
        } else {
          passwordInput.type = 'password';
          passwordToggle.classList.remove('bxs-lock-open');
          passwordToggle.classList.add('bxs-lock-alt');
        }
      });
      
      // Remember Me functionality
      document.addEventListener('DOMContentLoaded', function() {
        const rememberCheckbox = document.getElementById('remember');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        
        // Check if there are saved credentials
        if (localStorage.getItem('rememberMe') === 'true') {
          rememberCheckbox.checked = true;
          usernameInput.value = localStorage.getItem('username') || '';
          passwordInput.value = localStorage.getItem('password') || '';
        }
        
        // Save credentials when form is submitted
        document.querySelector('.mirsaige-login-form').addEventListener('submit', function() {
          if (rememberCheckbox.checked) {
            localStorage.setItem('rememberMe', 'true');
            localStorage.setItem('username', usernameInput.value);
            localStorage.setItem('password', passwordInput.value);
          } else {
            localStorage.removeItem('rememberMe');
            localStorage.removeItem('username');
            localStorage.removeItem('password');
          }
        });
      });
      
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
    </script>
  </body>
</html>