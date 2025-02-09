<div>

<style>
      .tiktok-custom-subscribe-box {
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
        color: white;
        z-index: 1000;
        display: none;
      }

      .tiktok-custom-subscribe-box.active {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
        display: block;
      }

      .tiktok-custom-store-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .tiktok-custom-store-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      }

      .tiktok-custom-store-info {
        flex-grow: 1;
      }

      .tiktok-custom-store-name {
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.25rem;
      }

      .tiktok-custom-store-link {
        color: #7d9fc2;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
      }

      .tiktok-custom-store-link:hover {
        color: #a0bcd6;
      }

      .tiktok-custom-submit-btn {
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

      .tiktok-custom-submit-btn:hover {
        background: #374967;
        transform: translateY(-2px);
      }

      .tiktok-custom-close-btn {
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

      .tiktok-custom-close-btn:hover {
        background: rgba(255, 255, 255, 0.2);
      }
    </style>
  </head>
  <body>
    <!-- External button to trigger the subscribe popup -->
   

    <!-- TikTok Subscribe Popup Container -->
    <div class="tiktok-custom-subscribe-box" id="tiktok_subscribeBox">
      <button class="tiktok-custom-close-btn" onclick="tiktok_toggleSubscribeBox()">×</button>
      <div class="tiktok-custom-store-header">
        <div class="tiktok-custom-store-icon">
          <!-- TikTok official icon -->
          <i class="fab fa-tiktok fa-lg" style="color: #69C9D0;"></i>
        </div>
        <div class="tiktok-custom-store-info">
          <div class="tiktok-custom-store-name">Subscribe on TikTok</div>
          <a
            href="https://tiktok-store.com"
            class="tiktok-custom-store-link"
            onclick="tiktok_copySubscribeLink(event)"
          >
            <span>tiktok-store.com</span>
            <i class="fas fa-external-link-alt"></i>
          </a>
        </div>
      </div>

      <p style="text-align: center; margin: 1rem 0;">
        Stay updated with our latest products and offers on TikTok.
      </p>

      <button class="tiktok-custom-submit-btn" onclick="tiktok_submitSubscribe()">
        Subscribe Now
      </button>
    </div>

    <script defer>
      window.tiktok_toggleSubscribeBox = function () {
        const box = document.getElementById("tiktok_subscribeBox");
        if (!box) return;

        box.classList.toggle("active");
      };

      function tiktok_copySubscribeLink(event) {
        event.preventDefault();
        navigator.clipboard.writeText("https://tiktok-store.com");
        alert("TikTok store link copied to clipboard!");
      }

      function tiktok_submitSubscribe() {
        alert("Thank you for subscribing to our TikTok store!");
        tiktok_toggleSubscribeBox();
      }

      // Close the popup when clicking outside of it.
      document.addEventListener("click", function (event) {
        const box = document.getElementById("tiktok_subscribeBox");
        if (!box) return;

        if (
          box.classList.contains("active") &&
          !box.contains(event.target) &&
          !event.target.matches('[onclick="tiktok_toggleSubscribeBox()"]')
        ) {
          box.classList.remove("active");
        }
      });
    </script>
</div>
