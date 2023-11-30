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
Ejecutar el siguiente comando en caso de tener el siguiente error: <br>
"vite" no se reconoce como un comando interno o externo,
programa o archivo por lotes ejecutable.
```shell
npm install vite
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
- Ventas - Completada V1
- Membresias - Completada V1
- Análisis - Completada V1
- Dietas - Completada V1
- Citas - Completada
- Mensajes - Completada V1
- Ejercicios - Completada
- Rutinas - Completada
- Mi progreso - Completada V1
- Nutrición - Completada V1
- Mis Prs - Completada V1

## Notas
- El proceso de ejecución de migraciones puede demorar, debido a que se insertan datos importantes directamente (comidas, rutinas, ejercicios)
- Para tener una mejor experciencia del rol del cliente, usar un usuario de la factory o bien, uno que creeemos desde el rol administrador, esto con el fin de que al usuario se le active correctamente su membresia.
- Para el funcionamiento del chat, pago de membresia, subida de imagenes y correos, poner credenciales correspondientes (Pusher, Mercado Pago, Cloudinary y Mailtrap)
- Si se desean utilizar imágenes de prueba para los usuarios, descomentar la línea del atributo profile_photo_path en el archivo UserFactory
- No existe un formulario de registro directo; se deben utilizar las credenciales otorgadas.

