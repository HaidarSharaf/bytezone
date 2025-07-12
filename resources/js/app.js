import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm.js';

window.Alpine = Alpine;

Livewire.start({
    prefetch: {
        enabled: true,
        delay: 500,
        throttle: 500
    }
});
