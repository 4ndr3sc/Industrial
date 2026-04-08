<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Core | CMMS</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="main-container">
        <h1 class="title-industrial">INDUSTRIAL CORE</h1>
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
                <div class="service-icon-lg">⚙️</div>
                <h3>Gestión de Activos</h3>
                <p>Representa el núcleo de control centralizado para la administración del ciclo de vida de la infraestructura física. Este módulo permite una trazabilidad absoluta de la hoja de vida de cada equipo, integrando especificaciones técnicas, ubicación geoespacial y documentación crítica en una sola interfaz. Su implementación garantiza una visibilidad total sobre los recursos, facilitando una gestión basada en datos que maximiza la disponibilidad y asegura que cada activo opere bajo sus estándares de diseño originales para optimizar la rentabilidad industrial.</p>
            </div>

            <div class="service-card-lg">
                <div class="service-icon-lg">📅</div>
                <h3>Mantenimiento</h3>
                <p>Constituye el motor operativo diseñado para la transición hacia una cultura de confiabilidad proactiva. A través de la programación inteligente de intervenciones preventivas, predictivas y correctivas, este sistema coordina los recursos técnicos para neutralizar fallas potenciales antes de que impacten la cadena de valor. El enfoque principal es la mitigación de riesgos y la reducción drástica de los tiempos de inactividad no planificados (downtime), garantizando una continuidad operativa sin interrupciones y extendiendo significativamente la vida útil de los activos estratégicos.</p>
            </div>

            <div class="service-card-lg">
                <div class="service-icon-lg">📊</div>
                <h3>Reportes Tácticos</h3>
                <p>Es el ecosistema de inteligencia de negocios encargado de transformar la data operativa en conocimiento estratégico de alto impacto. Mediante el análisis profundo de patrones de falla y el monitoreo de rendimiento en tiempo real, este módulo genera métricas industriales avanzadas que exponen la salud real de la planta. La visualización dinámica de indicadores clave permite a los líderes operativos identificar cuellos de botella y ejecutar ajustes precisos basados en evidencia, asegurando una mejora continua y una toma de decisiones informada sobre la inversión y la productividad.</p>
            </div>
        </div>
    </div>
</section>

</body>
</html>