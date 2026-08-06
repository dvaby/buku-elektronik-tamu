import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import './page-transition';
import './dashboard-chart';

Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();