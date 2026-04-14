<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MyPhysiqAl') }} - Confirmar contraseña</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config Override -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'display': ['Bebas Neue', 'cursive'],
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        .font-display {
            font-family: 'Bebas Neue', cursive;
            letter-spacing: 0.02em;
        }
        body {
            background-color: #010101;
            background-image: radial-gradient(circle at 25% 40%, rgba(200, 240, 60, 0.03) 0%, rgba(0,0,0,0) 70%);
            overflow-y: auto !important;
            overflow-x: hidden;
        }
        input {
            transition: all 0.2s ease;
        }
        input:focus {
            box-shadow: 0 0 0 2px rgba(200, 240, 60, 0.2);
        }
        html {
            overflow-y: auto !important;
            height: 100%;
        }
        body {
            min-height: 100%;
            height: auto;
        }
    </style>
</head>
<body class="relative py-12 px-4">

    <!-- Fondo con efecto muscular / neón -->
    <div class="fixed inset-0 bg-gradient-to-br from-black via-gray-950 to-black -z-10"></div>
    <div class="fixed top-0 right-0 w-96 h-96 bg-[#c8f03c]/5 rounded-full blur-3xl -z-10"></div>
    <div class="fixed bottom-0 left-0 w-80 h-80 bg-[#c8f03c]/5 rounded-full blur-3xl -z-10"></div>
    
    <!-- Patrón de fondo -->
    <div class="fixed inset-0 opacity-10 -z-10" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 800 800\"><path fill=\"none\" stroke=\"%23c8f03c\" stroke-width=\"1.5\" d=\"M300 150 L500 150 L500 350 L300 350 Z M150 400 L350 400 L350 600 L150 600 Z M500 500 L650 500 L650 700 L500 700 Z\"/><circle cx=\"400\" cy=\"400\" r=\"120\" stroke=\"%23c8f03c\" stroke-width=\"1\"/></svg>'); background-repeat: repeat; background-size: 180px;"></div>

    <!-- Contenedor principal -->
    <div class="relative z-10 max-w-md mx-auto w-full">
        
        <!-- Logo y branding -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 mb-2">
                <div class="w-10 h-10 rounded-full bg-[#c8f03c] flex items-center justify-center shadow-lg shadow-[#c8f03c]/20">
                    <span class="text-black font-black text-xl">⚡</span>
                </div>
                <span class="font-display text-3xl tracking-wider text-white">MYPHYSIQ<span class="text-[#c8f03c]">AL</span></span>
            </div>
            <p class="text-gray-400 text-sm">Área segura</p>
        </div>

        <!-- Formulario de confirmación -->
        <div class="bg-black/60 backdrop-blur-xl rounded-3xl border border-[#c8f03c]/30 shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-[#c8f03c]/5 to-transparent px-6 sm:px-8 py-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#c8f03c]/20 flex items-center justify-center">
                        <span class="text-[#c8f03c] text-xl">🔐</span>
                    </div>
                    <div>
                        <h2 class="font-display text-2xl text-white">Confirmación requerida</h2>
                        <p class="text-gray-400 text-sm mt-0.5">Verifica tu identidad para continuar</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="p-6 sm:p-8 space-y-6">
                @csrf

                <!-- Mensaje de seguridad -->
                <div class="bg-yellow-500/5 rounded-xl p-4 border border-yellow-500/20">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-yellow-500 text-sm">⚠️</span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-200 font-medium">Área de seguridad</p>
                            <p class="text-xs text-gray-400 mt-1">Esta es un área protegida de la aplicación. Por favor confirma tu contraseña antes de continuar.</p>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="flex items-center gap-1">🔒 Tu contraseña</span>
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 bg-gray-900/80 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#c8f03c] focus:ring-1 focus:ring-[#c8f03c] transition"
                        placeholder="Ingresa tu contraseña actual">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Información de seguridad adicional -->
                <div class="bg-[#c8f03c]/5 rounded-xl p-3 border border-[#c8f03c]/20">
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <svg class="w-4 h-4 text-[#c8f03c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span>Tu sesión expirará si no confirmas tu identidad</span>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ url()->previous() }}" 
                       class="flex-1 text-center px-6 py-3 border border-gray-700 rounded-xl text-gray-300 hover:bg-white/5 hover:border-[#c8f03c]/50 transition font-medium">
                        ← Cancelar
                    </a>
                    <button type="submit" 
                            class="flex-1 bg-[#c8f03c] hover:bg-[#b5dc32] text-black font-bold py-3 rounded-xl transition flex items-center justify-center gap-2 shadow-lg shadow-[#c8f03c]/20">
                        <span>✓ Confirmar identidad</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Enlace para recuperar contraseña (opcional) -->
                <div class="text-center pt-2">
                    <p class="text-xs text-gray-500">
                        ¿Olvidaste tu contraseña? 
                        <a href="{{ route('password.request') }}" class="text-[#c8f03c] hover:underline font-medium">Restablécelo aquí</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Texto de confianza -->
        <div class="text-center mt-6 text-xs text-gray-500 pb-8">
            <span class="flex items-center justify-center gap-1">
                <span>🛡️</span> Protegido con encriptación AES-256
                <span class="mx-1">•</span>
                <span>🔒 SSL Secure</span>
            </span>
        </div>
        
    </div>

</body>
</html>