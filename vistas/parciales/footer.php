<?php
/*
 * Parcial: pie del sitio público.
 */
?>
    <footer class="border-t border-borde bg-menta-50">
        <div class="mx-auto grid max-w-6xl gap-6 px-4 py-10 text-sm sm:grid-cols-3">
            <div>
                <p class="text-lg font-extrabold text-bosque-900">City Farmac</p>
                <p class="mt-1 text-gris">Farmacia y perfumería de tu barrio.</p>
            </div>
            <div>
                <h2 class="text-base">Contacto</h2>
                <address class="mt-1 not-italic text-gris">
                    Av. Corrientes 1234, CABA<br>
                    <a class="enlace" href="mailto:hola@cityfarmac.com.ar">hola@cityfarmac.com.ar</a>
                </address>
            </div>
            <div>
                <h2 class="text-base">Horarios</h2>
                <p class="mt-1 text-gris">Lunes a sábados de 8 a 22 h.<br>Domingos de 10 a 20 h.</p>
            </div>
        </div>
        <p class="border-t border-borde py-4 text-center text-xs text-gris">
            © <?= date('Y') ?> <?= e(NOMBRE_SITIO) ?>. Trabajo práctico de Producción Web.
        </p>
    </footer>
