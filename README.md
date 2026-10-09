# City Farmac

Template del sitio de **City Farmac**, cadena de farmacias y perfumerías, con sitio público y panel de administración.
Trabajo práctico de Producción Web — **Parcial 1**: maquetado navegable con datos de ejemplo, **sin base de datos**.

## Requisitos

- PHP 8.1 o superior (viene incluido en XAMPP y en Laragon).
- Nada más para verlo funcionar: el CSS ya está compilado en `assets/css/app.css`.
- Solo si vas a **modificar estilos**: Node.js 18 o superior, con npm (ver [Estilos](#estilos-tailwind-css)).

## Cómo levantarlo

### Opción A — XAMPP o Laragon

1. Copiá la carpeta del proyecto dentro de `htdocs/` (XAMPP) o `www/` (Laragon). Puede ir en cualquier subcarpeta, por ejemplo `htdocs/facultad/city-farmac/`.
2. Iniciá Apache.
3. Abrí en el navegador `http://localhost/facultad/city-farmac/`.

### Opción B — Servidor interno de PHP

Desde la raíz del proyecto:

```bash
php -S localhost:8000
```

Y abrí `http://localhost:8000/`.

## Ruta base (BASE_URL)

Todos los links, estilos e imágenes se arman con la función `url()`, que antepone la constante `BASE_URL`.
Por eso el sitio funciona sin importar en qué carpeta esté.

`BASE_URL` se calcula sola en **`config.php`**: compara la carpeta del proyecto con la carpeta raíz del servidor (`DOCUMENT_ROOT`).
Si en algún servidor no funcionara, descomentá esta línea en `config.php` y poné la ruta a mano:

```php
// define('BASE_URL', '/city-farmac/');
```

> Evitá espacios y tildes en el nombre de las carpetas.

## Estructura: tres capas

El código está separado en **modelo** (los datos), **controlador** (qué pasa en cada URL) y **vista** (el HTML).

```
├── index.php, productos.php, ...   CONTROLADORES del sitio: leen $_GET, piden datos al modelo y llaman a vista(). Nunca escriben HTML.
├── admin/*.php                     CONTROLADORES del panel (mismas reglas).
├── config.php                      BASE_URL y nombre del sitio; carga helpers y modelos (cada controlador hace un solo require).
├── app/
│   ├── helpers.php                 url(), e(), precio() y vista(), que arma la página: vista + layout.
│   └── modelos/                    MODELOS, uno por entidad, con las funciones obtener_*(). Nunca imprimen HTML ni leen $_GET.
├── datos/                          Datos de ejemplo: un archivo por "tabla" que devuelve un array. Solo los leen los modelos.
├── vistas/
│   ├── layouts/                    publico, admin (con menú lateral) y auth (login/registro). Únicos con <html>, <head>, header y footer.
│   ├── parciales/                  Piezas de los layouts: head, header, footer y sidebar-admin.
│   ├── componentes/                Piezas reutilizables: tarjeta-producto, ranking, alerta, estado-vacio.
│   ├── publico/                    VISTAS del sitio: solo HTML, foreach, if y e(). Nunca llaman al modelo ni leen $_GET.
│   └── admin/                      VISTAS del panel (mismas reglas).
├── assets/                         css/ (input.css → app.css), js/app.js, img/
└── package.json                    Scripts de npm para compilar Tailwind.
```

Así viaja una petición, por ejemplo `producto.php?id=4`:

1. **El controlador `producto.php`:**
   - lee el `id` de la URL;
   - le pide el producto al modelo con `obtener_producto(4)`;
   - si no existe, responde 404.
2. **El modelo** (`app/modelos/productos.php`) busca el producto en `datos/productos.php`.
   En el Parcial 2 hará una consulta SQL y devolverá lo mismo.
3. **El controlador** llama a `vista('publico/producto', ['producto' => $producto, ...])`.
4. **`vista()`:**
   - arma el HTML de `vistas/publico/producto.php`;
   - lo pone dentro de `vistas/layouts/publico.php`, que agrega `<head>`, header y footer.

## Estilos (Tailwind CSS)

- Los estilos se escriben en `assets/css/input.css`. Los colores y la tipografía están en el bloque `@theme`.
- Las páginas cargan el archivo compilado `assets/css/app.css`. No se usa Tailwind por CDN.
- `app.css` **se sube a Git**, para que el sitio funcione sin instalar nada.

```bash
npm install      # una sola vez: instala Tailwind en node_modules/ (no se sube a Git)
npm run dev      # mientras trabajás: recompila cada vez que guardás un archivo
npm run build    # antes de entregar o commitear: genera app.css minificado
```

Tailwind revisa todos los archivos del proyecto (salvo lo que está en `.gitignore`) y genera solo las clases que se usan.
Si agregás clases nuevas, tiene que estar corriendo `npm run dev`, o tenés que correr `npm run build` después.

## Páginas

Las URLs son relativas a la ruta base (por ejemplo `http://localhost:8000/`).

### Sitio público

| Página | URL | Vista |
|---|---|---|
| Inicio | `index.php` | `vistas/publico/inicio.php` |
| Listado de productos | `productos.php` (ver filtros abajo) | `vistas/publico/productos.php` |
| Detalle de producto | `producto.php?id=1` (id inexistente o producto inactivo → 404) | `vistas/publico/producto.php` |
| Contacto | `contacto.php` | `vistas/publico/contacto.php` |
| Página no encontrada | `404.php` | `vistas/publico/404.php` |
| Componentes (temporal) | `componentes.php` | `vistas/publico/componentes.php` |

**Filtros del listado.** Son parámetros GET opcionales y se pueden combinar:

| Parámetro | Valores | Ejemplo |
|---|---|---|
| `categoria` | id de categoría. Si es principal, incluye sus subcategorías | `productos.php?categoria=3` |
| `marca` | id de marca | `productos.php?marca=4` |
| `orden` | `destacados` (por defecto), `ranking`, `az`, `za` | `productos.php?categoria=2&orden=ranking` |

Un valor inválido se ignora: `orden=cualquiera` vuelve a `destacados`, y `categoria=abc` significa "sin filtro".

**Formularios simulados.** El comentario del detalle y el formulario de contacto envían por POST a la misma página.
No guardan nada: solo muestran el mensaje de éxito. En el Parcial 2 se conectan a la base de datos.

### Panel de administración

| Página | URL | Layout |
|---|---|---|
| Iniciar sesión | `admin/login.php` | auth |
| Crear cuenta | `admin/registro.php` | auth |
| Inicio del panel | `admin/index.php` | admin |
| Productos | `admin/productos.php` | admin |
| Alta / edición de producto | `admin/producto-form.php` | admin |
| Categorías | `admin/categorias.php` | admin |
| Alta / edición de categoría | `admin/categoria-form.php` | admin |
| Marcas | `admin/marcas.php` | admin |
| Alta / edición de marca | `admin/marca-form.php` | admin |
| Comentarios | `admin/comentarios.php` | admin |
| Usuarios | `admin/usuarios.php` | admin |
| Alta / edición de usuario | `admin/usuario-form.php` | admin |
| Perfiles | `admin/perfiles.php` | admin |
| Alta / edición de perfil | `admin/perfil-form.php` | admin |

Cada página del panel tiene su vista con el mismo nombre en `vistas/admin/`.
