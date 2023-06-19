# API de acortamiento de URLs

API que permite acortar URLs utilizando un acortador de URLs público.

## Requisitos

- Composer = 2.5.8
- PHP = 8.2.4
- Laravel = 10.13.5

## Instalación

1. Clona el repositorio: `git clone https://github.com/SandraCorbacho/shortUrl.git`
2. Navega al directorio del proyecto: `cd shortUrl`
3. Instala las dependencias: `composer install`
4. Copia el archivo de entorno: `cp .env.example .env`
5. Genera la clave de la aplicación: `php artisan key:generate`
6. Configura las variables de entorno en el archivo `.env`
7. Lanzar migraciones `php artisan migrate`

## Uso

### Endpoint: POST /create/user

Este endpoint crea un nuevo usuario con un bearer Token, almacenando los datos (crear usuario siempre sera algo opcional).

**Requisitos del body de la petición:**

`json
{
    "name": "test",
    "email": "test@test.com",
    "password": "test"
}
`

Ejemplo de respuesta:

`json
    {
        "data": {
        "name": "test",
        "email": "test@test.com",
        "password": "test",
        "updated_at": "2023-06-18T11:39:36.000000Z",
        "created_at": "2023-06-18T11:39:36.000000Z",
        "id": 1
        },
    "access_token": "16|22uTKCU5zWYGi1Zz6cBDwwT7yyCEjMSTVGeGnCYJ",
    "token_type": "Bearer"
    }`

### Endpoint: POST /api/v1/short-urls

Este endpoint se utiliza para crear una URL acortada.

**Requisitos del body de la petición:**

`json
{
    "url": "https://example.com"
}`

Ejemplo de respuesta

`json
    {
        "url": "https://tinyurl.com/abcdefgh"
    }`

Autorización:

La autorización se realiza utilizando el tipo "Bearer Token". 
Debes incluir un encabezado Authorization con el valor Bearer seguido de un token válido.
Cualquier token que cumpla con el problema de los paréntesis es considerado válido.

Problema de los paréntesis:

Dada una cadena que contiene los caracteres {, }, [, ], ( y ), se debe determinar si la entrada es válida.
La entrada es válida si los paréntesis/llaves/corchetes abiertos se cierran con el mismo tipo.

Ejecución
Para ejecutar la API, puedes utilizar el servidor de desarrollo de Laravel:

`php artisan serve`

La API estará disponible en la URL http://localhost:8000.


