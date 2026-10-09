<div class="grid gap-10 lg:grid-cols-[1fr_28rem] lg:gap-16">
    <div>
        <h1 class="text-3xl md:text-4xl">Contáctenos</h1>
        <p class="mt-4 max-w-prose text-lg text-gris">
            ¿Tenés una consulta sobre un producto, querés ser proveedor o trabajar con nosotros?
            Escribinos y el área correspondiente te responde.
        </p>

        <dl class="mt-10 grid gap-6 sm:grid-cols-2">
            <div class="rounded-2xl bg-menta-50 p-6">
                <dt class="font-bold text-bosque-900">Sucursal central</dt>
                <dd class="mt-1 text-gris">Av. Corrientes 1234, CABA</dd>
            </div>
            <div class="rounded-2xl bg-menta-50 p-6">
                <dt class="font-bold text-bosque-900">Teléfono</dt>
                <dd class="mt-1"><a href="tel:+541145678900" class="enlace">(011) 4567-8900</a></dd>
            </div>
            <div class="rounded-2xl bg-menta-50 p-6">
                <dt class="font-bold text-bosque-900">Email</dt>
                <dd class="mt-1"><a href="mailto:hola@cityfarmac.com.ar" class="enlace">hola@cityfarmac.com.ar</a></dd>
            </div>
            <div class="rounded-2xl bg-menta-50 p-6">
                <dt class="font-bold text-bosque-900">Horarios</dt>
                <dd class="mt-1 text-gris">Lun. a sáb. de 8 a 22 h<br>Dom. de 10 a 20 h</dd>
            </div>
        </dl>
    </div>

    <!-- action con #formulario: al recargar, la página baja directo al mensaje -->
    <form id="formulario" action="<?= url('contacto.php') ?>#formulario" method="post" class="tarjeta scroll-mt-8 space-y-5">
        <h2 class="text-xl">Envianos tu consulta</h2>

        <?php include __DIR__ . '/../componentes/alerta.php'; ?>

        <div>
            <label for="contacto-nombre" class="etiqueta">Nombre y apellido</label>
            <input type="text" id="contacto-nombre" name="nombre" class="campo"
                   autocomplete="name" required minlength="3" maxlength="100">
        </div>

        <div>
            <label for="contacto-email" class="etiqueta">Email</label>
            <input type="email" id="contacto-email" name="email" class="campo"
                   autocomplete="email" placeholder="nombre@mail.com" required>
        </div>

        <div>
            <label for="contacto-telefono" class="etiqueta">Teléfono <span class="font-normal text-gris">(opcional)</span></label>
            <input type="tel" id="contacto-telefono" name="telefono" class="campo"
                   autocomplete="tel" placeholder="11 2345-6789">
        </div>

        <div>
            <label for="contacto-area" class="etiqueta">Área de la empresa</label>
            <select id="contacto-area" name="area" class="campo" required>
                <!-- value vacío + required: obliga a elegir una opción real -->
                <option value="">Elegí un área</option>
                <?php foreach ($areas as $area): ?>
                    <option value="<?= $area['id'] ?>"><?= e($area['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="contacto-comentario" class="etiqueta">Comentario</label>
            <textarea id="contacto-comentario" name="comentario" class="campo" rows="5"
                      required minlength="10" maxlength="1000"
                      aria-describedby="contacto-comentario-ayuda"></textarea>
            <p id="contacto-comentario-ayuda" class="mt-1 text-xs text-gris">Entre 10 y 1000 caracteres.</p>
        </div>

        <button type="submit" class="btn w-full">Enviar consulta</button>
    </form>
</div>
