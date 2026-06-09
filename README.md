# Gestión de Reparaciones

Este proyecto es una aplicación web desarrollada con Laravel 13 para administrar reparaciones de equipos.

## Descripción general

La aplicación permite:
- Autenticación de usuarios.
- Registrar, editar, ver y eliminar reparaciones.
- Controlar el estado de cada reparación: `Ingresado`, `En reparación`, `Reparado` y `Entregado`.
- Administración de usuarios solo para perfiles con rol `admin`.

## Tecnologías usadas

- PHP 8.3
- Laravel 13
- Blade templates
- Vite + Tailwind CSS (configurado en `package.json`)
- Base de datos relacional compatible con Laravel (MySQL, SQLite, PostgreSQL, etc.)

## Funcionalidades principales

### Autenticación
- Login de usuarios.
- Logout.
- Protege las rutas de reparaciones para usuarios autenticados.

### Gestión de reparaciones
- Listado de todas las reparaciones.
- Creación de una nueva reparación.
- Edición de reparaciones existentes.
- Visualización de detalles de cada reparación.
- Eliminación de reparaciones.

### Gestión de usuarios (solo admin)
- Listar usuarios.
- Crear nuevos usuarios.
- Editar usuarios existentes.
- Eliminar usuarios.
- El rol del usuario se almacena en el campo `rol` con valores `admin` o `usuario`.

## Estructura clave del proyecto

- `app/Models/Reparacion.php` - modelo Eloquent de reparaciones.
- `app/Models/User.php` - modelo de usuarios con el campo `rol`.
- `app/Http/Controllers/ReparacionController.php` - lógica CRUD de reparaciones.
- `app/Http/Controllers/UsuarioController.php` - lógica CRUD de usuarios.
- `app/Http/Controllers/AuthController.php` - login y logout.
- `app/Http/Middleware/EsAdmin.php` - middleware que protege rutas solo para administradores.
- `routes/web.php` - rutas públicas, rutas autenticadas y rutas de administración.
- `database/migrations/2026_06_03_234539_create_reparacions_table.php` - tabla `reparaciones`.
- `database/migrations/2026_06_08_170312_add_rol_to_users_table.php` - agrega campo `rol` a la tabla `users`.

## Instalación local

1. Copiar el archivo de entorno:

```bash
cp .env.public .env
```
(O `copy .env.public .env` si estás en Windows CMD)

2. Instalar dependencias de PHP:

```bash
composer install
```

3. Generar la clave de aplicación:

```bash
php artisan key:generate
```

4. Configurar la conexión a la base de datos en `.env`.

5. Ejecutar migraciones:

```bash
php artisan migrate
```

6. Instalar dependencias de Node:

```bash
npm install
```

7. Compilar los assets:

```bash
npm run build
```

## Uso

Iniciar el servidor de desarrollo:

```bash
php artisan serve
```

Luego abrir en el navegador la URL mostrada, generalmente `http://127.0.0.1:8000`.

## Rutas principales

- `/login` - formulario de inicio de sesión.
- `/logout` - cerrar sesión.
- `/reparaciones` - listado y CRUD de reparaciones.
- `/reparaciones/create` - crear reparación.
- `/reparaciones/{reparacion}` - ver detalles de reparación.
- `/reparaciones/{reparacion}/edit` - editar reparación.
- `/usuarios` - listado de usuarios (solo admin).
- `/usuarios/create` - crear usuario (solo admin).

## Reglas de validación importantes

- `nombre_cliente`, `marca`, `modelo`, `descripcion_falla`, `fecha_ingreso` y `estado` son campos obligatorios para reparaciones.
- `estado` solo acepta los valores: `Ingresado`, `En reparación`, `Reparado`, `Entregado`.
- `email` debe ser único al crear y actualizar usuarios.
- Contraseña de usuario debe tener mínimo 8 caracteres y confirmarse.

## Notas adicionales

- El middleware `es.admin` bloquea el acceso a la gestión de usuarios si el usuario no tiene rol `admin`.
- Los usuarios autenticados pueden acceder a las funciones de reparaciones.
- El proyecto está preparado para entrega con una estructura clara de MVC y rutas protegidas.

