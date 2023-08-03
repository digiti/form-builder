import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import ls from 'localstorage-slim';

document.addEventListener("DOMContentLoaded", function () {
    Livewire.start();
});

document.addEventListener('livewire:init', () => {
    Livewire.on('js-set-localstorage', (data) => writeDataToStorage(data));
    Livewire.on('js-get-localstorage', ([data]) => readDataFromStorage(data));

    Livewire.on('log', (data) => console.log(data));
    // $this->dispatch('log', 'mount hasValue');
});

const writeDataToStorage = function (data) {
    const name = data[0];
    const result = data[1];

    ls.set(name, JSON.stringify(result), { encrypt: true });
}

const readDataFromStorage = function (name) {
    const storedData = JSON.parse(ls.get(name, { decrypt: true }));

    if (storedData) {
        setTimeout(() => {
            Livewire.dispatch('get-localstorage', [storedData]);
        });

    }
}
