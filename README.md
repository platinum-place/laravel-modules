# Descripción

Este proyecto es un ejemplo diseñado para ilustrar la metodología de trabajo en proyectos desarrollados con Laravel. En este caso, muestra mi de un proyecto modular.

En él, he integrado 3 sistemas con sus metodologias bajo un mismo módulo:

1. Sistema de permisos, con el paquete [laravel-permission](https://github.com/spatie/laravel-permission).
2. Sistema de control de usuarios, con el paquete [Breeze](https://github.com/laravel/breeze).
3. Sistema de control de accesos, para conectar otras API externas, con el paquete [Passport](https://github.com/laravel/passport).

Aquí tienes una versión más técnica y simplificada de tu descripción:

---

Un módulo en este proyecto es una unidad autónoma, diseñada para operar sin dependencia de otras clases o bibliotecas externas al módulo. Cada módulo contiene los recursos necesarios para que sus clases funcionen de forma independiente.

Para lograrlo, cada módulo debe ejecutar sus tareas sin intervención directa de otros módulos. Si necesita exponer algún servicio o dato a otras partes del sistema, el núcleo de Laravel (la aplicación base) debe tener un mecanismo para acceder a esos resultados.

Por ejemplo, en el módulo de autenticación de usuario, otros módulos no necesitan conocer el proceso de autenticación específico, solo necesitan acceder al usuario autenticado, ya sea a través del helper o del objeto `$request`. Esto es independiente del método de autenticación utilizado (Breeze, Passport, etc.), permitiendo referencias polimórficas a los usuarios en la base de datos.

En otros escenarios, middleware o clases con interfaces abstractas pueden usarse para que el núcleo de la aplicación recupere datos de los módulos y los disponibilice en cualquier parte del sistema.

## Metodologías y patrones utilizados

Se han implementado capas lógicas para el uso de las diferentes tecnologías de Laravel.

### Enums

Los enums son constantes que comparten lógicas y reglas, siempre vinculadas a un modelo principal, y hacen referencia a una tabla que contiene la misma información.

### Logs

Los logs están implementados de dos maneras:

1. Los logs estándar de Laravel, utilizando su *facade* con el canal `database`.
2. Logs a partir del modelo, donde todos los modelos tienen la capacidad de utilizarlos a través de la clase `BaseModel`.

Ambos enfoques permiten una gestión eficaz de los registros en la base de datos.

### Modelos

Además del modelo de prueba incluido en este proyecto, existen modelos base esenciales para las funcionalidades principales, como:

- Gestión de logs.
- Manejo de acciones.
- Clase abstracta que sirve como base para todos los modelos.

Estos modelos proporcionan una estructura sólida para las operaciones del proyecto.

### Repositorios

Los repositorios son una capa adicional sobre los modelos, encargada de manejar la lógica relacionada con la base de datos en torno a un modelo.

Se utiliza una clase principal que sirve como base, de la cual las clases hijas pueden heredar y sobrescribir la lógica cuando sea necesario. Este patrón permite una separación clara de responsabilidades y facilita el mantenimiento del código.

### Servicios

Los servicios forman una capa encargada de manejar la lógica de negocio que se encuentra entre los controladores y los modelos.

Se implementa una clase principal que define los métodos clave y gestiona los repositorios, permitiendo una organización más clara de la lógica de negocio y facilitando su reutilización en distintas partes del sistema.

## Iniciar el contenedor

Para los contenedores, estoy utilkizando la interfaz de comando de Laravel, Sail. Al ser scripts preparados, es posible utilizar las instrucciones de Laravel en su documentación.

Para utilizarlo, es necesario contar con las dependencias necesarias:

```bash
composer install
```

Despues, iniciar sail:

```bash
./vendor/bin/sail up -d
```
Listo, el proyecto esta en funcionamiento. Solo restaria ejecutar las migraciones y seeders:

```bash
./vendor/bin/sail artisan migrate --seed
```

## Opcional: Crear un alias para Sail

Si deseas configurar un alias para el comando:

```bash
./vendor/bin/sail
```
,sigue estos pasos:

1. Abre la consola de tu sistema operativo y ejecuta el siguiente comando (para sistemas basados en Debian):

```bash
nano ~/.bashrc
```

2. En el archivo que se abrirá, agrega la siguiente línea para definir el alias:

```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

3. Guarda el archivo y recarga la configuración ejecutando:

```bash
source ~/.bashrc
```

A partir de ahora, podrás utilizar el alias sail para ejecutar comandos, por ejemplo:

```bash
sail artisan optimize:clear
```

## Probar funcionalidades

Dentro del proyecto se encuentra una colección de endpoints (exportada desde Postman) que permite su importación y prueba.

## Paquetes utilizados

- [Breeze](https://github.com/laravel/breeze) para la autenticación de usuarios
- [Passport](https://github.com/laravel/passport) para la autenticación de otros sistemas (clientes).
- [Laravel Permission](https://github.com/spatie/laravel-permission) para la lógica de permisos.
- [Laravel Lang](https://github.com/Laravel-Lang/common) para las traducciones.
- [Sail](https://github.com/laravel/sail) para la gestión del entorno de pruebas.
