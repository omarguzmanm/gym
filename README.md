
## Proyecto Future Fit
Proyecto para la administración de un gimnasio que cuenta con diferentes roles y secciones para mejorar la experiencia del usuario. 

## Instalación
Ejecutar en tu consola los siguientes comandos:
- git clone https://github.com/omarguzmanm/gym.git
- cd gym
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan storage:link
- php artisan migrate --seed

## Acceso
Al ejecutar el seeder se creará un usuario para cada rol, las credenciales para pruebas son las siguientes:
- Rol cliente
      'email' => 'cliente@example.com',
      'password' => 'cliente123'
- Rol entranador
      'email' => 'entrenador@example.com',
      'password' => 'entrenador123'
- Rol Nutriologo
      'email' => 'nutriologo@example.com',
      'password' => 'nutriologo123'
- Rol Administrador
      'email' => 'admin@example.com',
      'password' => 'admin123'
- Rol SuperAdministrador
      'email' => 'superAdmin@example.com',
      'password' => 'superAdmin123'

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
- Si se desea utilizar imagenes de prueba para los usuarios, descomentar la linea del atributo profile_photo_path del archivo UserFactory
- No existe un apartado para registrar directamente, hay que utilzar las credenciales otorgadas
