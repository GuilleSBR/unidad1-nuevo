/* app.js
   - Guarda datos en localStorage (solo front-end)
   - Valida login y protege pantallas
   - CRUD básico para módulos: pacientes, médicos, citas, etc.
*/

const STORAGE = {
  SESSION: "clinica_session",
  PACIENTES: "clinica_pacientes",
  MEDICOS: "clinica_medicos",
  ESPECIALIDADES: "clinica_especialidades",
  CITAS: "clinica_citas",
  TARIFAS: "clinica_tarifas",
  PAGOS: "clinica_pagos",
  REPORTES: "clinica_reportes",
  USUARIOS: "clinica_usuarios",
  BITACORA: "clinica_bitacora",
};

function nowISO() {
  return new Date().toISOString();
}

function readJSON(key, fallback) {
  try {
    const raw = localStorage.getItem(key);
    return raw ? JSON.parse(raw) : fallback;
  } catch {
    return fallback;
  }
}

function writeJSON(key, value) {
  localStorage.setItem(key, JSON.stringify(value));
}

function uid(prefix = "id") {
  return prefix + "_" + Math.random().toString(16).slice(2) + "_" + Date.now();
}

/* =========================
   STORAGE (inicialización vacía)
   ========================= */
function initEmptyStorage() {
  // ESQUELETO: siempre iniciamos vacío (sin datos precargados)
  // Esto evita que aparezcan registros viejos guardados en el navegador.
  const emptyKeys = [
    STORAGE.PACIENTES,
    STORAGE.MEDICOS,
    STORAGE.ESPECIALIDADES,
    STORAGE.CITAS,
    STORAGE.TARIFAS,
    STORAGE.PAGOS,
    STORAGE.REPORTES,
    STORAGE.USUARIOS,
    STORAGE.BITACORA,
  ];

  emptyKeys.forEach(k => writeJSON(k, []));
  clearSession();
}
initEmptyStorage();

/* =========================
   AUTH / BITÁCORA
   ========================= */
function getSession() {
  return readJSON(STORAGE.SESSION, null);
}

function setSession(user) {
  writeJSON(STORAGE.SESSION, user);
}

function clearSession() {
  localStorage.removeItem(STORAGE.SESSION);
}

function logAction(accion, modulo) {
  // ESQUELETO: bitácora desactivada (sin registros)
  return;
}

/* =========================
   LAYOUT (sidebar)
   ========================= */
function setActiveNav(currentKey) {
  document.querySelectorAll("[data-nav]").forEach(a => {
    if (a.getAttribute("data-nav") === currentKey) a.classList.add("active");
  });
}

function logout() {
  clearSession();
  window.location.href = "../login.html";
}

function list(key) {
  return readJSON(key, []);
}
function saveList(key, items) {
  writeJSON(key, items);
}

function upsert(key, item, idField="id") {
  const items = list(key);
  const idx = items.findIndex(x => x[idField] === item[idField]);
  if (idx >= 0) items[idx] = item;
  else items.unshift(item);
  saveList(key, items);
}

function removeById(key, id) {
  const items = list(key).filter(x => x.id !== id);
  saveList(key, items);
}


function byId(items, id) {
  return items.find(x => x.id === id) || null;
}
