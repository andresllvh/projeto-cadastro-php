<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Force Academia - Sistema de Gestão</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0a1929 0%, #1a2332 50%, #0a1929 100%);
            color: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Efeito de grade no fundo */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(33, 150, 243, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(33, 150, 243, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 0;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            text-align: center;
            padding: 100px 20px 60px;
            position: relative;
        }

        .logo {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            animation: glow 2s ease-in-out infinite alternate;
            text-shadow: 0 0 30px rgba(33, 150, 243, 0.5);
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 10px rgba(33, 150, 243, 0.5));
            }
            to {
                filter: drop-shadow(0 0 20px rgba(33, 150, 243, 0.8));
            }
        }

        .tagline {
            font-size: 1.5rem;
            color: #b0b0b0;
            margin-bottom: 15px;
            font-weight: 300;
        }

        .subtitle {
            font-size: 1rem;
            color: #808080;
            max-width: 600px;
            margin: 0 auto 50px;
            line-height: 1.6;
        }

        /* Botão Principal */
        .cta-button {
            display: inline-block;
            padding: 18px 50px;
            background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
            color: #ffffff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(33, 150, 243, 0.4);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.6);
        }

        /* Seção de Features */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(30, 30, 30, 0.8);
            border: 2px solid rgba(33, 150, 243, 0.3);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(33, 150, 243, 0.8);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 10px rgba(33, 150, 243, 0.5));
        }

        .feature-title {
            font-size: 1.3rem;
            color: #2196f3;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .feature-description {
            color: #b0b0b0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 40px 20px;
            background: rgba(10, 10, 10, 0.8);
            margin-top: 80px;
            border-top: 2px solid rgba(33, 150, 243, 0.2);
        }

        footer p {
            color: #808080;
            font-size: 0.9rem;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .logo {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .features {
                grid-template-columns: 1fr;
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="logo">💪 Iron Force</h1>
            <p class="tagline">Transforme Seu Corpo, Fortaleça Sua Mente</p>
            <p class="subtitle">
                Sistema completo de gestão de alunos para academias modernas. 
                Controle, organize e impulsione o crescimento da sua academia.
            </p>
            <a href="index.php" class="cta-button">Acessar Sistema</a>
        </header>

        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3 class="feature-title">Gestão Completa</h3>
                <p class="feature-description">
                    Cadastre e gerencie todos os dados dos seus alunos em um único lugar. 
                    Sistema intuitivo e fácil de usar.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Rápido e Eficiente</h3>
                <p class="feature-description">
                    Interface otimizada para agilizar o cadastro e consulta de informações. 
                    Ganhe tempo no atendimento.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">Seguro e Confiável</h3>
                <p class="feature-description">
                    Seus dados protegidos com as melhores práticas de segurança. 
                    Sistema desenvolvido com tecnologia robusta.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3 class="feature-title">Controle Total</h3>
                <p class="feature-description">
                    Visualize, edite e exclua informações com facilidade. 
                    Tenha controle completo sobre sua base de alunos.
                </p>
            </div>
        </section>
    </div>

    <footer>
        <p>© 2025 Iron Force Academia - Desenvolvido por André Laureano e Felipe Gabriel | ADS</p>
    </footer>
</body>
</html>
