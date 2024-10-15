<?php
// Asegúrate de incluir el autoload de Composer
require 'vendor/autoload.php';

use Ytmusicapi\YTMusic;

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
