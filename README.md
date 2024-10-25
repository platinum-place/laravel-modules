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
