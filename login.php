<?php include 'header.php'; ?>
<!-- Include Font Awesome for eye icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $email = $conn->real_escape_string($_POST['email']);
  $res = $conn->query("SELECT * FROM users WHERE email='$email' LIMIT 1");
  if($res && $res->num_rows){
    $user = $res->fetch_assoc();
    if(password_verify($_POST['password'], $user['password'])){
      $_SESSION['user'] = array(
        'id'=>$user['id'],
        'name'=>$user['name'],
        'email'=>$user['email'],
        'role'=>$user['role']
      );
      $redirect = $user['role']=='admin' ? 'admin/dashboard.php' : 'dashboard.php';
      
      echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: 'Redirecting...',
                timer: 1500,
                showConfirmButton: false
              }).then(() => {
                window.location.href='$redirect';
              });
            </script>";
      exit;
    } else {
      $error = "Invalid credentials";
    }
  } else {
    $error = "User not found";
  }
}
?>

<div class="login-container">
  <div class="login-card">
    <h3>Login</h3>
    <form method="post">
      <div class="form-group">
        <label><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group password-group">
        <label><i class="fa-solid fa-lock"></i> Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>
      <button type="submit">Login</button>
      <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
  </div>
</div>

<?php
if(isset($error)){
  echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '$error',
          });
        </script>";
}
?>

<style>
/* Login Page Container */
.login-container {
  min-height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #0b0f19, #141828);
  padding: 40px 20px;
}

/* Login Card */
.login-card {
  background: rgba(0, 212, 255, 0.1);
  backdrop-filter: blur(15px);
  border-radius: 20px;
  padding: 50px 30px;
  width: 380px;
  max-width: 95%;
  text-align: center;
  transition: transform 0.4s;
}

.login-card:hover { transform: translateY(-10px); }

.login-card h3 {
  color: #00d4ff;
  font-size: 2rem;
  margin-bottom: 30px;
}

.form-group {
  display: flex;
  flex-direction: column;
  text-align: left;
  margin-bottom: 20px;
  position: relative;
}

.form-group label {
  margin-bottom: 8px;
  color: #c0eaff;
  font-weight: 500;
}

.form-group input {
  padding: 12px 40px 12px 15px; /* space for eye icon */
  border-radius: 12px;
  border: none;
  outline: none;
  background: rgba(255,255,255,0.05);
  color: white;
  font-size: 1rem;
  transition: background 0.3s, box-shadow 0.3s;
}

.form-group input:focus {
  background: rgba(0,212,255,0.15);
  box-shadow: 0 0 10px rgba(0,212,255,0.5);
}

/* Password Toggle */
.password-group .toggle-password {
  position: absolute;
  right: 15px;
  top: 47px;
  cursor: pointer;
  color: #00d4ff;
  font-size: 1.1rem;
}

/* Button */
button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 50px;
  background: linear-gradient(135deg,#00d4ff,#007bff);
  color: white;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

button:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(0,212,255,0.6);
}

.signup-link {
  margin-top: 20px;
  color: #c0eaff;
  font-size: 0.95rem;
}

.signup-link a {
  color: #00d4ff;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.signup-link a:hover { color: #007bff; }

@media(max-width: 500px){
  .login-card { padding: 40px 20px; }
  .login-card h3 { font-size: 1.6rem; }
}
</style>

<script>
// Toggle password visibility
function togglePassword(){
  const pwd = document.getElementById('password');
  const icon = document.querySelector('.toggle-password');
  if(pwd.type === 'password'){
    pwd.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    pwd.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}
</script>

<?php include 'footer.php'; ?>
