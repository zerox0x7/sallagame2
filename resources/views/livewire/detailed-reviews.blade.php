<div>
    <style>
      .likePro-custom-review-box {
        background: linear-gradient(135deg, #1b2639, #111b2d);
        border-radius: 20px;
        padding: 2rem;
        width: 400px;
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

      .likePro-custom-review-box.active {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
        display: block;
      }

      .likePro-custom-review-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .likePro-custom-review-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      }

      .likePro-custom-review-info {
        flex-grow: 1;
      }

      .likePro-custom-review-title {
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.25rem;
        font-size: 1.2rem;
      }

      .likePro-custom-review-link {
        color: #7d9fc2;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
      }

      .likePro-custom-review-link:hover {
        color: #a0bcd6;
      }

      .likePro-custom-info-text {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 1rem;
      }

      .likePro-custom-submit-btn {
        background: #2c3a58;
        color: white;
        padding: 0.8rem;
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
 
    <!-- Button to trigger the review popup -->
    <!-- <button
      style="position: fixed; top: 1rem; left: 1rem; padding: 0.5rem 1rem; border: none; border-radius: 8px; background: #2c3a58; color: white; cursor: pointer;"
      onclick="likePro_toggleReviewBox()"
    >
      Write a Review
    </button> -->

    <!-- likePro Review Popup Container -->
    <div class="likePro-custom-review-box" id="likepro_reviewBox">
      <button class="likePro-custom-close-btn" onclick="likePro_toggleReviewBox()">×</button>
      <div class="likePro-custom-review-header">
        <div class="likePro-custom-review-icon">
          <i class="fas fa-pen-nib fa-lg" style="color: #ff6f61;"></i>
        </div>
        <div class="likePro-custom-review-info">
          <div class="likePro-custom-review-title">Express Your Experience</div>
          <a
            href="https://likepro-store.com/reviews"
            class="likePro-custom-review-link"
            onclick="likePro_copyReviewLink(event)"
          >
            <span>likepro-store.com/reviews</span>
            <i class="fas fa-external-link-alt"></i>
          </a>
        </div>
      </div>

      <div class="likePro-custom-info-text">
        Click the button below to head over to our review page and share your detailed experience.
      </div>
      
      <button class="likePro-custom-submit-btn" onclick="likePro_navigateToReview()">
        Go to Review Page
      </button>
    </div>

    <script>
      window.likePro_toggleReviewBox = function () {
        const box = document.getElementById("likepro_reviewBox");
        if (!box) return;
        box.classList.toggle("active");
      };

      function likePro_copyReviewLink(event) {
        event.preventDefault();
        navigator.clipboard.writeText("https://likepro-store.com/reviews");
        alert("Review page link copied to clipboard!");
      }

      function likePro_navigateToReview() {
        window.location.href = "https://likepro-store.com/reviews";
      }

      // Close the popup when clicking outside of it
      document.addEventListener("click", function (event) {
        const box = document.getElementById("likepro_reviewBox");
        if (!box) return;
        if (
          box.classList.contains("active") &&
          !box.contains(event.target) &&
          !event.target.matches('[onclick="likePro_toggleReviewBox()"]')
        ) {
          box.classList.remove("active");
        }
      });
    </script>
</div>