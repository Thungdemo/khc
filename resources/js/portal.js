import './bootstrap';
import 'bootstrap';
import Chocolat from 'chocolat';
import 'chocolat/dist/css/chocolat.css';

Chocolat(document.querySelectorAll('.chocolat-parent .chocolat-image'),{
  imageSize: 'contain',
  overlayColor: 'rgba(0, 0, 0, 0.9)'
});

