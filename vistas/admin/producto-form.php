<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<!-- multipart/form-data: necesario para poder enviar un archivo (la imagen) -->
<form method="post" enctype="multipart/form-data" class="tarjeta max-w-3xl">
    <div class="grid gap-5 md:grid-cols-2">
        <?php
        $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre', 'valor' => $producto['nombre'] ?? '', 'requerido' => true,
                  'atributos' => ['maxlength' => 120]];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'modelo', 'etiqueta' => 'Modelo / presentación', 'valor' => $producto['modelo'] ?? '', 'requerido' => true,
                  'ayuda' => 'Ej: Caja x 20 comprimidos, 200 ml.', 'atributos' => ['maxlength' => 80]];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'marca_id', 'etiqueta' => 'Marca', 'tipo' => 'select', 'valor' => $producto['marca_id'] ?? '',
                  'requerido' => true, 'vacia' => 'Elegí una marca', 'opciones' => $opciones_marcas];
        include __DIR__ . '/../componentes/campo-form.php';
        ?>

        <!-- Select con <optgroup>: las subcategorías agrupadas por su categoría principal -->
        <div>
            <label for="campo-categoria_id" class="etiqueta">Categoría</label>
            <select id="campo-categoria_id" name="categoria_id" class="campo" required>
                <option value="">Elegí una categoría</option>
                <?php foreach ($grupos_categorias as $grupo): ?>
                    <optgroup label="<?= e($grupo['nombre']) ?>">
                        <?php foreach ($grupo['subcategorias'] as $subcategoria): ?>
                            <option value="<?= $subcategoria['id'] ?>" <?= ($producto['categoria_id'] ?? 0) === $subcategoria['id'] ? 'selected' : '' ?>>
                                <?= e($subcategoria['nombre']) ?><?= $subcategoria['activo'] ? '' : ' (inactiva)' ?>
                            </option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>

        <?php
        $campo = ['nombre' => 'precio', 'etiqueta' => 'Precio (en pesos)', 'tipo' => 'number', 'valor' => $producto['precio'] ?? '',
                  'requerido' => true, 'atributos' => ['min' => 0, 'step' => '0.01', 'inputmode' => 'decimal']];
        include __DIR__ . '/../componentes/campo-form.php';
        ?>

        <div class="flex items-end pb-2.5">
            <label class="flex cursor-pointer items-center gap-3 font-semibold">
                <input type="checkbox" name="destacado" value="1" class="size-5 accent-bosque-700"
                    <?= !empty($producto['destacado']) ? 'checked' : '' ?>>
                Producto destacado (aparece en la home)
            </label>
        </div>

        <div class="md:col-span-2">
            <?php
            $campo = ['nombre' => 'descripcion', 'etiqueta' => 'Descripción', 'tipo' => 'textarea', 'valor' => $producto['descripcion'] ?? '',
                      'requerido' => true, 'atributos' => ['minlength' => 10, 'maxlength' => 1000]];
            include __DIR__ . '/../componentes/campo-form.php';
            ?>
        </div>

        <div class="md:col-span-2">
            <label for="campo-imagen" class="etiqueta">Imagen</label>
            <div class="flex flex-wrap items-center gap-4">
                <?php if ($producto): ?>
                    <img src="<?= url('assets/img/productos/' . $producto['imagen']) ?>" alt="Imagen actual de <?= e($producto['nombre']) ?>"
                         width="96" height="96" class="size-24 rounded-xl border border-borde object-cover">
                <?php endif; ?>
                <div class="min-w-0 flex-1">
                    <!-- En el alta la imagen es obligatoria; al editar, si no se elige otra, queda la actual -->
                    <input type="file" id="campo-imagen" name="imagen" accept="image/*"
                           class="campo file:mr-4 file:rounded-full file:border-0 file:bg-menta-50 file:px-4 file:py-1.5 file:font-bold file:text-bosque-900"
                           aria-describedby="campo-imagen-ayuda" <?= $producto ? '' : 'required' ?>>
                    <p id="campo-imagen-ayuda" class="mt-1 text-xs text-gris">
                        <?= $producto ? 'Elegí un archivo solo si querés reemplazar la imagen actual.' : 'JPG, PNG o WebP.' ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex flex-wrap gap-3 border-t border-borde pt-6">
        <button type="submit" class="btn">Guardar</button>
        <a href="<?= url('admin/productos.php') ?>" class="btn-secundario">Cancelar</a>
    </div>
</form>
