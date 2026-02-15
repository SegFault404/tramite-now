# Tramite Now - Sistema de Tarjetas de Circulación 🚗

Este es un sistema de gestión administrativa desarrollado durante mis prácticas profesionales en la "Subgerencia de Transporte Público de Sullana". Permite digitalizar y administrar el proceso de emisión de tarjetas de circulación vehicular.

## 🛠️ Tecnologías utilizadas
* **Backend:** PHP 8.x con framework Laravel.
* **Frontend:** Blade, CSS (Tailwind/Bootstrap) y JavaScript.
* **Base de Datos:** MySQL.
* **Herramientas:** Git/GitHub, XAMPP.

## 🚀 Instalación y configuración
Si deseas probar este proyecto en tu entorno local, sigue estos pasos:

1. Clonar el repositorio:
   Bash
   > git clone [https://github.com/SegFault404/tramite-now.git](https://github.com/SegFault404/tramite-now.git)
   cd tramite-now

2. Instalar dependencias de PHP:
   Bash
   > composer install

3. Configurar el entorno:
   - Copiar el archivo `.env.example` y renombrarlo a `.env`.
   - Configurar tus credenciales de base de datos en el nuevo archivo `.env`:
     ```text
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nombre_de_tu_bd
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generar la clave de aplicación:**
   Bash
   > php artisan key:generate


5. Ejecutar migraciones:
   Bash
   > php artisan migrate
   
6. Iniciar servidor local:
   Bash
   > php artisan serve
   
Luego abre http://localhost:8000 en tu navegador.

Funcionalidades principales

- Gestión de Trámites: Registro, edición y seguimiento de tarjetas de circulación.

- Visor de Documentos: Panel para visualizar archivos adjuntos como SOAT, Licencia, etc.

- Sistema de Roles: Control de acceso para administradores y revisores.

- Reportes en PDF: Generación de tarjetas listas para impresión.

Este proyecto es una muestra de mis habilidades en el desarrollo backend con Laravel, enfocado en resolver problemas reales de gestión pública.
