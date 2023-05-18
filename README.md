<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Diagrama de clases Alcaidias

```mermaid
classDiagram

    destino -- departamento
    destino -- capacidad
    destino o-- parte
    complejo -- destino
    tipo_destino -- destino
    parte *--> "*" valor_consolidado 
    categoria o-->valor_consolidado
    categoria "*" <--> "*"  persona
    valor_consolidado --> tema
    categoria *--> tema
    parte o--> "*" persona
   
   class destino {
         +String nombre
         +String direccion
         +Date inauguracion
         +Tel telefono
         +String tipo
         }

    class capacidad {
        +int capacidadMasculina
        +int capacidadFemenina
        +int capacidadTrans
    }

    departamento : +string nombre
    complejo : +string nombre

   class tipo_destino{
        +alcaidiaDepartamental
        +alcaidiaPenitenciaria
        +unidadPenitenciaria
                }

   class parte{
        +date fecha
        +foreign destino
        }

    class valor_consolidado{
        +int total
        +foreign categoría
        +int cantFem
        +int cantMas
        +int cantTrans
        }
        

    categoria: +string tema

    class persona{
        +string nombre
        +string apellido
        +string genero
                }
    class tema{
        +string nombre
    }

```

    


## Instalación

Generamos la imagen de la aplicacion
```
docker compose build
```

Levantamos la aplicacion
```
docker compose up
```

Esto nos sirve en el puerto 8000 la aplicacion
```
http://localhost:8000/destinos
```

Base
```
http://localhost:
``` 

El acceso inicial en entorno de desarrollo es
```
user: root
pass: 12345
```

```
# entrar al pod de php
docker compose exec app bash

# para la db 
php artisan db:seed
