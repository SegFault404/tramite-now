import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Agregar imágenes dinámicamente
document.addEventListener('DOMContentLoaded', () => {
    const images = [
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/200',
        'https://via.placeholder.com/250',
    ];

    const gallery = document.getElementById('image-gallery');

    if (gallery) {
        images.forEach((url) => {
            const img = document.createElement('img');
            img.src = url;
            img.alt = 'Imagen cargada dinámicamente';
            img.style.width = '150px';
            img.style.margin = '10px';
            gallery.appendChild(img);
        });
    }
});
