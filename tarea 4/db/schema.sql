/* Esquema relacional (>= 2FN) - Sistema de Expediente Clínico
   Nota: Este script es una propuesta basada en el Excel.
   Motor: SQL Server / MySQL (ajusta tipos si lo ocupas).
*/

-- =========================
-- Catálogos
-- =========================
CREATE TABLE Especialidades (
  IdEspecialidad      INT PRIMARY KEY AUTO_INCREMENT,
  NombreEspecialidad  VARCHAR(100) NOT NULL,
  Descripcion         VARCHAR(250)
);

CREATE TABLE Tarifas (
  IdTarifa            INT PRIMARY KEY AUTO_INCREMENT,
  DescripcionServicio VARCHAR(150) NOT NULL,
  CostoBase           DECIMAL(10,2) NOT NULL,
  IdEspecialidad      INT NULL,
  Estatus             TINYINT NOT NULL DEFAULT 1,
  CONSTRAINT FK_Tarifas_Especialidades
    FOREIGN KEY (IdEspecialidad) REFERENCES Especialidades(IdEspecialidad)
);

-- =========================
-- Entidades principales
-- =========================
CREATE TABLE Pacientes (
  IdPaciente          INT PRIMARY KEY AUTO_INCREMENT,
  NombreCompleto      VARCHAR(150) NOT NULL,
  CURP                VARCHAR(18),
  FechaNacimiento     DATE,
  Sexo                CHAR(1), -- M/F
  Telefono            VARCHAR(20),
  CorreoElectronico   VARCHAR(100),
  Direccion           VARCHAR(250),
  ContactoEmergencia  VARCHAR(150),
  TelefonoEmergencia  VARCHAR(20),
  Alergias            VARCHAR(250),
  AntecedentesMedicos TEXT,
  FechaRegistro       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Estatus             TINYINT NOT NULL DEFAULT 1
);

CREATE TABLE Medicos (
  IdMedico            INT PRIMARY KEY AUTO_INCREMENT,
  NombreCompleto      VARCHAR(150) NOT NULL,
  CedulaProfesional   VARCHAR(50),
  IdEspecialidad      INT NOT NULL,
  Telefono            VARCHAR(20),
  CorreoElectronico   VARCHAR(100),
  HorarioAtencion     VARCHAR(100),
  FechaIngreso        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Estatus             TINYINT NOT NULL DEFAULT 1,
  CONSTRAINT FK_Medicos_Especialidades
    FOREIGN KEY (IdEspecialidad) REFERENCES Especialidades(IdEspecialidad)
);

-- =========================
-- Agenda / Expediente
-- =========================
CREATE TABLE Citas (
  IdCita              INT PRIMARY KEY AUTO_INCREMENT,
  IdPaciente          INT NOT NULL,
  IdMedico            INT NOT NULL,
  FechaCita           DATETIME NOT NULL,
  MotivoConsulta      VARCHAR(250),
  EstadoCita          VARCHAR(20) NOT NULL, -- Programada, Cancelada, Atendida
  Observaciones       VARCHAR(250),
  FechaRegistro       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT FK_Citas_Pacientes FOREIGN KEY (IdPaciente) REFERENCES Pacientes(IdPaciente),
  CONSTRAINT FK_Citas_Medicos   FOREIGN KEY (IdMedico)   REFERENCES Medicos(IdMedico)
);

-- 1 a 1 con Citas: cada cita atendida puede generar UN expediente.
-- Se elimina IdPaciente/IdMedico aquí (se obtienen desde IdCita) => reduce redundancia.
CREATE TABLE ExpedientesClinicos (
  IdExpediente        INT PRIMARY KEY AUTO_INCREMENT,
  IdCita              INT NOT NULL UNIQUE,
  FechaConsulta       DATETIME NOT NULL,
  Sintomas            TEXT,
  Diagnostico         TEXT,
  Tratamiento         TEXT,
  RecetaMedica        TEXT,
  NotasAdicionales    TEXT,
  ProximaCita         DATETIME NULL,
  CONSTRAINT FK_Expedientes_Citas FOREIGN KEY (IdCita) REFERENCES Citas(IdCita)
);

-- =========================
-- Pagos (basados en tarifas)
-- =========================
CREATE TABLE Pagos (
  IdPago              INT PRIMARY KEY AUTO_INCREMENT,
  IdCita              INT NOT NULL,
  IdTarifa            INT NOT NULL,
  Monto               DECIMAL(10,2) NOT NULL,
  MetodoPago          VARCHAR(50),
  FechaPago           DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Referencia          VARCHAR(100),
  EstatusPago         VARCHAR(20) NOT NULL, -- Pagado, Pendiente, Cancelado
  CONSTRAINT FK_Pagos_Citas   FOREIGN KEY (IdCita)   REFERENCES Citas(IdCita),
  CONSTRAINT FK_Pagos_Tarifas FOREIGN KEY (IdTarifa) REFERENCES Tarifas(IdTarifa)
);

-- =========================
-- Seguridad / auditoría
-- =========================
CREATE TABLE UsuariosSistema (
  IdUsuario           INT PRIMARY KEY AUTO_INCREMENT,
  Usuario             VARCHAR(50) NOT NULL UNIQUE,
  ContrasenaHash      VARCHAR(200) NOT NULL,
  Rol                 VARCHAR(50) NOT NULL, -- Admin, Médico, Recepcionista
  IdMedico            INT NULL,
  Activo              TINYINT NOT NULL DEFAULT 1,
  UltimoAcceso        DATETIME NULL,
  CONSTRAINT FK_Usuarios_Medicos FOREIGN KEY (IdMedico) REFERENCES Medicos(IdMedico)
);

CREATE TABLE BitacoraAccesos (
  IdBitacora          INT PRIMARY KEY AUTO_INCREMENT,
  IdUsuario           INT NOT NULL,
  FechaAcceso         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  AccionRealizada     VARCHAR(250) NOT NULL,
  Modulo              VARCHAR(100) NOT NULL,
  CONSTRAINT FK_Bitacora_Usuarios FOREIGN KEY (IdUsuario) REFERENCES UsuariosSistema(IdUsuario)
);

-- Reportes (archivo generado por el sistema)
CREATE TABLE Reportes (
  IdReporte           INT PRIMARY KEY AUTO_INCREMENT,
  TipoReporte         VARCHAR(50) NOT NULL,
  IdPaciente          INT NULL,
  IdMedico            INT NULL,
  FechaGeneracion     DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  RutaArchivo         VARCHAR(250),
  Descripcion         VARCHAR(250),
  GeneradoPorUsuario  INT NULL,
  CONSTRAINT FK_Reportes_Pacientes FOREIGN KEY (IdPaciente) REFERENCES Pacientes(IdPaciente),
  CONSTRAINT FK_Reportes_Medicos   FOREIGN KEY (IdMedico)   REFERENCES Medicos(IdMedico),
  CONSTRAINT FK_Reportes_Usuarios  FOREIGN KEY (GeneradoPorUsuario) REFERENCES UsuariosSistema(IdUsuario)
);
