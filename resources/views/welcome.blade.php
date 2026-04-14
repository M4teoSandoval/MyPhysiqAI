<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>MyPhysiqAl — IA Body recomposition</title>
    <!-- Google Fonts + Bebas Neue -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Tailwind + base styles (no Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for reactive/dynamic components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Custom config overrides -->
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
        }
        .neon-glow {
            box-shadow: 0 0 12px rgba(200, 240, 60, 0.3), 0 0 4px rgba(200, 240, 60, 0.5);
        }
        .border-neon {
            border-color: rgba(200, 240, 60, 0.4);
        }
        .card-glass {
            background: rgba(10, 10, 12, 0.75);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(200, 240, 60, 0.2);
        }
        .gradient-muscle {
            background: linear-gradient(135deg, #0b0b0f 0%, #141418 100%);
        }
        ::selection {
            background: #c8f03c;
            color: #000;
        }
        /* scrollbar custom */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0f0f12;
        }
        ::-webkit-scrollbar-thumb {
            background: #c8f03c;
            border-radius: 8px;
        }
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px -15px rgba(0,0,0,0.5);
        }
        .hero-pattern {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" opacity="0.15"><path fill="none" stroke="%23c8f03c" stroke-width="1.2" d="M400 100 L500 200 L400 300 L300 200 Z M200 400 L350 500 L200 600 L50 500 Z M600 500 L700 580 L600 680 L500 580 Z"/><circle cx="400" cy="400" r="80" stroke="%23c8f03c" stroke-width="1" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right top;
            background-size: 600px;
        }
        @media (max-width: 768px) {
            .hero-pattern {
                background-size: 300px;
            }
        }
    </style>
