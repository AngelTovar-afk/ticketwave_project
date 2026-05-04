# 🎟️ TicketWave

Sistema web de venta y gestión de boletos para eventos.

---

## 📋 Descripción

TicketWave es una plataforma que permite a organizadores crear y administrar eventos, y a los usuarios comprar boletos de forma rápida y segura. El sistema incluye gestión de inventario de boletos, confirmaciones y panel de administración.

---

## 👥 Integrantes

| Nombre | Rol | GitHub |
|--------|-----|--------|
| Leslie Isabel Ramos Chico | Líder Técnica / GitHub | [@Isis23it](https://github.com/Isis23it) |
| Eduardo Angel Tovar Ortega | Scrum Master / DevOps | [@AngelTovar-afk](https://github.com/AngelTovar-afk) |
| Angel Jayr Velazquez Escobedo | DBA | [@SrMolo](https://github.com/SrMolo) |
| Paola Ivette Villagran Avila | Diseñadora UX/UI | [@paolaivettevillagran-png](https://github.com/paolaivettevillagran-png) |

> **Equipo:** Alfa Dinamita

---

## 🛠️ Tecnologías

- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Livewire + Filament + Tailwind CSS
- **Base de datos:** MySQL 8
- **Contenedores:** Docker + Docker Compose
- **Control de versiones:** Git + GitHub (GitFlow)
- **Gestión de proyecto:** Jira
- **Diseño:** Figma

---

## 🚀 Instrucciones para correr el proyecto localmente

### Requisitos previos

- Docker Desktop instalado y corriendo
- Git

### Pasos

```bash
# 1. Clonar el repositorio
git clone https://github.com/Isis23it/ticketwave_project.git
cd ticketwave_project

# 2. Copiar el archivo de entorno
cp .env.example .env

# 3. Levantar los contenedores
docker compose up -d

# 4. Instalar dependencias
docker compose exec app composer install

# 5. Generar la clave de la aplicación
docker compose exec app php artisan key:generate

# 6. Ejecutar migraciones
docker compose exec app php artisan migrate --seed
```

La aplicación estará disponible en: `http://localhost:8000`

---

## 🌿 Estrategia de ramas (GitFlow)

| Rama | Descripción |
|------|-------------|
| `main` | Código en producción. Protegida. |
| `develop` | Integración de features. Protegida. |
| `feature/nombre` | Una rama por historia de usuario. |
| `hotfix/nombre` | Correcciones urgentes en producción. |

---

## 📁 Estructura del proyecto

```
ticketwave_project/
├── docs/              ← Documentación y wireframes
├── docker/            ← Configuración de Docker
├── app/               ← Código fuente Laravel
├── database/          ← Migraciones y seeders
├── resources/         ← Vistas y assets
└── ...
```
