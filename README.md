# 📚 Proyecto Escuela FP - Backend API Laravel 11

Este proyecto es una **API RESTful** desarrollada con **Laravel 11** para la gestión de una escuela de Formación Profesional en informática. Permite administrar **módulos**, **unidades formativas**, **profesores**, **alumnos** y **evaluaciones**.

---

## 🚀 Tecnologías utilizadas

- Laravel 11 (PHP 8.2)
- MySQL / MariaDB
- Sanctum (Autenticación por token)
- Postman (pruebas API)
- PHPUnit (testing automático)
- GitHub Actions (CI/CD)
- VPS Debian 12 (Hetzner)

---

## 🧠 Estructura de modelos y relaciones

- **Modul**: tiene muchos **Uf**, pertenece a un **Professor**
- **Uf**: pertenece a un **Modul**, tiene muchos **Alumne** mediante **Avaluacio**
- **Professor**: tiene muchos **Modul**
- **Alumne**: tiene muchas **Uf** mediante **Avaluacio**
- **Avaluacio**: pertenece a un **Alumne** y a una **Uf**, incluye `nota`

---

## 🔐 Autenticación API

La autenticación se realiza mediante **Laravel Sanctum**.

### Endpoints públicos:

| Método | URL           | Descripción        |
|--------|---------------|--------------------|
| POST   | /api/register | Registro de usuario |
| POST   | /api/login    | Login y obtención de token |

### Endpoints protegidos (requieren token):

| Método | URL                   | Descripción                         |
|--------|------------------------|-------------------------------------|
| POST   | /api/logout            | Cierra sesión (revoca token)        |
| CRUD   | /api/moduls            | Gestión de módulos                  |
| CRUD   | /api/ufs               | Gestión de unidades formativas      |
| CRUD   | /api/professors        | Gestión de profesores               |
| CRUD   | /api/alumnes           | Gestión de alumnos                  |
| CRUD   | /api/avaluacions       | Gestión de evaluaciones             |

Envía el token en cada solicitud protegida:

```
Authorization: Bearer TOKEN
```

---

## 🧪 Ejemplos de uso (Postman)

### Registro
```http
POST /api/register
{
  "name": "Admin",
  "email": "admin@example.com",
  "password": "secret123",
  "password_confirmation": "secret123"
}
```

### Login
```http
POST /api/login
{
  "email": "admin@example.com",
  "password": "secret123"
}
```

### Obtener módulos (requiere token)
```http
GET /api/moduls
Header: Authorization: Bearer TOKEN
```

### Crear módulo
```http
POST /api/moduls
{
  "nom": "Mòdul de Laravel",
  "professor_id": 1
}
```

---

## 🧰 Instalación local

```bash
git clone https://github.com/tu_usuario/escuela-backend.git
cd escuela-backend
composer install
cp .env.example .env
# Configura DB en .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## ✅ Testing con PHPUnit

```bash
php artisan test
```

Se testean endpoints protegidos, validaciones, autenticación, creación, actualización y borrado de recursos.

---

## 🚀 Despliegue en producción (CI/CD)

### VPS recomendado
- Hetzner (desde 4,5€/mes)
- Debian 12 con PHP 8.2, MySQL, Apache/Nginx

### Variables necesarias en GitHub:
- `HOST`, `USERNAME`, `PORT`, `SSH_KEY`

### Flujo:
1. GitHub Actions ejecuta `composer install`, `php artisan migrate`
2. Se conecta vía SSH al VPS y hace `git pull`
3. Aplica cambios automáticamente en producción

Archivo `.github/workflows/deploy.yml` incluido en el repositorio.

---

## 📎 Estructura del proyecto

```
app/
  Models/ → Modul, Uf, Professor, Alumne, Avaluacio
  Http/
    Controllers/ → *Controller.php
    Requests/ → *Request.php (validaciones)
routes/
  api.php → Rutas de la API
database/
  migrations/ → Migraciones de tablas
  seeders/ → Seeders para datos de ejemplo
  factories/ → Factories para testing y seed
```

---

## 🎓 Exposición recomendada

- Describir entidades y relaciones (apoyarse en diagrama ER)
- Mostrar flujo de uso de la API (registro → login → CRUD)
- Mostrar pruebas reales en Postman
- Explicar cómo se despliega en producción con GitHub Actions
- Resaltar buenas prácticas: RESTful, validación, autenticación, tests

---

## 🔗 Recursos

- [Documentación Laravel](https://laravel.com/docs)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)
- [Postman](https://www.postman.com/)
- [Guía RESTful](https://restfulapi.net/)
- [Hetzner Cloud](https://www.hetzner.com/cloud)

---

## 👨‍💻 Autor

Daniel Nita – DAW 2 – Proyecto UF4 Laravel