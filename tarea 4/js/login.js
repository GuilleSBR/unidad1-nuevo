const $form = document.getElementById("loginForm");
const $password = document.getElementById("password");
const $username = document.getElementById("username");
const $visible = document.getElementById("visible");
const $msg = document.getElementById("loginMsg");

// Mostrar/ocultar contraseña (opcional)
document.addEventListener("change", (e) => {
  if (e.target === $visible) {
    $password.type = $visible.checked ? "text" : "password";
  }
});

// SIN VALIDACIÓN: al enviar, solo entra al sistema
$form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Entrar directo al dashboard
  window.location.href = "./pages/dashboard.html";
});