</head>
<body class="text-white antialiased">

    <!-- Dynamic Alpine store for future state (demo interaction) -->
    <div x-data="appStore()" x-init="init()" class="relative min-h-screen flex flex-col overflow-x-hidden">
        
        <!-- ========== NAVBAR (oscuro, minimalista + neón) ========== -->
        <nav class="w-full sticky top-0 z-50 bg-black/80 backdrop-blur-xl border-b border-white/10">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 py-4 flex items-center justify-between">
                <!-- Logo BYB. -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-[#c8f03c] flex items-center justify-center shadow-md">
                        <span class="text-black font-black text-xl">⚡</span>
                    </div>
                    <span class="font-display text-2xl tracking-wider text-white">MYPHYSIQ<span class="text-[#c8f03c]">AL</span></span>
                </div>

                <!-- Desktop Links -->
                <div class="hidden md:flex items-center gap-7 text-sm font-medium text-gray-300">
                    <a href="#" class="hover:text-[#c8f03c] transition">Inicio</a>
                    <a href="#" class="hover:text-[#c8f03c] transition">Plataforma IA</a>
                    <a href="#" class="hover:text-[#c8f03c] transition">Rutinas</a>
                    <a href="#" class="hover:text-[#c8f03c] transition">Nutrición</a>
                    <a href="#" class="hover:text-[#c8f03c] transition">Dashboard</a>
                </div>

                <!-- Login / Register (sistema preparado) -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-block px-5 py-2 text-sm font-semibold border border-white/20 rounded-full hover:bg-white/5 transition">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-bold bg-[#c8f03c] text-black rounded-full shadow-md hover:bg-[#b0dc2a] transition flex items-center gap-1">
                        <span>Empieza ahora</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </nav>

        <!-- ========== HERO SECTION (concepto musculado + tecnológico) ========== -->
        <section class="relative flex flex-col lg:flex-row items-center justify-between max-w-7xl mx-auto px-5 lg:px-8 py-12 md:py-20 gap-12 hero-pattern">
            <div class="flex-1 text-center lg:text-left z-10">
                <div class="inline-block mb-4 px-3 py-1 rounded-full bg-[#c8f03c]/10 border border-[#c8f03c]/30 text-[#c8f03c] text-xs font-bold uppercase tracking-wider">
                    🔥 IA de recomposición corporal
                </div>
                <h1 class="font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl leading-[1.1] tracking-tighter text-white">
                    Build your body <br>
                    with <span class="text-[#c8f03c] underline decoration-[#c8f03c]/40">intelligence</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto lg:mx-0 mt-6 leading-relaxed">
                    Entrena con IA, alimentación predictiva y tracking diario. 
                    Objetivos reales, datos reales, resultados reales.
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start mt-8">
                    <a href="#" class="px-8 py-4 bg-[#c8f03c] text-black font-bold rounded-xl shadow-2xl flex items-center gap-2 hover:scale-105 transition duration-200">
                        🧠 Probar demo IA
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#" class="px-8 py-4 border border-[#c8f03c]/50 text-white font-medium rounded-xl hover:bg-[#c8f03c]/10 transition">Ver cómo funciona</a>
                </div>
                <div class="flex flex-wrap gap-6 mt-12 text-sm text-gray-400 justify-center lg:justify-start">
                    <div class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Planes personalizados por IA</div>
                    <div class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Menú semanal + calorías</div>
                    <div class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Tracking gym / agua / pasos</div>
                </div>
            </div>
            <!-- representación visual futurista "musculado tecnológico" -->
            <div class="flex-1 flex justify-center lg:justify-end">
                <div class="relative w-full max-w-md lg:max-w-lg">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[#c8f03c]/20 to-transparent blur-3xl rounded-full"></div>
                    <div class="relative bg-gradient-to-br from-gray-900/80 to-black/90 rounded-3xl border border-[#c8f03c]/30 p-1 backdrop-blur-sm">
                        <div class="bg-black/60 rounded-2xl p-6 flex flex-col gap-4">
                            <div class="flex justify-between items-center border-b border-white/10 pb-3">
                                <span class="font-display text-xl text-[#c8f03c]">MyPhysiq<span class="text-white">AI</span></span>
                                <span class="text-[10px] px-2 py-0.5 bg-[#c8f03c]/20 text-[#c8f03c] rounded-full">LIVE SYNC</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gray-900/50 rounded-xl p-3">
                                    <div class="text-[10px] text-gray-400">GASTO HOY</div>
                                    <div class="text-2xl font-bold text-white">2,340 <span class="text-xs">kcal</span></div>
                                </div>
                                <div class="bg-gray-900/50 rounded-xl p-3">
                                    <div class="text-[10px] text-gray-400">PROTEÍNA</div>
                                    <div class="text-2xl font-bold text-white">158<span class="text-xs">g</span></div>
                                </div>
                                <div class="bg-gray-900/50 rounded-xl p-3">
                                    <div class="text-[10px] text-gray-400">AGUA 💧</div>
                                    <div class="text-2xl font-bold text-white">3.2<span class="text-xs">L</span></div>
                                </div>
                                <div class="bg-gray-900/50 rounded-xl p-3">
                                    <div class="text-[10px] text-gray-400">RUTINA</div>
                                    <div class="text-sm font-bold text-[#c8f03c]">PUSH DAY ✅</div>
                                </div>
                            </div>
                            <div class="h-12 bg-gray-800/50 rounded-full flex items-center px-3 text-xs text-gray-300">
                                <span class="flex-1">🎯 Objetivo: recomposición + ganancia magra</span>
                                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== FEATURES: inteligencia + datos + tracking (4 bloques) ========== -->
        <section class="max-w-7xl mx-auto px-5 py-16 md:py-24">
            <div class="text-center mb-14">
                <span class="text-[#c8f03c] uppercase tracking-widest text-sm font-bold">Sistema completo</span>
                <h2 class="font-display text-4xl md:text-5xl mt-2">Tu ecosistema <span class="text-[#c8f03c]">inteligente</span> de cambio físico</h2>
                <div class="w-24 h-1 bg-[#c8f03c] mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card-glass rounded-2xl p-6 hover-lift transition-all">
                    <div class="w-12 h-12 rounded-xl bg-[#c8f03c]/20 flex items-center justify-center mb-4"><span class="text-2xl">🧠</span></div>
                    <h3 class="text-xl font-bold mb-2">IA conectada</h3>
                    <p class="text-gray-400 text-sm">OpenAI integrada para recomendaciones, menús automáticos y ajustes en tiempo real según tu progreso.</p>
                </div>
                <div class="card-glass rounded-2xl p-6 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-[#c8f03c]/20 flex items-center justify-center mb-4"><span class="text-2xl">📊</span></div>
                    <h3 class="text-xl font-bold mb-2">Datos personales + objetivo</h3>
                    <p class="text-gray-400 text-sm">Peso, altura, % grasa, objetivo (volumen/definición/recomposición) — todo guardado por usuario.</p>
                </div>
                <div class="card-glass rounded-2xl p-6 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-[#c8f03c]/20 flex items-center justify-center mb-4"><span class="text-2xl">🏋️</span></div>
                    <h3 class="text-xl font-bold mb-2">Tracking multiactividad</h3>
                    <p class="text-gray-400 text-sm">Gym, fútbol, running, cardio: registra y la IA ajusta gasto calórico y recuperación.</p>
                </div>
                <div class="card-glass rounded-2xl p-6 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-[#c8f03c]/20 flex items-center justify-center mb-4"><span class="text-2xl">🥗</span></div>
                    <h3 class="text-xl font-bold mb-2">Menú semanal automático</h3>
                    <p class="text-gray-400 text-sm">Desde tu lista de mercado, genera desayuno, almuerzo, cena + macros y recomendaciones de compra.</p>
                </div>
            </div>
        </section>

        <!-- ========== DEMO INTERACTIVA (Alpine + IA simulada / menú y rutina) ========== -->
        <section class="max-w-7xl mx-auto px-5 py-12">
            <div class="grid lg:grid-cols-2 gap-10 items-start">
                <!-- bloque generación de menú semanal (demo) -->
                <div class="card-glass rounded-3xl p-6 lg:p-8 border border-[#c8f03c]/20">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="bg-[#c8f03c] text-black p-2 rounded-xl">🍽️</div>
                        <h3 class="text-2xl font-bold">Menú semanal IA</h3>
                        <span class="text-xs bg-black/40 px-2 py-1 rounded-full text-[#c8f03c]">personalizado</span>
                    </div>
                    <p class="text-gray-300 text-sm mb-4">Simula tu lista de mercado: frutas, verduras, proteína en polvo, etc. La IA te genera el planning.</p>
                    <div x-data="{ grocery: 'pollo, brócoli, arroz, huevos, proteína whey, espinacas, avena', menuGenerated: false, weekMenu: null, loading: false }" class="space-y-4">
                        <textarea x-model="grocery" rows="2" class="w-full bg-black/50 border border-gray-700 rounded-xl p-3 text-sm text-white placeholder-gray-500" placeholder="Ej: pechuga, quinoa, lechuga, tomate, batata, proteína..."></textarea>
                        <button @click="loading=true; setTimeout(() => { weekMenu = { desayuno: 'Tortilla de claras + avena + frutos rojos', almuerzo: 'Pechuga plancha, quinoa, brócoli al vapor', cena: 'Pescado blanco + ensalada verde + boniato', kcal: '≈ 1850 kcal', extra: 'Añade más verduras de hoja verde a tu lista' }; menuGenerated=true; loading=false; }, 800)" class="bg-[#c8f03c] text-black font-bold px-5 py-2 rounded-full hover:bg-[#b5e032] transition flex items-center gap-2">
                            <span>🤖 Generar con IA</span>
                        </button>
                        <div x-show="loading" class="text-[#c8f03c] text-sm">🧠 IA analizando tu mercado...</div>
                        <div x-show="menuGenerated" x-transition.duration.300ms class="bg-black/40 rounded-2xl p-4 mt-2 space-y-2 text-sm">
                            <p class="flex justify-between border-b border-gray-700 pb-1"><span class="font-bold">🥣 Desayuno:</span> <span x-text="weekMenu.desayuno"></span></p>
                            <p class="flex justify-between border-b border-gray-700 pb-1"><span class="font-bold">🍱 Almuerzo:</span> <span x-text="weekMenu.almuerzo"></span></p>
                            <p class="flex justify-between border-b border-gray-700 pb-1"><span class="font-bold">🌙 Cena:</span> <span x-text="weekMenu.cena"></span></p>
                            <p class="flex justify-between"><span class="font-bold">🔥 Calorías totales:</span> <span class="text-[#c8f03c]" x-text="weekMenu.kcal"></span></p>
                            <p class="text-xs text-gray-400 mt-2">✨ Recomendación extra: <span x-text="weekMenu.extra"></span></p>
                        </div>
                    </div>
                </div>
                <!-- bloque rutina gym semanal + tracking diario (checklist) -->
                <div class="card-glass rounded-3xl p-6 lg:p-8 border border-[#c8f03c]/20">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="bg-[#c8f03c] text-black p-2 rounded-xl">🏋️</div>
                        <h3 class="text-2xl font-bold">Rutina semanal + tracking</h3>
                    </div>
                    <div x-data="{ gymDone: false, waterGlasses: 0, routine: '🔥 Push (pecho, hombro, tríceps)', goalCalories: 500, completed: false, markGym() { this.gymDone = true; this.completed = true; }, addWater() { if(this.waterGlasses < 8) this.waterGlasses++; } }" class="space-y-5">
                        <div class="bg-gray-900/60 rounded-xl p-4">
                            <p class="text-[#c8f03c] font-bold text-lg" x-text="routine"></p>
                            <p class="text-xs text-gray-400 mt-1">Basado en tu objetivo de recomposición + gasto calórico estimado</p>
                            <div class="flex gap-3 mt-3">
                                <button @click="markGym()" class="text-sm bg-white/10 hover:bg-[#c8f03c]/20 px-4 py-1.5 rounded-full transition">✅ Marcar entrenamiento</button>
                                <span x-show="gymDone" class="text-[#c8f03c] text-sm flex items-center gap-1">✔️ Gym completado</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center border-t border-white/10 pt-4">
                            <span class="font-bold">💧 Vasos de agua (8 meta)</span>
                            <div class="flex items-center gap-2">
                                <span x-text="waterGlasses" class="text-2xl font-bold text-[#c8f03c]"></span><span>/8</span>
                                <button @click="addWater()" class="bg-[#c8f03c]/20 px-3 py-1 rounded-full text-sm">+1 vaso</button>
                            </div>
                        </div>
                        <div class="bg-black/30 rounded-xl p-3 text-xs text-gray-300 flex justify-between">
                            <span>🔥 Gasto calórico estimado gym: 480 kcal</span>
                            <span class="text-[#c8f03c]">⚡ Déficit/balance inteligente</span>
                        </div>
                        <p class="text-[11px] text-gray-500 italic">La IA ajusta tu plan según el registro diario.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== DASHBOARD PREVIEW (resumen completo) ========== -->
        <section class="max-w-7xl mx-auto px-5 py-16">
            <div class="bg-gradient-to-br from-gray-900/40 to-black/50 rounded-3xl border border-gray-800 p-6 md:p-8 backdrop-blur-sm">
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <div>
                        <span class="text-[#c8f03c] text-sm font-bold uppercase">Dashboard inteligente</span>
                        <h2 class="font-display text-3xl md:text-4xl">Resumen de tu evolución</h2>
                    </div>
                    <div class="bg-black/60 px-4 py-2 rounded-full text-xs border border-white/10">📅 Sincronización en tiempo real</div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <div class="bg-black/40 rounded-2xl p-4 border-l-4 border-[#c8f03c]">
                        <div class="text-gray-400 text-xs">PESO ACTUAL</div>
                        <div class="text-3xl font-bold">78.4<span class="text-lg">kg</span></div>
                        <div class="text-green-400 text-xs">⬇️ -1.2kg en 2 semanas</div>
                    </div>
                    <div class="bg-black/40 rounded-2xl p-4">
                        <div class="text-gray-400 text-xs">% GRASA ESTIMADO</div>
                        <div class="text-3xl font-bold">15.8<span class="text-lg">%</span></div>
                        <div class="text-[#c8f03c] text-xs">🎯 Objetivo: 12%</div>
                    </div>
                    <div class="bg-black/40 rounded-2xl p-4">
                        <div class="text-gray-400 text-xs">CALORÍAS PROMEDIO/DÍA</div>
                        <div class="text-3xl font-bold">2,480<span class="text-lg">kcal</span></div>
                        <div class="text-gray-400 text-xs">vs gasto ~2650 kcal</div>
                    </div>
                    <div class="bg-black/40 rounded-2xl p-4">
                        <div class="text-gray-400 text-xs">RENDIMIENTO SEMANAL</div>
                        <div class="text-3xl font-bold">4/5<span class="text-lg"> gym</span></div>
                        <div class="text-[#c8f03c] text-xs">💧 Agua: 6.2L promedio</div>
                    </div>
                </div>
                <div class="mt-8 flex flex-wrap gap-4 text-sm text-gray-300 bg-black/20 rounded-2xl p-4">
                    <span class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Recomendación IA: Aumenta ingesta proteica post-entreno.</span>
                    <span class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Tu próximo ciclo: entrenamiento de piernas + cardio LISS.</span>
                    <span class="flex items-center gap-2"><span class="w-2 h-2 bg-[#c8f03c] rounded-full"></span> Basado en tu lista, compra más espinacas y frutos secos.</span>
                </div>
            </div>
        </section>

        <!-- ========== CALL TO ACTION final (registro) ========== -->
        <section class="max-w-5xl mx-auto px-5 py-16 mb-12 text-center">
            <div class="bg-gradient-to-r from-[#c8f03c]/10 via-black to-[#c8f03c]/5 rounded-3xl p-8 border border-[#c8f03c]/30">
                <h2 class="font-display text-4xl md:text-5xl">Empieza a entrenar con <span class="text-[#c8f03c]">inteligencia artificial</span></h2>
                <p class="text-gray-300 max-w-2xl mx-auto mt-3">Regístrate, conecta tus datos, objetivos y deja que MyPhysiqAl construya el plan definitivo para tu cuerpo.</p>
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <a href="{{ route('register') }}" class="bg-white text-black font-bold px-8 py-3 rounded-full hover:bg-[#c8f03c] transition">Crear cuenta gratuita</a>
                    <a href="#" class="border border-white/30 px-8 py-3 rounded-full hover:bg-white/5 transition">Saber más</a>
                </div>
                <div class="text-xs text-gray-500 mt-6">✔️ Guardado seguro de datos ✔️ IA con OpenAI ✔️ Dashboard en tiempo real</div>
            </div>
        </section>

        <!-- Footer minimalista -->
        <footer class="border-t border-white/10 py-8 text-center text-gray-500 text-xs">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-3 px-5">
                <span>© 2026 MyPhysiqAl — Body recomposition with intelligence</span>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-[#c8f03c]">Privacidad</a>
                    <a href="#" class="hover:text-[#c8f03c]">Términos</a>
                    <a href="#" class="hover:text-[#c8f03c]">Contacto</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Alpine store simulation (futuro manejo de datos de usuario / login)
        function appStore() {
            return {
                user: null,
                init() {
                    // simulated hydration
                    console.log("MyPhysiqAl IA ready — login system, data tracking & OpenAI integration ready.");
                }
            }
        }
    </script>
</body>
</html>