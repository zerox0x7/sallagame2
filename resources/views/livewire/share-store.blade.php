
    <style>
        
    
        .toggle-btn-share {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .toggle-btn-share:hover {
            background: #45A049;
            transform: translateY(-2px);
        }

        .store-box {
            position: fixed;
            /* bottom: 50%;
            right: 50%; */
            /* transform: translate(-50%, calc(-50% + 20px)); */
            background: linear-gradient(145deg, #1F2A40, #182234);
            border-radius: 15px;
            width: 300px;
            padding: 1.5rem;
            border: 1px solid #2B3A5A;
            transform: translateY(20px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .store-box.visible {
            /* transform: translateY(0); */
            transform: translate(143%, 30%);
            opacity: 1;
            visibility: visible;
        }

        .store-image {
            height: 200px;
            border-radius: 10px;
            margin-bottom: 1rem;
            background-image: url('https://images.unsplash.com/photo-1607083206869-4c7672e72a8a');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .store-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.7));
            border-radius: 10px;
        }

        .link-box {
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .store-link {
            flex: 1;
            color: #6EFBE6;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 0.9rem;
        }

        .copy-btn {
            background: #4CAF50;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: #45A049;
        }

        .copied-tooltip {
            position: absolute;
            top: -30px;
            right: 0;
            background: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .copied-tooltip.show {
            opacity: 1;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>

    {{-- <button class="toggle-btn-share" onclick="toggleStoreBox()">Special Offer 🔥</button> --}}

    <div class="store-box">
        {{-- <button class="close-btn" onclick="toggleStoreBox()">×</button> --}}
        <div class="store-image"></div>
        <div class="link-box">
            <span class="store-link">https://exclusive-store.com/special-offer</span>
            <button class="copy-btn" onclick="copyLink(this)">
                <i class="fas fa-copy"></i>
            </button>
            <div class="copied-tooltip">Copied!</div>
        </div>
    </div>

    <script  >
        function toggleStoreBox() {
            const storeBox = document.querySelector('.store-box');
            storeBox.classList.toggle('visible');
        }

        function copyLink(button) {
            const link = button.previousElementSibling.textContent;
            const tooltip = button.nextElementSibling;
            
            navigator.clipboard.writeText(link).then(() => {
                tooltip.classList.add('show');
                setTimeout(() => {
                    tooltip.classList.remove('show');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy text:', err);
            });
        }

        // Close when clicking outside
        document.addEventListener('click', (event) => {
            const storeBox = document.querySelector('.store-box');
            const toggleBtn = document.querySelector('.toggle-btn-share2');
            
            if (!storeBox.contains(event.target) && 
                !toggleBtn.contains(event.target) &&
                storeBox.classList.contains('visible')) {
                toggleStoreBox();
            }
        });
    </script>
