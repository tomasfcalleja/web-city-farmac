<?php
/*
 * Componente: campo de formulario (label + control + ayuda opcional).
 * Necesita: $campo = [
 *     'nombre'    => 'precio',          // name del campo (el id se arma como "campo-precio")
 *     'etiqueta'  => 'Precio',          // texto del <label>
 * ]
 * Opcional:
 *     'tipo'      => 'text' (por defecto), 'email', 'number', 'password', 'textarea' o 'select'
 *     'valor'     => valor actual (al editar)
 *     'requerido' => true                → agrega required
 *     'ayuda'     => 'Texto de ayuda'    → se conecta al campo con aria-describedby
 *     'atributos' => ['min' => 0, 'step' => '0.01', 'autocomplete' => 'email', ...]
 *     'opciones'  => [['valor' => 1, 'texto' => 'Bayer'], ...]   (solo para select)
 *     'vacia'     => 'Elegí una marca'   → primera opción sin valor (solo para select)
 *
 * Ej: $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre', 'valor' => $marca['nombre'] ?? '', 'requerido' => true];
 *     include __DIR__ . '/../componentes/campo-form.php';
 */
$tipo_campo = $campo['tipo'] ?? 'text';
$id_campo = 'campo-' . $campo['nombre'];
$valor_campo = (string) ($campo['valor'] ?? '');
?>
<div>
    <label for="<?= e($id_campo) ?>" class="etiqueta"><?= e($campo['etiqueta']) ?></label>

    <?php if ($tipo_campo === 'textarea'): ?>
        <textarea id="<?= e($id_campo) ?>" name="<?= e($campo['nombre']) ?>" class="campo" rows="4"
            <?php foreach ($campo['atributos'] ?? [] as $atributo => $valor_atributo): ?> <?= e($atributo) ?>="<?= e($valor_atributo) ?>"<?php endforeach; ?>
            <?= !empty($campo['requerido']) ? 'required' : '' ?>
            <?= !empty($campo['ayuda']) ? 'aria-describedby="' . e($id_campo) . '-ayuda"' : '' ?>><?= e($valor_campo) ?></textarea>

    <?php elseif ($tipo_campo === 'select'): ?>
        <select id="<?= e($id_campo) ?>" name="<?= e($campo['nombre']) ?>" class="campo"
            <?= !empty($campo['requerido']) ? 'required' : '' ?>
            <?= !empty($campo['ayuda']) ? 'aria-describedby="' . e($id_campo) . '-ayuda"' : '' ?>>
            <?php if (!empty($campo['vacia'])): ?>
                <option value=""><?= e($campo['vacia']) ?></option>
            <?php endif; ?>
            <?php foreach ($campo['opciones'] ?? [] as $opcion): ?>
                <option value="<?= e($opcion['valor']) ?>" <?= (string) $opcion['valor'] === $valor_campo ? 'selected' : '' ?>>
                    <?= e($opcion['texto']) ?>
                </option>
            <?php endforeach; ?>
        </select>

    <?php else: ?>
        <input type="<?= e($tipo_campo) ?>" id="<?= e($id_campo) ?>" name="<?= e($campo['nombre']) ?>" class="campo"
               value="<?= e($valor_campo) ?>"
            <?php foreach ($campo['atributos'] ?? [] as $atributo => $valor_atributo): ?> <?= e($atributo) ?>="<?= e($valor_atributo) ?>"<?php endforeach; ?>
            <?= !empty($campo['requerido']) ? 'required' : '' ?>
            <?= !empty($campo['ayuda']) ? 'aria-describedby="' . e($id_campo) . '-ayuda"' : '' ?>>
    <?php endif; ?>

    <?php if (!empty($campo['ayuda'])): ?>
        <p id="<?= e($id_campo) ?>-ayuda" class="mt-1 text-xs text-gris"><?= e($campo['ayuda']) ?></p>
    <?php endif; ?>
</div>
