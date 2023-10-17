# Proyecto Future Fit
Este proyecto es una plataforma de gestión para gimnasios con varios roles y características diseñadas para mejorar la experiencia de los usuarios.

## Instalación
Sigue estos pasos para instalar y configurar el proyecto en tu entorno local:
 ```shell
git clone https://github.com/omarguzmanm/gym.git  
cd gym
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
npm run dev
php artisan serve
```

## Credenciales de prueba
Al ejecutar el seeder se creará un usuario para cada rol, las credenciales para pruebas son las siguientes: <br>
### Rol Cliente
- **Email**: cliente@example.com
- **Contraseña**: `cliente123`

### Rol Entrenador
- **Email**: entrenador@example.com
- **Contraseña**: `entrenador123`

### Rol Nutriólogo
- **Email**: nutriologo@example.com
- **Contraseña**: `nutriologo123`

### Rol Administrador
- **Email**: admin@example.com
- **Contraseña**: `admin123`

### Rol Superadministrador
- **Email**: superAdmin@example.com
- **Contraseña**: `superAdmin123`

## Secciones
- Usuarios - Completada
- Ventas - Proximamente
- Membresias - En proceso de mejora
- Análisis - En proceso de mejora
- Dietas - En proceso de mejora
- Citas - Completada
- Mensajes - En proceso de mejora
- Ejercicios - Completada
- Rutinas - Completada
  
## Notas
- Para el funcionamiento del chat, es necesario poner tus credenciales de Pusher en el .env
- Por el momento los roles cliente, administrador y superAdministrador tienen la misma funcionalidad. Proximamente se crearán todas las secciones exclusivas del cliente.
- Por el momento todos los roles tienen los mismos permisos. 
- Si se desean utilizar imágenes de prueba para los usuarios, descomentar la línea del atributo profile_photo_path en el archivo UserFactory
- No existe un formulario de registro directo; se deben utilizar las credenciales otorgadas.
