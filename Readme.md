# 🏥 HealthOS - Monitoreo de Salud Global

Dashboard profesional de monitoreo de datos de salud desarrollado con **Symfony 1.4**, **Doctrine** y **Twig**. El sistema sincroniza datos en tiempo real de una API externa, los persiste en MySQL y los presenta en una interfaz moderna y responsiva.

## 🚀 Inicio Rápido con VS Code (Recomendado)

Gracias a la integración con **Docker**, no necesitas instalar nada en tu máquina local:

1. Asegúrate de tener instalada la extensión **"Dev Containers"** en VS Code.

2. Abre la carpeta del proyecto.

3. VS Code detectará la configuración y te ofrecerá la opción:

   > **"Reopen and Rebuild in Container"**

4. Haz clic en ella y el sistema instalará automáticamente PHP, MySQL y todas las dependencias necesarias.

------

## 💻 Ejecución Manual (Local)

Si prefieres usar el servidor embebido de PHP de forma tradicional:

1. **Iniciar el servidor:**

   Bash

   ```
   php -S 0.0.0.0:8080 -t web
   ```

2. **URLs de Acceso:**

   - **Dashboard Principal:** [http://localhost:8080/frontend_dev.php/test](https://www.google.com/search?q=http://localhost:8080/frontend_dev.php/test)
   - **Gestión de Alertas:** [http://localhost:8080/frontend_dev.php/alerta](https://www.google.com/search?q=http://localhost:8080/frontend_dev.php/alerta)

------

## 🛠️ Stack Tecnológico

- **Framework:** Symfony 1.4 (Legacy Power)
- **ORM:** Doctrine 1.2
- **Frontend:** Bootstrap 5 & FontAwesome 6
- **Motor de Vista:** Twig (Renderizado seguro vía `sf_data->getRaw()`)
- **Infraestructura:** Docker & Dev Containers (VS Code)
- **API de datos:** [disease.sh](https://disease.sh/)

------

## ⚙️ Configuración del Entorno

Una vez dentro del contenedor o con el servidor activo, prepara la base de datos:

Bash

```
# Generar tablas, relaciones y modelos
php symfony doctrine:build --all --and-load

# Limpiar caché del framework
php symfony cc
```

------

## 🕹️ Funcionamiento

- **Sincronización:** El botón "Actualizar desde API" descarga los datos actuales, mapea las relaciones de continente y guarda el Top 15 de países.
- **Persistencia:** Los datos se guardan localmente para garantizar velocidad y disponibilidad.
- **Visualización:** Renderizado dinámico con Twig, utilizando badges de colores para identificar continentes y estados de alerta.

------

**Desarrollado con 💪 por Kevin.**

------

*Este proyecto es el resultado de dominar la robustez de las arquitecturas legacy y elevarlas con las mejores prácticas de desarrollo moderno; un puente perfecto entre la persistencia de datos y una experiencia de usuario impecable.*