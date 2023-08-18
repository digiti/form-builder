import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import ls from 'localstorage-slim';

document.addEventListener("DOMContentLoaded", function () {
    Livewire.start();
});

document.addEventListener('livewire:init', () => {
    Livewire.on('js-set-values-localstorage', (data) => writeDataToStorage(data));
    Livewire.on('js-get-values-localstorage', ([data]) => readDataFromStorage(data));

    Livewire.on('js-set-result-localstorage', (data) => writeResultToStorage(data));
    Livewire.on('js-get-result-localstorage', (data) => readResultFromStorage(data));

    Livewire.on('log', (data) => console.log(data));
    // $this->dispatch('log', 'mount hasValue');
});


const writeDataToStorage = function (data) {
    const name = data[0];
    const result = data[1];

    ls.set(name, result, { encrypt: true });
}

const readDataFromStorage = function (keys) {
    let data = {};

    keys.forEach((key) => {
        const value = ls.get(key, { decrypt: true });

        if (value) {
            data[key] = ls.get(key, { decrypt: true });
        }
    });

    if (data) {
        setTimeout(() => {
            Livewire.dispatch('get-values-localstorage', [data]);
        });

    }
}

//
// Result LocalStorage
//
const writeResultToStorage = function (data) {
    const name = data[0];
    const result = data[1];

    ls.set(name, JSON.stringify(result), { encrypt: true });
}

const readResultFromStorage = function (name) {
    const storedData = JSON.parse(ls.get(name, { decrypt: true }));

    if (storedData) {
        setTimeout(() => {
            Livewire.dispatch('get-result-localstorage', [storedData]);
        });

    }
}
