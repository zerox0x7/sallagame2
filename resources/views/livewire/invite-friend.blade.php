<div>
    <style>
      .rami-custom-rating-box {
        background: linear-gradient(135deg, #1B2639, #111B2D); /* Main box background */
        border-radius: 20px;
        padding: 2rem;
        width: 350px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        opacity: 0;
        transition: all 0.3s ease;
        color: white; /* Default text color */
        z-index: 1000;
        display: none;
      }

      .rami-custom-rating-box.active {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
        display: block;
      }

      .rami-custom-store-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .rami-custom-store-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      }

      .rami-custom-store-info {
        flex-grow: 1;
      }

      .rami-custom-store-name {
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.25rem;
      }

      .rami-custom-store-link {
        color: #7d9fc2;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
      }

      .rami-custom-store-link:hover {
        color: #a0bcd6;
      }

      /* Changed section: Instead of rating stars we now show invite icons */
      .rami-custom-invite-icons {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin: 2rem 0;
      }
      .rami-custom-invite-icon {
        color: #4a5568; /* Not-invited state */
        font-size: 2rem;
        cursor: pointer;
        transition: all 0.2s ease;
      }
      .rami-custom-invite-icon.active {
        color: #34d399; /* Active (invited) state, green */
      }

      .rami-custom-submit-btn {
        background: #2c3a58;
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 12px;
        width: 100%;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .rami-custom-submit-btn:hover {
        background: #374967;
        transform: translateY(-2px);
      }

      .rami-custom-close-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #a0aec0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .rami-custom-close-btn:hover {
        background: rgba(255, 255, 255, 0.2);
      }
    </style>
  </head>
  <body>
    <!-- External button to control the popup -->
    <!-- <button id="rami_inviteFriendsBtn" onclick="rami_toggleInviteFriendsBox()">
      Open Invite Box
    </button> -->

    <!-- Invite Friends Popup Container -->
    <div class="rami-custom-rating-box" id="rami_inviteFriendsBox">
      <button class="rami-custom-close-btn" onclick="rami_toggleInviteFriendsBox()">×</button>
      <div class="rami-custom-store-header">
        <div class="rami-custom-store-icon">
          <!-- Changed icon: from store to a groups icon -->
          <i class="fas fa-users fa-lg" style="color: #FFD700;"></i>
        </div>
        <div class="rami-custom-store-info">
          <!-- Changed title for inviting friends -->
          <div class="rami-custom-store-name">Invite Friends</div>
          <a href="https://your-game-link.com" class="rami-custom-store-link" onclick="rami_copyInviteFriendsLink(event)">
            <span>your-game-link.com</span>
            <i class="fas fa-external-link-alt"></i>
          </a>
        </div>
      </div>

      <!-- Invitation icons for 5 friend invites -->
      <div class="rami-custom-invite-icons">
        <i class="fas fa-user-plus rami-custom-invite-icon" data-invite="1"></i>
        <i class="fas fa-user-plus rami-custom-invite-icon" data-invite="2"></i>
        <i class="fas fa-user-plus rami-custom-invite-icon" data-invite="3"></i>
        <i class="fas fa-user-plus rami-custom-invite-icon" data-invite="4"></i>
        <i class="fas fa-user-plus rami-custom-invite-icon" data-invite="5"></i>
      </div>

      <!-- Changed submit button -->
      <button class="rami-custom-submit-btn" onclick="rami_submitInviteFriends()">
        Send Invites
      </button>
    </div>

    <script defer>
      let rami_inviteCount = 0;

      window.rami_toggleInviteFriendsBox = function() {
        const box = document.getElementById('rami_inviteFriendsBox');
        if (!box) return;
        box.classList.toggle('active');
      };

      function rami_copyInviteFriendsLink(event) {
        event.preventDefault();
        navigator.clipboard.writeText('https://your-game-link.com');
        alert('Game link copied to clipboard!');
      }

      document.querySelectorAll('.rami-custom-invite-icon').forEach(icon => {
        icon.addEventListener('click', (e) => {
          // When clicked, toggle the active state.
          // In a real implementation you might launch an email prompt or a share dialog.
          e.target.classList.toggle('active');
          // Recount the total active invites
          rami_inviteCount = document.querySelectorAll('.rami-custom-invite-icon.active').length;
        });
      });

      function rami_submitInviteFriends() {
        if (rami_inviteCount === 0) {
          alert('Please select at least one friend to invite.');
          return;
        }
        alert(`Invitations sent to ${rami_inviteCount} friend${rami_inviteCount > 1 ? 's' : ''}!`);
        rami_toggleInviteFriendsBox();
        // Reset the icons' active state
        document.querySelectorAll('.rami-custom-invite-icon').forEach(icon => {
          icon.classList.remove('active');
        });
        rami_inviteCount = 0;
      }

      // Close the popup when clicking outside it.
      document.addEventListener('click', function(event) {
        const box = document.getElementById('rami_inviteFriendsBox');
        if (!box) return;
        if (
          box.classList.contains('active') &&
          !box.contains(event.target) &&
          !event.target.matches('[onclick="rami_toggleInviteFriendsBox()"]')
        ) {
          box.classList.remove('active');
        }
      });
    </script>
</div>