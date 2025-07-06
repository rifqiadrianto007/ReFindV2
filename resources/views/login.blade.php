<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReFind - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.cdnfonts.com/css/nexa" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/nexa');

        body {
            font-family: 'Nexa', sans-serif;
        }

        .bg-pattern {
            background-image: url("{{ asset('img/bg-login.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body class="bg-pattern"
    style="min-height: 100vh; position: relative; overflow: hidden; font-family: 'Nexa', sans-serif;">

    <!-- Logo di pojok kanan atas -->
    <div
        style="position: absolute; top: 1rem; right: 1rem; z-index: 20; display: flex; align-items: center; gap: 0.5rem;">
        <img src="{{ asset('img/logo semua.png') }}" alt="logo kemendikbud" style="width: 40px; height: 40px;">
    </div>

    <!-- Main Content -->
    <div
        style="position: relative; z-index: 10; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 0 1rem;">
        <div
            style="width: 100%; max-width: 72rem; display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: center;">

            <!-- Login Form Section -->
            <div style="order: 2;">
                <div
                    style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 1.5rem; padding: 2rem; width: 100%; max-width: 28rem; margin: 0 auto;">
                    <div style="margin-bottom: 2rem;">
                        <h1
                            style="color: white; font-size: 2.25rem; font-weight: 700; margin-bottom: 0.5rem; font-family: 'Nexa', sans-serif;">
                            ReFind.</h1>
                    </div>

                    <form style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <!-- Username Field -->
                        <div>
                            <label for="username"
                                style="display: block; color: white; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; font-family: 'Nexa', sans-serif;">Username</label>
                            <input type="text" id="username" name="username" placeholder="Masukkan username"
                                style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; color: white; font-family: 'Nexa', sans-serif; outline: none; transition: all 0.3s ease;"
                                onfocus="this.style.background='rgba(255, 255, 255, 0.15)'; this.style.borderColor='rgba(255, 255, 255, 0.4)'; this.style.boxShadow='0 0 0 2px rgba(255, 255, 255, 0.1)';"
                                onblur="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.boxShadow='none';"
                                required>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password"
                                style="display: block; color: white; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; font-family: 'Nexa', sans-serif;">Password</label>
                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; color: white; font-family: 'Nexa', sans-serif; outline: none; transition: all 0.3s ease;"
                                onfocus="this.style.background='rgba(255, 255, 255, 0.15)'; this.style.borderColor='rgba(255, 255, 255, 0.4)'; this.style.boxShadow='0 0 0 2px rgba(255, 255, 255, 0.1)';"
                                onblur="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.boxShadow='none';"
                                required>
                        </div>

                        <!-- Login Button -->
                        <div style="padding-top: 1rem;">
                            <button type="submit"
                                style="background: linear-gradient(135deg, #000000 0%, #1f2937 100%); width: 100%; padding: 0.75rem 1.5rem; border-radius: 0.75rem; color: white; font-weight: 600; font-family: 'Nexa', sans-serif; outline: none; border: none; cursor: pointer; transition: all 0.3s ease;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.3)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quote Section -->
            <div style="order: 1; text-align: center;">
                <div style="position: relative;">
                    <div>
                        <h2
                            style="color: white; font-size: 3rem; font-weight: 700; line-height: 1.2; margin-bottom: 1.5rem; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); font-family: 'Nexa', sans-serif;">
                            "Temukan dan laporkan barang hilang dengan mudah"
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Responsive Styles -->
    <style>
        @media (min-width: 1024px) {
            .main-container {
                grid-template-columns: 1fr 1fr;
            }

            .login-section {
                order: 1;
            }

            .quote-section {
                order: 2;
                text-align: left;
            }

            .quote-text {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 768px) {
            .quote-text {
                font-size: 2rem;
            }
        }
    </style>

    <script>
        // Apply responsive classes
        document.addEventListener('DOMContentLoaded', function() {
            const mainContainer = document.querySelector('[style*="display: grid"]');
            const loginSection = document.querySelector('[style*="order: 2"]');
            const quoteSection = document.querySelector('[style*="order: 1"]');
            const quoteText = document.querySelector('[style*="font-size: 3rem"]');

            function applyResponsiveStyles() {
                if (window.innerWidth >= 1024) {
                    mainContainer.style.gridTemplateColumns = '1fr 1fr';
                    loginSection.style.order = '1';
                    quoteSection.style.order = '2';
                    quoteSection.style.textAlign = 'left';
                    quoteText.style.fontSize = '3.5rem';
                } else {
                    mainContainer.style.gridTemplateColumns = '1fr';
                    loginSection.style.order = '2';
                    quoteSection.style.order = '1';
                    quoteSection.style.textAlign = 'center';

                    if (window.innerWidth <= 768) {
                        quoteText.style.fontSize = '2rem';
                    } else {
                        quoteText.style.fontSize = '3rem';
                    }
                }
            }

            applyResponsiveStyles();
            window.addEventListener('resize', applyResponsiveStyles);
        });
    </script>
</body>

</html>
