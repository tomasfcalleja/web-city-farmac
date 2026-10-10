<?php
/*
 * Componente: botón de acción del panel (Activar, Inactivar, Aprobar...).
 * Necesita: $accion = [
 *     'id'       => 3,                  // id del registro
 *     'accion'   => 'inactivar',        // qué hacer (el controlador lo valida)
 *     'texto'    => 'Inactivar',        // texto visible del botón
 *     'etiqueta' => 'Inactivar Bayer',  // texto completo para lectores de pantalla
 * ]
 *
 * Es un formulario POST chico (cambiar datos nunca va por GET ni por un link).
 * No tiene action: un form sin action se envía a la URL actual, así el
 * listado vuelve con los mismos filtros que tenía.
 */
?>
<form method="post" class="inline">
    <input type="hidden" name="id" value="<?= (int) $accion['id'] ?>">
    <input type="hidden" name="accion" value="<?= e($accion['accion']) ?>">
    <button type="submit" class="btn-chico" aria-label="<?= e($accion['etiqueta']) ?>"><?= e($accion['texto']) ?></button>
</form>
