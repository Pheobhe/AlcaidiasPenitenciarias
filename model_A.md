basado en mermaid podes seguir la [edicion online](https://mermaid.live/edit#pako:eNqFVNuOmzAQ_RXLj7msIBdIULVPUd9WqrT7VCGtpmbCugUPMqbqNson9Sv6YzW3YAJteYicOeMzx3PGvnBBCfKIx0pkUJYnCamGPFaxYvZLsDRSEVuv7bIAbSBHZWgCCihAyASSMUIWqndhGxaUFxl-7eialBYwsqDXUS0HbAjYYr1-ZDFfxJx9h4z0qyBVUlbXJNbRg8GUtIS67uMk6z6pJfsw8LICdUkK2sRplTrTYA73RIsx0OqlgdelbX6aTt-adGm3Nd_y2WipUqYo_6JxBkikRiEkKRc7WSlMKqjSSsM9-IKZFZfhmfqGjgjr1jvha-98q_Hmq6tyKZUZkCcoRZXJvm3ThI9oZ-Yf-IsGVbbgdZi7YdhYxJbltC23YZrCTpPdyXKPAJkAmUg4DYUgm8E_WekGlZBgnXbwStXS_4LeN7OV0syFqyGpbTujeHOJz6RRpmp8BWacmYznvUGGxifqibu5_f1raogy1quZqLV4Jur41unrlzel_RUZLGqviXuQ7na48sv5S9DHocDMnpmmSIoKNc0aMRSsJfynWtPrXmas-IrnqHM7EPahbLbG3LzZsY55ZJcJ6G-xfUCvNg8qQ8_vSvDI6ApXvCpql7tXtQ8WoD4TuX95dOE_eHTwH4Jwd_QOvudvgk0Yrvg7j_zNQ3D0Nv7e34eH3XYXHK4r_rMh8B6Om32wO3hhGGy3O8_brzgm0pB-ap_15nW__gFWT9FR)

```mermaid
classDiagram

    destino -- departamento
    destino -- capacidad
    destino o-- parte
    complejo -- destino
    tipo_destino -- destino
    parte *--> "*" valor_consolidado 
    categoria <--valor_consolidado
    parte o--> "*" persona
    categoria "*" <--> "*"  persona
    categoria --> agrupamiento
   
   
   class destino {eager-load eager-load
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
        

    agrupamiento: +string tema

    class persona{
        +string nombre
        +string apellido
        +string genero
                }
     
```
