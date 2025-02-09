<div>
    <style>
        .whatsapp-custom-join-box {
            background: linear-gradient(135deg, #075E54, #128C7E); /* WhatsApp's signature green gradient */
            border-radius: 20px;
            padding: 2rem;
            width: 350px;
            box-shadow: 0 10px 30px rgba(7, 94, 84, 0.3);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55); /* Bouncy effect */
            color: white;
            z-index: 1000;
            display: none;
        }

        .whatsapp-custom-join-box.active {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
            display: block;
        }

        .whatsapp-custom-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .whatsapp-custom-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        .whatsapp-custom-info {
            flex-grow: 1;
        }

        .whatsapp-custom-title {
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.25rem;
            font-size: 1.2rem;
        }

        .whatsapp-custom-link {
            color: #E9EEF4;
            font-size: 0.9rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .whatsapp-custom-link:hover {
            opacity: 1;
            transform: translateX(3px);
        }

        .whatsapp-custom-submit-btn {
            background: #25D366; /* WhatsApp's bright green */
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .whatsapp-custom-submit-btn:hover {
            background: #22C55E;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-custom-close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #fff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .whatsapp-custom-close-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: rotate(90deg);
        }

        .whatsapp-description {
            text-align: center;
            margin: 1rem 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            line-height: 1.5;
        }
    </style>

    <!-- WhatsApp Join Popup Container -->
    <div class="whatsapp-custom-join-box" id="whatsapp_joinBox">
        <button class="whatsapp-custom-close-btn" onclick="whatsapp_toggleJoinBox()">×</button>
        <div class="whatsapp-custom-header">
            <div class="whatsapp-custom-icon">
                <i class="fab fa-whatsapp fa-lg" style="color: #fff;"></i>
            </div>
            <div class="whatsapp-custom-info">
                <div class="whatsapp-custom-title">Join Our WhatsApp Group</div>
                <a href="#" class="whatsapp-custom-link" onclick="whatsapp_copyJoinLink(event)">
                    <span>Click to copy invite link</span>
                    <i class="fas fa-link"></i>
                </a>
            </div>
        </div>

        <p class="whatsapp-description">
            Join our exclusive WhatsApp community to receive instant updates, special offers, and connect with other members!
        </p>

        <button class="whatsapp-custom-submit-btn" onclick="whatsapp_submitJoin()">
            <i class="fab fa-whatsapp"></i>
            Join Group Now
        </button>
    </div>

    <script defer>
        window.whatsapp_toggleJoinBox = function() {
            const box = document.getElementById("whatsapp_joinBox");
            if (!box) return;
            box.classList.toggle("active");
        };

        function whatsapp_copyJoinLink(event) {
            event.preventDefault();
            navigator.clipboard.writeText("https://chat.whatsapp.com/invite-link");
            // Create a temporary element for the success message
            const msg = document.createElement('div');
            msg.style.position = 'fixed';
            msg.style.bottom = '20px';
            msg.style.left = '50%';
            msg.style.transform = 'translateX(-50%)';
            msg.style.background = '#25D366';
            msg.style.color = 'white';
            msg.style.padding = '10px 20px';
            msg.style.borderRadius = '8px';
            msg.style.zIndex = '9999';
            msg.textContent = 'WhatsApp invite link copied!';
            document.body.appendChild(msg);
            
            // Remove the message after 2 seconds
            setTimeout(() => {
                msg.remove();
            }, 2000);
        }

        function whatsapp_submitJoin() {
            window.open('https://chat.whatsapp.com/invite-link', '_blank');
            whatsapp_toggleJoinBox();
        }

        // Close the popup when clicking outside
        document.addEventListener("click", function(event) {
            const box = document.getElementById("whatsapp_joinBox");
            if (!box) return;

            if (box.classList.contains("active") && 
                !box.contains(event.target) && 
                !event.target.matches('[onclick="whatsapp_toggleJoinBox()"]')) {
                box.classList.remove("active");
            }
        });
    </script>
</div>
