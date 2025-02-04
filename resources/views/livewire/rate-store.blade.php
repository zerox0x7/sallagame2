<div>
    <style>
        .custom-rating-box {
            background: linear-gradient(135deg, #1B2639, #111B2D); /* Main box background */
            border-radius: 20px;
            padding: 2rem;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
            color: white; /* Default text color */
        }

        .custom-rating-box.active {
            transform: translate(143%, 30%);
            opacity: 1;
        }

        .custom-store-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .custom-store-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .custom-store-info {
            flex-grow: 1;
        }

        .custom-store-name {
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.25rem;
        }

        .custom-store-link {
            color: #7d9fc2;
            font-size: 0.9rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .custom-store-link:hover {
            color: #a0bcd6;
        }

        .custom-rating-stars {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0;
        }

        .custom-star {
            color: #4a5568; /* Inactive star color */
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .custom-star.active {
            color: #ffd700;
        }

        .custom-submit-btn {
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

        .custom-submit-btn:hover {
            background: #374967;
            transform: translateY(-2px);
        }

        .custom-floating-btn {}

        .custom-floating-btn:hover {
            /* transform: scale(1.1) rotate(15deg); */
        }

        .custom-close-btn {
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

        .custom-close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>

    <div class="custom-rating-box" id="customRatingBox">
        <button class="custom-close-btn" onclick="toggleCustomRatingBox()">×</button>
        <div class="custom-store-header">
            <div class="custom-store-icon">
                <i class="fas fa-store fa-lg" style="color: #FFD700;"></i>
            </div>
            <div class="custom-store-info">
                <div class="custom-store-name">Tech Haven</div>
                <a href="https://your-store.com" class="custom-store-link" onclick="copyCustomLink(event)">
                    <span>tech-haven.com</span>
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>

        <div class="custom-rating-stars">
            <i class="fas fa-star custom-star active" data-value="1"></i>
            <i class="fas fa-star custom-star active" data-value="2"></i>
            <i class="fas fa-star custom-star active" data-value="3"></i>
            <i class="fas fa-star custom-star active" data-value="4"></i>
            <i class="fas fa-star custom-star active" data-value="5"></i>
        </div>

        <button class="custom-submit-btn" onclick="submitCustomRating()">Submit Rating</button>
    </div>

    <script defer >
        let customCurrentRating = 0;
        let isCustomBoxVisible = false;

        function toggleCustomRatingBox() {
            
            const box = document.querySelector('.customRatingBox');
            isCustomBoxVisible = !isCustomBoxVisible;
            box.classList.toggle('active');
        }

        function copyCustomLink(event) {
            event.preventDefault();
            navigator.clipboard.writeText('https://your-store.com');
            alert('Store link copied to clipboard!');
        }

        document.querySelectorAll('.custom-star').forEach(star => {
            star.addEventListener('click', (e) => {
                customCurrentRating = parseInt(e.target.dataset.value);
                document.querySelectorAll('.custom-star').forEach((s, index) => {
                    s.classList.toggle('active', index < customCurrentRating);
                });
            });
        });

        function submitCustomRating() {
            if (customCurrentRating === 0) {
                alert('Please select a rating');
                return;
            }

            alert(`Thank you for your ${customCurrentRating}-star rating!`);
            toggleCustomRatingBox();
            document.querySelectorAll('.custom-star').forEach(star => {
                star.classList.remove('active');
            });
            customCurrentRating = 0;
        }

        document.addEventListener('click', (event) => {
            const box = document.getElementById('customRatingBox');
            const btn = document.querySelector('.custom-floating-btn');

            if (
                box &&
                btn &&
                !box.contains(event.target) &&
                !btn.contains(event.target) &&
                isCustomBoxVisible
            ) {
                toggleCustomRatingBox();
            }
        });
    </script>
</div>