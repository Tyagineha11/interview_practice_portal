<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
      <h2>Candidate Panel</h2>
    </div>
    <ul class="sidebar-menu">
      <?php
        $current_page = basename($_SERVER['PHP_SELF']); // gets current file name

        $menu_items = [
            "dashboard.php" => "Dashboard",
            "profile.php" => "Profile",
            "my_interviews.php" => "Popular Interviews",
            "score.php" => "Score",
            "tutorial.php" => "Tutorial",
            "logout.php" => "Logout"
        ];

        foreach($menu_items as $file => $title){
            $active = ($current_page == $file) ? "active" : "";
            echo "<li><a href='$file' class='$active'>$title</a></li>";
        }
      ?>
    </ul>
</aside>

<style>
.sidebar {
  width: 260px;
  background: #1a1f36;
  color: #fff;
  padding: 20px;
  flex-shrink: 0;
  box-shadow: 5px 0 20px rgba(0,0,0,0.3);
  display: flex;
  flex-direction: column;
  transition: all 0.3s ease;
}

.sidebar-header {
  text-align: center;
  margin-bottom: 30px;
}

.sidebar-header h2 {
  font-size: 1.5rem;
  color: #00d4ff;
  margin: 0;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  flex-grow: 1;
}

.sidebar-menu li {
  margin-bottom: 15px;
}

.sidebar-menu a {
  text-decoration: none;
  color: #fff;
  padding: 12px 15px;
  display: block;
  border-radius: 10px;
  transition: all 0.3s ease;
}

.sidebar-menu a:hover,
.sidebar-menu a.active {
  background: #00d4ff;
  color: #1a1f36;
  box-shadow: 0 4px 12px rgba(0,212,255,0.3);
}

@media (max-width: 900px) {
  .sidebar {
    width: 100%;
    flex-direction: row;
    overflow-x: auto;
    padding: 10px;
  }
  .sidebar-header {
    display: none;
  }
  .sidebar-menu {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }
  .sidebar-menu li {
    margin-bottom: 0;
  }
  .sidebar-menu a {
    padding: 10px 12px;
    white-space: nowrap;
  }
}
</style>
