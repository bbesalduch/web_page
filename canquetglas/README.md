# Hotel Can Quetglas - Tema WordPress

Tema de WordPress elegante y minimalista para Hotel Can Quetglas, un hotel boutique en Palma de Mallorca.

## Instalación

1. **Subir el tema**
   - Descarga la carpeta `canquetglas`
   - Súbela a `wp-content/themes/` en tu instalación de WordPress
   - O usa el panel de WordPress: Apariencia → Temas → Añadir nuevo → Subir tema

2. **Activar el tema**
   - Ve a Apariencia → Temas
   - Busca "Hotel Can Quetglas" y haz clic en "Activar"

3. **Crear las páginas necesarias**
   El tema necesita las siguientes páginas (créalas desde Páginas → Añadir nueva):

   | Página | Slug | Plantilla |
   |--------|------|-----------|
   | El Hotel | `el-hotel` | El Hotel |
   | Habitaciones | `habitaciones` | Habitaciones |
   | Pool Bar | `pool-bar` | Pool Bar |
   | Galería | `galeria` | Galería |
   | Contacto | `contacto` | Contacto |

4. **Configurar la página de inicio**
   - Ve a Ajustes → Lectura
   - Selecciona "Una página estática"
   - En "Página de inicio" selecciona cualquier página (el tema usa front-page.php automáticamente)

## Configuración del Tema

### Personalizar (Apariencia → Personalizar)

- **Información del Hotel**: Teléfono, email, dirección, URL de reservas
- **Redes Sociales**: Instagram, Facebook, TripAdvisor
- **Hero**: Imagen o video de fondo para la portada
- **Google Maps**: Código embed del mapa

### Habitaciones

1. Ve al menú lateral → Habitaciones → Añadir nueva
2. Completa:
   - Título (nombre de la habitación)
   - Contenido (descripción)
   - Imagen destacada
   - Detalles: tamaño, capacidad, tipo de cama, precio, características

### Galería

1. Ve al menú lateral → Galería → Añadir imagen
2. Pon un título y añade la imagen destacada
3. Asigna una categoría si quieres filtros (Hotel, Habitaciones, Piscina, etc.)

## Estructura de Archivos

```
canquetglas/
├── assets/
│   ├── images/          # Imágenes placeholder (reemplazar con las reales)
│   └── js/
│       └── main.js      # JavaScript principal
├── page-templates/
│   ├── template-el-hotel.php
│   ├── template-habitaciones.php
│   ├── template-pool-bar.php
│   ├── template-galeria.php
│   └── template-contacto.php
├── 404.php
├── footer.php
├── front-page.php       # Página de inicio
├── functions.php        # Funciones del tema
├── header.php
├── index.php
├── page.php
├── screenshot.svg
├── single-room.php      # Detalle de habitación
└── style.css           # Estilos principales
```

## Imágenes Recomendadas

Añade tus fotos profesionales en `assets/images/`:

- `hero-placeholder.jpg` - 1920x1080px (imagen principal de portada)
- `room-placeholder.jpg` - 800x600px (habitaciones)
- `gallery-placeholder.jpg` - 600x600px (galería)
- `poolbar-placeholder.jpg` - 800x600px (pool bar)

## Colores del Tema

- Negro principal: `#0a0a0a`
- Dorado: `#c9a962`
- Blanco: `#ffffff`
- Gris texto: `#888888`

## Soporte

Para cualquier duda, contacta con info@hotelcanquetglas.com
