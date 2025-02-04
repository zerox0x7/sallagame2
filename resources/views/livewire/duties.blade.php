
    <style>
     

    

        .duty-toggle {
            position: fixed;
            top: 90%;
            right: 16px;
           
            background-color: #334155; /* Golden yellow */
            color: #78350f; /* Deep golden */
            border: none;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, opacity 0.3s ease;
            z-index: 20;
            opacity: 1;
        }


        .duty-toggle .fa-tags {
                font-size: 32px;
                background: #BAF2E5; /* Gradient from orange to deep orange */
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
                transition: transform 0.3s ease;
                }


        .duty-toggle.hidden {
            display: none;
        }

        .duty-toggle:hover {
            transform: scale(1.1) rotate(15deg);
        }

        .duty-sidebar {
            position: fixed;
            right: -350px;
            top: 0;
            width: 350px;
            height: 100vh;
            background: linear-gradient(145deg, #1F2A40, #182234);
            border-left: 1px solid #2B3A5A;
            box-shadow: -5px 0 15px rgba(0,0,0,0.3);
            transition: right 0.3s ease;
            z-index: 999;
            display: flex;
            flex-direction: column;
        }

        .duty-sidebar.active {
            right: 0;
        }

        .sidebar-header {
            padding: 20px;
            background: #1A243D;
            border-bottom: 1px solid #2B3A5A;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .close-btn:hover {
            transform: rotate(90deg);
        }

        .category-tabs {
            display: flex;
            background: #1A243D;
            padding: 10px;
            gap: 5px;
        }

        .tab-btn {
            flex: 1;
            padding: 12px;
            border: none;
            background: #26304A;
            color: #6B7A9F;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tab-btn.active {
            background: linear-gradient(145deg, #4CAF50, #45A049);
            color: white;
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
        }

        .duty-list {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: linear-gradient(145deg, #1A243D, #182234);
        }

        .duty-category {
            display: none;
        }

        .duty-category.active {
            display: block;
            animation: slideIn 0.3s ease forwards;
        }

        .duty-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 18px;
            margin-bottom: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #2B3A5A;
        }

        .duty-item:hover {
            transform: translateX(8px);
            border-color: #4CAF50;
            background: rgba(76, 175, 80, 0.05);
        }

        .duty-icon {
            font-size: 1.4rem;
            width: 30px;
            text-align: center;
        }

        .duty-progress {
            margin-left: auto;
            width: 24px;
            height: 24px;
            border: 2px solid #4CAF50;
            border-radius: 50%;
            background: rgba(76, 175, 80, 0.1);
            cursor: pointer;
            position: relative;
        }

        .duty-progress.completed {
            background: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        .duty-progress.completed::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        /* Category Colors */
        .review-duty { color: #FFD700; }
        .share-duty { color: #FF6B6B; }
        .answer-duty { color: #00C1D4; }
        .qr-duty { color: #6EFBE6; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>

<button class="duty-toggle">
    <i class="fas fa-tags"></i>
</button>

<div class="duty-sidebar">
    <div class="sidebar-header">
        <h2>Game Missions</h2>
        <button class="close-btn">&times;</button>
    </div>
    
    <nav class="category-tabs">
        <button class="tab-btn active" data-category="reviews">
            <i class="fas fa-star review-duty"></i>
        </button>
        <button class="tab-btn" data-category="share">
            <i class="fas fa-share-alt share-duty"></i>
        </button>
        <button class="tab-btn" data-category="answer">
            <i class="fas fa-question-circle answer-duty"></i>
        </button>
        <button class="tab-btn" data-category="qr">
            <i class="fas fa-qrcode qr-duty"></i>
        </button>
    </nav>

    <div class="duty-list">
        <!-- Reviews Category -->
        <div class="duty-category active" data-category="reviews">
            <div class="duty-item floating-btn customRatingBox"  onclick="toggleCustomRatingBox()">
                <i class="fas fa-store review-duty duty-icon"></i>
                <span>Review 5 different stores</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-thumbs-up review-duty duty-icon"></i>
                <span>Like 10 store products</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-comment-dots review-duty duty-icon"></i>
                <span>Write 3 detailed reviews</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-award review-duty duty-icon"></i>
                <span>Rate a premium store</span>
                <div class="duty-progress"></div>
            </div>
        </div>

        <!-- Share Category -->
        <div class="duty-category" data-category="share">
            
            <div class="duty-item toggle-btn-share2"  onclick="toggleStoreBox()" >
                <i class="fas fa-link share-duty duty-icon"></i>
                <span>Share store link 3 times</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item " >
                <i class="fas fa-users share-duty duty-icon"></i>
                <span>Invite 5 friends</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item"> 
                <i class="fa-brands fa-tiktok share-duty duty-icon"></i>
                <span>Social media share</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fa-brands fa-whatsapp share-duty duty-icon"></i>
                <span>Create referral link</span>
                <div class="duty-progress"></div>
            </div>
        </div>

        <!-- Questions Category -->
        <div class="duty-category" data-category="answer">
            <div class="duty-item">
                <i class="fas fa-lightbulb answer-duty duty-icon"></i>
                <span>Daily question</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-puzzle-piece answer-duty duty-icon"></i>
                <span>Weekly puzzle</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-brain answer-duty duty-icon"></i>
                <span>Trivia challenge</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-trophy answer-duty duty-icon"></i>
                <span>Daily challenge</span>
                <div class="duty-progress"></div>
            </div>
        </div>

        <!-- QR Hunt Category -->
        <div class="duty-category" data-category="qr">
            <div class="duty-item">
                <i class="fas fa-search qr-duty duty-icon"></i>
                <span>Find hidden QR</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-map-marker-alt qr-duty duty-icon"></i>
                <span>Scan 3 markers</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-camera qr-duty duty-icon"></i>
                <span>Capture AR code</span>
                <div class="duty-progress"></div>
            </div>
            <div class="duty-item">
                <i class="fas fa-medal qr-duty duty-icon"></i>
                <span>Collect all QR</span>
                <div class="duty-progress"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.querySelector('.duty-toggle');
    const sidebar = document.querySelector('.duty-sidebar');
    const closeBtn = document.querySelector('.close-btn');

    // Toggle sidebar
    const toggleSidebar = (state) => {
        sidebar.classList.toggle('active', state);
        toggleBtn.classList.toggle('hidden', state);
    };

    // Event listeners
    toggleBtn.addEventListener('click', (e) => {
        toggleSidebar(true);
        e.stopPropagation();
    });

    closeBtn.addEventListener('click', () => toggleSidebar(false));

    // Click outside
    document.addEventListener('click', (e) => {
        if (sidebar.classList.contains('active') && 
            !sidebar.contains(e.target) && 
            !toggleBtn.contains(e.target)) {
            toggleSidebar(false);
        }
    });

    // Tab switching
    const tabs = document.querySelectorAll('.tab-btn');
    const categories = document.querySelectorAll('.duty-category');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            categories.forEach(c => c.classList.remove('active'));
            
            const category = tab.dataset.category;
            tab.classList.add('active');
            document.querySelector(`.duty-category[data-category="${category}"]`)
                .classList.add('active');
        });
    });

    // Duty completion
    document.querySelectorAll('.duty-progress').forEach(progress => {
        progress.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('completed');
        });
    });

    // Initialize first tab
    tabs[0].click();
});
</script>
