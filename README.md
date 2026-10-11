# City Farmac

Template del sitio de **City Farmac**, cadena de farmacias y perfumerías, con sitio público y panel de administración.
Trabajo práctico de Producción Web — **Parcial 1**: maquetado navegable con datos de ejemplo, **sin base de datos**.

## Requisitos

- PHP 8.1 o superior (viene incluido en XAMPP y en Laragon).
- Nada más para verlo funcionar: el CSS ya está compilado en `assets/css/app.css`.
- Conexión a internet para la tipografía (Nunito, desde Google Fonts). Sin conexión el sitio funciona igual, con la fuente del sistema.
- Solo si vas a **modificar estilos**: Node.js 20 o superior, con npm (ver [Estilos](#estilos-tailwind-css)).

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

Si la terminal responde que no reconoce `php`, es porque no está en el PATH. Usá la ruta completa al `php.exe` de tu instalación:

```powershell
# Laragon (la carpeta cambia según la versión de PHP instalada)
& "C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe" -S localhost:8000

# XAMPP
& "C:\xampp\php\php.exe" -S localhost:8000
```

En Laragon también podés agregarlo al PATH desde **Menu → Tools → Path → Add Laragon to Path** (hay que reabrir la terminal).

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
│   ├── helpers.php                 Funciones de ayuda (ver Helpers): url(), e(), vista(), que arma la página: vista + layout, y más.
│   └── modelos/                    MODELOS, uno por entidad, con las funciones obtener_*(). Nunca imprimen HTML ni leen $_GET.
├── datos/                          Datos de ejemplo: un archivo por "tabla" que devuelve un array. Solo los leen los modelos.
├── vistas/
│   ├── layouts/                    publico, admin (con menú lateral) y auth (login/registro). Únicos con <html>, <head>, header y footer.
│   ├── parciales/                  Piezas de los layouts: head, header, footer y sidebar-admin.
│   ├── componentes/                Piezas reutilizables: tarjeta-producto, ranking, alerta, estado-vacio, selector-estrellas, badge-estado, boton-accion, encabezado-seccion, campo-form, icono.
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

## Helpers

Las funciones de ayuda están en `app/helpers.php` y quedan disponibles en todo el proyecto al cargar `config.php`.

| Función | Para qué sirve | Quién la usa |
|---|---|---|
| `url($ruta)` | Arma una URL desde la raíz del proyecto, con `BASE_URL` adelante | Vistas |
| `e($texto)` | Escapa texto antes de mostrarlo en el HTML | Vistas |
| `numero($numero, $decimales)` | Formato argentino: `4.5` → `4,5` | Vistas |
| `precio($numero)` | Precio en pesos: `12345.5` → `$ 12.345,50` | Vistas |
| `fecha($fecha)` | `2026-08-12` → `12/08/2026` | Vistas |
| `ocultar_email($email)` | `laura.gomez@mail.com` → `la***@mail.com` | Vistas |
| `recortar($texto, $largo)` | Acorta un texto largo y agrega `…` | Vistas |
| `vista($nombre, $datos, $layout)` | Arma la página: la vista adentro de un layout (`publico` por defecto) | Controladores |
| `mostrar_404($layout)` | Responde 404, muestra la vista del sitio o la del panel (`'admin'`) y corta el controlador | Controladores |
| `alerta_simulada($texto)` | Alerta de éxito de las acciones simuladas del panel | Controladores |
| `buscar_por_id($lista, $id)` | Busca un elemento por su id, o devuelve `null` | Modelos |

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

**Componentes (temporal).** `componentes.php` es una guía de estilos con todos los componentes juntos.
Hay que borrarla antes de la entrega final, junto con `vistas/publico/componentes.php`.

**Formularios simulados.** El comentario del detalle y el formulario de contacto envían por POST a la misma página.
No guardan nada: solo muestran el mensaje de éxito. En el Parcial 2 se conectan a la base de datos.

### Panel de administración

| Página | URL | Parámetros opcionales |
|---|---|---|
| Iniciar sesión | `admin/login.php` | Al enviar entra directo al panel (simulado, sin validar). |
| Crear cuenta | `admin/registro.php` | — |
| Inicio del panel | `admin/index.php` | — |
| Productos | `admin/productos.php` | `categoria` (principal) y `subcategoria` (de esa principal) |
| Alta / edición de producto | `admin/producto-form.php` | `id` → modificar |
| Categorías | `admin/categorias.php` | `padre` → subcategorías de esa categoría |
| Alta / edición de categoría | `admin/categoria-form.php` | `id` → modificar; `padre` → nueva subcategoría |
| Marcas | `admin/marcas.php` | — |
| Alta / edición de marca | `admin/marca-form.php` | `id` → modificar |
| Comentarios | `admin/comentarios.php` | `estado` (`aprobados` o `pendientes`) y `producto` |
| Usuarios | `admin/usuarios.php` | — |
| Alta / edición de usuario | `admin/usuario-form.php` | `id` → modificar |
| Perfiles | `admin/perfiles.php` | — |
| Alta / edición de perfil | `admin/perfil-form.php` | `id` → modificar |

- Login y registro usan el layout `auth`, sin menú lateral. El resto usa el layout `admin`.
- Cada página tiene su vista con el mismo nombre en `vistas/admin/`.
- En los cinco formularios, un `id` que no existe responde 404 dentro del panel, con la vista `vistas/admin/404.php`.
- Los filtros inválidos se ignoran: por ejemplo, una subcategoría que no es de la principal elegida, o `estado=cualquiera`.

**Acciones simuladas.** "Guardar", "Activar/Inactivar" y "Aprobar/Desaprobar" envían por POST al mismo controlador.
No guardan nada: muestran una alerta que lo aclara. En cada controlador hay un comentario `PARCIAL 2:` que marca dónde irá la lógica real.

**Activos e inactivos.** Las funciones del modelo que terminan en `_admin` devuelven todos los registros.
Las del sitio público devuelven solo los activos o aprobados.
