# Challenge by Daniel Vaquero

Instrucciones de instalación

1. Descargar el repositorio
2. Crear base de datos con nombre 'challenge'
3. Importar script 'challenge_tables.sql' de la raíz del proyecto.
4. Desde línea de comandos ejecutar:
  - cd challenge
  - curl -sS https://getcomposer.org/installer | php
  - php composer.phar install (solicita parámetros de configuración)
  - app/console server:run
5. Editar archivo 'parameters.yml':
  - Modificar los parámetros de acceso a la base de datos
  - database_name: challenge
6. Acceder a la siguiente url: http://127.0.0.1:8000/
7. Testear el funcionamiento esperado.
8. Lanzar los Tests de la carpeta "challenges/src/AppBundle/Tests/Entity" (Opcional)

Nota: Cualquier pregunta a nivel técnico, estaré encantado de responder.
      Mi correo es el siguiente: danielous@gmail.com