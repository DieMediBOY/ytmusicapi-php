<?php
// Asegúrate de incluir el autoload de Composer
require __DIR__ . '/vendor/autoload.php';

// Importa la clase YTMusic desde el espacio de nombres correcto
use Ytmusicapi\YTMusic;

// Verifica si se proporciona el parámetro videoId en la URL
if (isset($_GET['videoId'])) {
    try {
        // Inicializa la clase YTMusic
        $yt = new YTMusic();
        // Obtén información de la canción
        $songInfo = $yt->get_song_info($_GET['videoId']);
        // Devuelve la información en formato JSON
        header('Content-Type: application/json');
        echo json_encode($songInfo);
    } catch (Exception $e) {
        // Maneja cualquier error y devuélvelo en formato JSON
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'videoId parameter is missing']);
}
