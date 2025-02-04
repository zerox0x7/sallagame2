
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <title>Salla Store Game</title>

</head>
<body>
 
  @livewire('share-store')
  <div class="container">
    <!-- Header -->
    <header class="center">
      <h1 class="h1">
        <img class="salla_icon" width="50" height="50" src="{{asset('assets/images/salla.jpg')}}" alt="">
        Salla Store Game
      </h1>
      <p>Support your favorite store's team and help them win the battle!</p>
    </header>

    <!-- Scoreboard -->
    <div class="scoreboard">
      <div>
        <img class="store_img" src="https://img.freepik.com/free-photo/view-building-with-cartoon-style-architecture_23-2151154881.jpg" alt="">
        <h2 class="store_title">
          <div class="store_left">
            <img class="store_left_icon" width="50" src="https://img.freepik.com/free-photo/view-building-with-cartoon-style-architecture_23-2151154912.jpg" alt="">
            store1
          </div>
        </h2>
        <span id="score1">0</span>
      </div>

      <div class="vs">VS</div>

      <div>
        <span id="score2">0</span>
        <h2 class="store_title">
          <div class="store_right">
            <img class="store_right_icon" width="50" src="https://img.freepik.com/free-photo/view-building-with-cartoon-style-architecture_23-2151154912.jpg" alt="">
            store2
          </div>
        </h2>
        <img class="store_img" src="https://img.freepik.com/free-photo/view-building-with-cartoon-style-architecture_23-2151154912.jpg" alt="">
      </div>
    </div>

    <!-- Stores Section -->
    <div class="stores">
      <!-- Left Team -->
      <div class="team team-left">
        <!-- Player 1 -->
        <div class="player-card">
          <div class="player-image">
            <img class="avatar" src="https://votesout.com/img/avatars/avatar-normal-15.png" alt="">
          </div>
          <div class="player-info">
            <div class="stat-item">
              <i class="fas fa-star"></i>
              <span>4.8</span>
            </div>
            <div class="stat-item">
              <i class="fa-solid fa-q"></i>
              <span>12</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-share"></i>
              <span>24</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-qrcode"></i>
              <span>5</span> <!-- Added number for QR code -->
            </div>
          </div>
        </div>
        <!-- Repeat for Players 2-6 -->
      </div>

      <!-- VS Icon -->
      <div class="vs-icon">VS</div>

      <!-- Right Team -->
      <div class="team team-right">
        <!-- Player 1 -->
        <div class="player-card">
          <div class="player-image">
            <img class="avatar" src="https://votesout.com/img/avatars/avatar-normal-8.png" alt="">
          </div>
          <div class="player-info">
            <div class="stat-item">
              <i class="fas fa-star"></i>
              <span>4.8</span>
            </div>
            <div class="stat-item">
              <i class="fa-solid fa-q"></i>
              <span>12</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-share"></i>
              <span>24</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-qrcode"></i>
              <span>5</span> <!-- Added number for QR code -->
            </div>
          </div>
        </div>
        <div class="player-card">
          <div class="player-image">
            <img  class="avatar" src="https://votesout.com/img/avatars/avatar-robot-1.png" alt="">
          </div>
          <div class="player-info">
            <div class="stat-item">
              <i class="fas fa-star"></i>
              <span>4.8</span>
            </div>
            <div class="stat-item">
              <i class="fa-solid fa-q"></i>
              <span>12</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-share"></i>
              <span>24</span>
            </div>
            <div class="stat-item">
              <i class="fas fa-qrcode"></i>
              <span>5</span> <!-- Added number for QR code -->
            </div>
          </div>
        </div>
        <!-- Repeat for Players 2-6 -->
      </div>
    </div>
  </div>




  <div class="golden_overlay" id="golden_overlay"></div>

  <!-- Golden Cup Button -->
  <button class="golden_button" id="golden_button">
    <!-- Golden Cup Icon from Flaticon -->
    <i class="fas fa-gift"></i>


    <!-- Stars Effect -->
    <div class="golden_star"></div>
    <div class="golden_star"></div>
    <div class="golden_star"></div>
  </button>

  <!-- Sidebar -->
  <div class="golden_sidebar" id="golden_sidebar">
    <!-- Exit Icon -->
    <i class="fas fa-times golden_exit-icon" id="golden_exitIcon"></i>
    <h1 class="s_sidebar_title">hi here is the title</h1>
    <!-- Sidebar Content (Empty) -->
  </div>

  @livewire('duties')
 

  @livewire('rate-store')


  
 

  <script>





    let score1 = 0;
    let score2 = 0;

    function cheerForTeam(team) {
      if (team === 1) {
        score1++;
        document.getElementById('score1').textContent = score1;
      } else if (team === 2) {
        score2++;
        document.getElementById('score2').textContent = score2;
      }
    }


    const card = document.querySelector('.player-card');
    const avatar = document.querySelector('.avatar');

    // Add a click event listener to the card
    card.addEventListener('click', () => {
      // Toggle the width and transform properties
      if (avatar.style.width === '100%') {
        avatar.style.width = '120%';
        avatar.style.transform = 'translate(10px, 10px)';
      } else {
        avatar.style.width = '100%';
        avatar.style.transform = 'translate(0, 0)';
      }
    });



       // Get references to elements
       const goldenButton = document.getElementById("golden_button");
    const goldenSidebar = document.getElementById("golden_sidebar");
    const goldenOverlay = document.getElementById("golden_overlay");
    const goldenExitIcon = document.getElementById("golden_exitIcon");

    // Function to open the sidebar
    const openSidebar = () => {
      goldenSidebar.classList.add("open");
      goldenOverlay.classList.add("active");
      goldenButton.classList.add("hidden"); // Hide the button
    };

    // Function to close the sidebar
    const closeSidebar = () => {
      goldenSidebar.classList.remove("open");
      goldenOverlay.classList.remove("active");
      goldenButton.classList.remove("hidden"); // Show the button again
    };

    // Event listeners
    goldenButton.addEventListener("click", openSidebar);
    goldenOverlay.addEventListener("click", closeSidebar);
    goldenExitIcon.addEventListener("click", closeSidebar);



      // duty button
      const goldenButton2 = document.getElementById("golden_button2");
    const goldenSidebar2 = document.getElementById("golden_sidebar2");
    const golden_overlay2 = document.getElementById("golden_overlay2");
    // const goldenExitIcon = document.getElementById("golden_exitIcon2");

    // Function to open the sidebar
    const openSidebar2 = () => {
      goldenSidebar2.classList.add("open");
      goldenOverlay2.classList.add("active");
      goldenButton2.classList.add("hidden"); // Hide the button
    };

    // Function to close the sidebar
    const closeSidebar2 = () => {
      goldenSidebar2.classList.remove("open");
      goldenOverlay2.classList.remove("active");
      goldenButton2.classList.remove("hidden"); // Show the button again
    };

    // Event listeners
    goldenButton2.addEventListener("click", openSidebar2);
    goldenOverlay2.addEventListener("click", closeSidebar2);
    // goldenExitIcon2.addEventListener("click", closeSidebar);
      // end duty button
  </script>
</body>
</html>