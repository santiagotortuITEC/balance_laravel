 
## Acerca del proyecto
Este proyecto de Laravel es util para manejar las finanzas personales.
Se pueden ingresar los gastos y las entradas de dinero, todo esto separado por categorias. Automaticamente se generara un balance sobre los datos ingresados, y el usuario sera notificado via Email cuando su balance este bajo los $0.

## Clonar y correr el proyecto

Luego de clonar el repositorio:

- Crear una base de datos y dejarla vacia.
- Modificar el archivo ".env.example" a ".env"
    - Hacer configuraciones necesarias. 
    - Por ejemplo:
        - Nombre de la base de datos. (DB_DATABASE) 
- Para instalar dependencias.
    - Correr "composer install".
- Para crear tablas e insertar datos predeterminados.
    - Correr "php artisan migrate --seed".

- Para correr el proyecto:
    - Web: "php artisan serve" (puerto 8000)

## Utilizar API

### ENDPOINTS

**Ingresos**
- POST a ingresos
    - http://localhost:8000/api/ingresos
- PUT a un ingreso
    - http://localhost:8000/api/ingresos/{id}
- GET de todos los ingresos
    - http://localhost:8000/api/ingresos
- GET de un ingreso
    - http://localhost:8000/api/ingresos/{id}
- DELETE a un ingreso
    - http://localhost:8000/api/ingresos/{id}

**Egresos**
- POST a egresos
    - http://localhost:8000/api/egresos
- PUT a un egreso
    - http://localhost:8000/api/egresos/{id}
- GET de todos los egresos
    - http://localhost:8000/api/egresos
- GET de un egreso
    - http://localhost:8000/api/egresos/{id}
- DELETE a un egreso
    - http://localhost:8000/api/egresos/{id}

**Categorias**
- POST a categorias
    - http://localhost:8000/api/categorias
- PUT a una categoria
    - http://localhost:8000/api/categorias/{id}
- GET de todas las categorias
    - http://localhost:8000/api/categorias
- GET de una categoria
    - http://localhost:8000/api/categorias/{id}
- DELETE a una categoria
    - http://localhost:8000/api/categorias/{id}

**SubCategorias**
- POST a sub categorias
    - http://localhost:8000/api/subcategorias
- PUT de una sub categoria
    - http://localhost:8000/api/subcategorias/{id}
- GET de todas las sub categorias
    - http://localhost:8000/api/subcategorias
- GET de una sub categoria
    - http://localhost:8000/api/subcategorias/{id}
- DELETE a una sub categoria
    - http://localhost:8000/api/subcategorias/{id}

**ItemsEgresos**
- POST de items de egresos
    - http://localhost:8000/api/itemsegresos
- PUT de items de egresos
    - http://localhost:8000/api/itemsegresos/{id}
- GET de todas los items de egresos
    - http://localhost:8000/api/itemsegresos
- GET de un item de egreso
    - http://localhost:8000/api/itemsegresos/{id}
- DELETE a un item de egreso
    - http://localhost:8000/api/itemsegresos/{id}

  
 