    <!-- header y demas -->
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form action="./includes/validar-usuario.php" method="post" id="loginForm">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text"      name="usuario"    placeholder="Usuario"required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password"  name="contraseña" placeholder="Contraseña"required>
                </div>
                <button type="submit" value="Iniciar Sesión" class="btn">Inicar Sesion</button>
                <p class="register-link">¿No tienes una cuenta? <a href="signup.php">Regístrate aquí</a></p>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const error = params.get('error');
            if (error) {
                const alertDiv = document.getElementById('alert');
                alertDiv.textContent = error;
                alertDiv.style.display = 'block';
            }
        });
    </script>

    <!-- Pie de Página -->
    <?php include 'includes/footer.php'; ?>