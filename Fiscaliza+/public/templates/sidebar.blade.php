<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Template de Sidebar Fiscaliza+</title>
        <!-- Bootstrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        />
        <style>
            /* Estilos da Sidebar */
            .sidebar {
                width: 80px;
                height: 100vh;
                background-color: #0489ca;
                position: fixed;
                left: 0;
                top: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 1rem 0;
                z-index: 1100;
            }

            .nav-item {
                width: 100%;
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .nav-link {
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                font-size: 1.5rem !important;
                width: 42px;
                height: 42px;
                border-radius: 0;
                transition: all 0.3s;
                text-decoration: none;
            }

            .nav-link:nth-child(1) {
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .nav-link.active {
                color: #00ff1e;
                border-left: 2px solid #00ff1e;
            }

            .nav-link:hover {
                color: #00ff1e;
            }

            .nav-link.active.highlight {
                color: #10b981;
            }

            .divider {
                width: 40px;
                height: 1px;
                background-color: #bebebe;
                margin: 0.5rem 0 1rem 0;
            }

            .logout {
                margin-top: auto !important;
                margin-bottom: 30px;
            }

            /* Estilos para os ícones */
            .sidebar-icon {
                height: 40px;
                width: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <!-- Sidebar Template -->
        <div class="sidebar">
            <!-- Logo Icon (Highlighted) -->
            <div class="nav-item">
                <a href="/home" class="nav-link active highlight">
                    <img
                        src="../assets/logo-menor.png"
                        alt="Logo"
                        style="width: 64px; height: 60px"
                    />
                </a>
            </div>

            <div class="divider"></div>

            <!-- Home Icon -->
            <div class="nav-item">
                <a href="/home" class="nav-link">
                    <i
                        class="bi bi-house sidebar-icon"
                        style="height: 40px; width: 40px"
                    ></i>
                </a>
            </div>

            <!-- Chat/Message Icon -->
            <div class="nav-item">
                <a href="/cadastrar-denuncia" class="nav-link">
                    <i
                        class="bi bi-chat sidebar-icon"
                        style="height: 40px; width: 40px"
                    ></i>
                </a>
            </div>

            <!-- Document/Files Icon -->
            <div class="nav-item">
                <a href="../views/feedback-orgao.html" class="nav-link">
                    <i
                        class="bi bi-file-earmark-text sidebar-icon"
                        style="height: 40px; width: 40px"
                    ></i>
                </a>
            </div>

            <!-- User/Profile Icon -->
            <div class="nav-item">
                <a  href="{{ route('profile.perfil') }}" class="nav-link">
                    <i
                        class="bi bi-person sidebar-icon"
                        style="height: 40px; width: 40px"
                    ></i>
                </a>
            </div>

            <!-- Logout/Sign out (at the bottom) -->
            <div class="nav-item logout">
                <a href="#" class="nav-link">
                    <i
                        class="bi bi-box-arrow-right sidebar-icon"
                        style="height: 30px; width: 30px"
                    ></i>
                </a>
            </div>
        </div>
        <!-- Script para alternar a classe "active" nos links da sidebar -->
        <script>
            // Seleciona todos os links da sidebar
            const navLinks = document.querySelectorAll(".nav-link");

            // Adiciona evento de clique a cada link
            navLinks.forEach((link) => {
                link.addEventListener("click", function (e) {
                    // Remove a classe 'active' de todos os links
                    navLinks.forEach((item) => {
                        item.classList.remove("active");
                        // Preserva apenas o highlight do logo
                        if (item.classList.contains("highlight")) {
                            item.classList.add("active");
                        }
                    });

                    // Adiciona a classe 'active' ao link clicado se não for o logo
                    if (!this.classList.contains("highlight")) {
                        this.classList.add("active");
                    }
                });
            });
        </script>
    </body>
</html>
