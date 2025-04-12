<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mei Blooms - @yield('title')</title>

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


    @yield('styles')
    <style>
        body {
            background-color: #fff0f5;
            /* Light pink like cherry blossom */
        }
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    {{-- 🔹 Particle Background --}}
    <div id="tsparticles" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"></div>

    @include('frontend.components.header')

    {{-- 🧱 Wrap main content properly --}}
    <div class="container mt-4">
        <main>
            @yield('content')
        </main>
    </div>

    @include('frontend.components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    {{-- 🔹 tsParticles Script --}}
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
    <script>
        tsParticles.load("tsparticles", {
            background: {
                color: {
                    value: "#fff0f5" // light pink
                }
            },
            fullScreen: {
                enable: false
            }, // don't take over entire screen
            fpsLimit: 60,
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        area: 800
                    }
                },
                shape: {
                    type: "image",
                    image: [{
                            src: "https://twemoji.maxcdn.com/v/latest/72x72/1f338.png", // 🌸
                            width: 48,
                            height: 48
                        },
                        {
                            src: "https://twemoji.maxcdn.com/v/latest/72x72/1f33c.png", // 🌼
                            width: 48,
                            height: 48
                        },
                        {
                            src: "https://twemoji.maxcdn.com/v/latest/72x72/1f337.png", // 🌷
                            width: 48,
                            height: 48
                        }
                    ]
                },
                opacity: {
                    value: 0.9,
                    random: true
                },
                size: {
                    value: 40,
                    random: {
                        enable: true,
                        minimumValue: 28
                    }
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: "top",
                    outModes: {
                        default: "out"
                    },
                    random: true
                }
            },
            detectRetina: true
        });
    </script>



    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.order-now-btn').forEach(button => {
            button.addEventListener('click', function () {
                const bouquetId = this.getAttribute('data-id');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/cart/add/${bouquetId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({}) // Required for some browsers to treat as POST
                }).then(response => {
                    if (response.ok) {
                        Swal.fire({
                            title: 'Added!',
                            text: 'Bouquet added to cart 💐',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Failed to add to cart.',
                            icon: 'error'
                        });
                    }
                }).catch(() => {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                });
            });
        });
    </script>




</body>


</html>
