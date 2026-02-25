const $form = document.getElementById("loginForm");
const $password = document.getElementById("password");
const $username = document.getElementById("username");
const $visible = document.getElementById("visible");
const $msg = document.getElementById("loginMsg");

document.addEventListener("change", (e) => {
  if (e.target === $visible) {
    $password.type = $visible.checked ? "text" : "password";
  }
});


$form.addEventListener("submit", (e) => {
  e.preventDefault();
  window.location.href = "./paginas/dashboard.html";
});
