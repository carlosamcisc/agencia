# Agencia de vehículos

Aplicación web para administrar información de una agencia de autos y motocicletas. Incluye un menú principal, páginas informativas para autos y motos, y módulos de administración conectados a una base de datos MySQL.

## Funcionalidades

- **Clientes:** registrar, consultar, buscar, editar y eliminar clientes.
- **Proveedores:** administrar proveedores y buscar registros.
- **Vehículos:** administrar autos y motocicletas.
- **Inventario:** controlar existencias y precios asociados a vehículos.
- **Ventas:** registrar ventas vinculadas con clientes.
- **Páginas iniciales:** mostrar páginas informativas de autos y motos.

## Tecnologías

- PHP con la extensión MySQLi.
- MySQL o MariaDB.
- HTML y CSS.
- Bootstrap y Font Awesome/Bootstrap Icons cargados desde CDN.

## Requisitos

- Un servidor web con PHP (por ejemplo, Apache incluido en XAMPP).
- PHP con MySQLi habilitado.
- Un servidor MySQL o MariaDB.
- Conexión a internet para cargar los estilos e íconos desde CDN.

## Instalación y ejecución

1. Clona el repositorio o coloca la carpeta del proyecto dentro del directorio público de tu servidor web. En XAMPP para Windows, normalmente es `C:\xampp\htdocs\`.
2. Crea en MySQL/MariaDB la base de datos y las tablas que utiliza la aplicación. Se requieren las tablas `clientes`, `proveedores`, `vehiculos`, `inventario` y `ventas`. El repositorio no incluye un script SQL para crear el esquema.
3. Crea el archivo `.env` en la raíz del proyecto (junto a `conexion.php`). Puedes copiar `.env.example` y ajustar los valores:

   ```ini
   host=tu host
   user=tu usuario
   password= tu contrasenia
   database=agencia
   ```

   `database` debe coincidir con el nombre de la base de datos que creaste. Usa las credenciales de tu propio servidor; no publiques el archivo `.env`.
4. Inicia Apache y MySQL/MariaDB.
5. Abre en el navegador `http://localhost/agencia/` si la carpeta del proyecto se llama `agencia`. Si tiene otro nombre, sustituye ese segmento de la URL.

La conexión se configura en `conexion.php`, que carga las claves `host`, `user`, `password` y `database` desde `.env`. El archivo `.env` está excluido del control de versiones mediante `.gitignore`.

## Estructura del proyecto

```text
.
├── clientes/          # Administración de clientes
├── inventario/        # Administración de existencias y precios
├── paginasIniciales/  # Páginas informativas de autos y motos
├── proveedores/       # Administración de proveedores
├── vehiculos/         # Administración de vehículos
├── ventas/            # Administración de ventas
├── conexion.php       # Conexión MySQLi configurada con .env
├── index.html         # Menú principal
├── .env.example       # Plantilla de configuración local
└── .gitignore         # Excluye archivos locales como .env
```

Los módulos PHP ofrecen operaciones de alta, consulta, edición y eliminación; las vistas de listado incluyen búsqueda.
