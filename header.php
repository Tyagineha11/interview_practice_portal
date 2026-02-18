<!-- Favicon -->
<link rel="icon" type="image/png" href="assets/image/logop.png">

<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Interview Portal</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    /* ===== GLOBAL RESET ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    html, body {
      width: 100%;
      min-height: 100%;
      background: #0b0f19;
      color: #fff;
      scroll-behavior: smooth;
    }

    a { text-decoration: none; color: inherit; }
    img { max-width: 100%; display: block; height: auto; }

    /* ===== HEADER ===== */
    header {
      width: 100%;
      position: fixed; /* Sticky fix */
      top: 0;
      left: 0;
      z-index: 9999;
      background: rgba(15, 15, 25, 0.85);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
      box-shadow: 0 2px 15px rgba(0,0,0,0.3);
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 60px;
    }

    .logo {
      display: flex;
      align-items: center;
      font-size: 1.6rem;
      font-weight: 600;
      letter-spacing: 1px;
      color: #fff;
    }

    .logo span {
      color: #00d4ff;
      background: rgba(255,255,255,0.1);
      padding: 5px 10px;
      border-radius: 8px;
      margin-left: 5px;
    }

    ul.nav-links {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 25px;
    }

    ul.nav-links li a {
      font-weight: 500;
      font-size: 16px;
      position: relative;
      transition: 0.3s;
    }

    ul.nav-links li a::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      background: #00d4ff;
      left: 0;
      bottom: -5px;
      transition: 0.3s;
    }

    ul.nav-links li a:hover::after {
      width: 100%;
    }

    .nav-btn a {
      padding: 8px 18px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .login-btn {
      border: 2px solid #00d4ff;
      color: #00d4ff;
    }

    .login-btn:hover {
      background: #00d4ff;
      color: #0b0f19;
      box-shadow: 0 0 15px rgba(0,212,255,0.6);
    }

    .signup-btn {
      background: linear-gradient(135deg,#00d4ff,#007bff);
      color: #fff;
      border: none;
    }

    .signup-btn:hover {
      background: linear-gradient(135deg,#007bff,#00d4ff);
      box-shadow: 0 0 15px rgba(0,212,255,0.8);
      transform: translateY(-1px);
    }

    /* Hamburger */
    .menu-btn {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
    }

    .menu-btn div {
      width: 25px;
      height: 3px;
      background: white;
      transition: 0.3s;
    }

    @media(max-width:900px){
      .navbar { padding: 15px 25px; }
      ul.nav-links {
        position: fixed;
        top: 70px;
        right: -100%;
        width: 60%;
        height: 100vh;
        background: rgba(15,15,25,0.95);
        backdrop-filter: blur(15px);
        flex-direction: column;
        gap: 40px;
        justify-content: center;
        align-items: center;
        transition: 0.5s ease;
      }
      ul.nav-links.active { right: 0; }
      .menu-btn { display: flex; }
    }

    .menu-btn.open div:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
    .menu-btn.open div:nth-child(2) { opacity: 0; }
    .menu-btn.open div:nth-child(3) { transform: rotate(-45deg) translate(6px,-6px); }

    /* ===== BODY PADDING ===== */
    body {
      padding-top: 80px; /* Add padding equal to header height */
    }
  </style>
</head>
<body>

<header>
  <nav class="navbar">
    <a href="index.php"><div class="logo"><img src="assets/image/logop.png" style="width: 44px;"> &nbsp;Interview <span>Portal</span></div></a>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="feature.php">Features</a></li>

      <?php if(isset($_SESSION['user'])): ?>
        <li><a href="dashboard.php">Hi, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></a></li>
        <li class="nav-btn"><a href="logout.php" class="signup-btn">Logout</a></li>
      <?php else: ?>
        <li class="nav-btn"><a href="login.php" class="login-btn">Login</a></li>
        <li class="nav-btn"><a href="signup.php" class="signup-btn">Sign Up</a></li>
      <?php endif; ?>

    </ul>

    <div class="menu-btn" id="menuBtn">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </nav>
</header>

<script>
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.getElementById('navLinks');
  menuBtn.addEventListener('click', ()=>{
    navLinks.classList.toggle('active');
    menuBtn.classList.toggle('open');
  });
</script>