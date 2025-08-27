<?php
// Ejecutar comandos artisan desde un hosting sin SSH
$output = shell_exec('php ../Puppets/artisan config:clear && php ../Puppets/artisan config:cache && php ../Puppets/artisan route:cache && php ../Puppets/artisan view:clear');
echo "<pre>$output</pre>";
