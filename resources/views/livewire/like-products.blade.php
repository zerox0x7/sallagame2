<div>
    <style>
      .likePro-custom-product-box {
        background: linear-gradient(135deg, #1b2639, #111b2d);
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

      .likePro-custom-product-box.active {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
        display: block;
      }

      .likePro-custom-store-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .likePro-custom-store-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      }

      .likePro-custom-store-info {
        flex-grow: 1;
      }

      .likePro-custom-store-name {
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.25rem;
      }

      .likePro-custom-store-link {
        color: #7d9fc2;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
      }

      .likePro-custom-store-link:hover {
        color: #a0bcd6;
      }

      .likePro-custom-submit-btn {
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

      .likePro-custom-submit-btn:hover {
        background: #374967;
        transform: translateY(-2px);
      }

      .likePro-custom-close-btn {
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

      .likePro-custom-close-btn:hover {
        background: rgba(255, 255, 255, 0.2);
      }
    </style>

    <!-- Button to trigger the product popup -->
    <!-- <button
      style="position: fixed; top: 1rem; left: 1rem; padding: 0.5rem 1rem; border: none; border-radius: 8px; background: #2c3a58; color: white; cursor: pointer;"
      onclick="likePro_toggleProductBox()"
    >
      Open Product Store
    </button> -->

    <!-- likePro Product Store Popup Container -->
    <div class="likePro-custom-product-box" id="likepro_productBox">
      <button class="likePro-custom-close-btn" onclick="likePro_toggleProductBox()">×</button>
      <div class="likePro-custom-store-header">
        <div class="likePro-custom-store-icon">
          <!-- Store Icon -->
          <i class="fas fa-shopping-bag fa-lg" style="color: #ff6f61;"></i>
        </div>
        <div class="likePro-custom-store-info">
          <div class="likePro-custom-store-name">Welcome to likePro Store</div>
          <a
            href="https://likepro-store.com"
            class="likePro-custom-store-link"
            onclick="likePro_copyStoreLink(event)"
          >
            <span>likepro-store.com</span>
            <i class="fas fa-external-link-alt"></i>
          </a>
        </div>
      </div>

      <p style="text-align: center; margin: 1rem 0;">
        Discover our exclusive collection and latest offers.
      </p>

      <button class="likePro-custom-submit-btn" onclick="likePro_submitProduct()">
        Shop Now
      </button>
    </div>

    <script>
      window.likePro_toggleProductBox = function () {
        const box = document.getElementById("likepro_productBox");
        if (!box) return;
        box.classList.toggle("active");
      };

      function likePro_copyStoreLink(event) {
        event.preventDefault();
        navigator.clipboard.writeText("https://likepro-store.com");
        alert("Store link copied to clipboard!");
      }

      function likePro_submitProduct() {
        alert("Enjoy shopping at likePro Store!");
        likePro_toggleProductBox();
      }

      // Close the popup when clicking outside of it
      document.addEventListener("click", function (event) {
        const box = document.getElementById("likepro_productBox");
        if (!box) return;
        if (
          box.classList.contains("active") &&
          !box.contains(event.target) &&
          !event.target.matches('[onclick="likePro_toggleProductBox()"]')
        ) {
          box.classList.remove("active");
        }
      });
    </script>
</div>