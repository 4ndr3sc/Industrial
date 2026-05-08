<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaintFlow | CMMS</title>

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="main-container">
        <h1 class="title-industrial">MaintFlow</h1>
        <p>SISTEMA DE GESTIÓN DE MANTENIMIENTO AVANZADO</p>

        <div class="auth-box">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-industrial btn-login">Ir al Panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn-industrial btn-login">Iniciar Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-industrial btn-register">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <section class="info-container">
        <div class="info-content">
            <h2 class="section-subtitle"> MÓDULOS INTEGRALES DEL SISTEMA</h2>

            <div class="grid-services-large">
                <div class="service-card-lg">
                    <div class="service-icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 64px; height: 64px; color: #22d3ee; margin: 0 auto;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                    </div>
                    <h3>Gestión de Activos</h3>
                    <p>Representa el núcleo de control centralizado para la administración del ciclo de vida de la
                        infraestructura física. Este módulo permite una trazabilidad absoluta de la hoja de vida de cada
                        equipo, integrando especificaciones técnicas, ubicación geoespacial y documentación crítica en
                        una sola interfaz. Su implementación garantiza una visibilidad total sobre los recursos,
                        facilitando una gestión basada en datos que maximiza la disponibilidad y asegura que cada activo
                        opere bajo sus estándares de diseño originales para optimizar la rentabilidad industrial.</p>
                </div>

                <div class="service-card-lg">
                    <div class="service-icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 64px; height: 64px; color: #22d3ee; margin: 0 auto;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.014a4.5 4.5 0 004.473-6.957 4.5 4.5 0 00-6.957 4.473c.174.58.15 1.192-.014 1.743z" />
                        </svg>
                    </div>
                    <h3>Mantenimiento</h3>
                    <p>Constituye el motor operativo diseñado para la transición hacia una cultura de confiabilidad
                        proactiva. A través de la programación inteligente de intervenciones preventivas, predictivas y
                        correctivas, este sistema coordina los recursos técnicos para neutralizar fallas potenciales
                        antes de que impacten la cadena de valor. El enfoque principal es la mitigación de riesgos y la
                        reducción drástica de los tiempos de inactividad no planificados (downtime), garantizando una
                        continuidad operativa sin interrupciones y extendiendo significativamente la vida útil de los
                        activos estratégicos.</p>
                </div>

                <div class="service-card-lg">
                    <div class="service-icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 64px; height: 64px; color: #22d3ee; margin: 0 auto;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                    </div>
                    <h3>Reportes Tácticos</h3>
                    <p>Es el ecosistema de inteligencia de negocios encargado de transformar la data operativa en
                        conocimiento estratégico de alto impacto. Mediante el análisis profundo de patrones de falla y
                        el monitoreo de rendimiento en tiempo real, este módulo genera métricas industriales avanzadas
                        que exponen la salud real de la planta. La visualización dinámica de indicadores clave permite a
                        los líderes operativos identificar cuellos de botella y ejecutar ajustes precisos basados en
                        evidencia, asegurando una mejora continua y una toma de decisiones informada sobre la inversión
                        y la productividad.</p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>