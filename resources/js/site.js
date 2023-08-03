import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import ls from 'localstorage-slim';

document.addEventListener("DOMContentLoaded", function () {
    Livewire.start();
});

document.addEventListener('livewire:initialized', () => {
    console.log('livewire:initialized');

    document.addEventListener('js-set-localstorage', (data) => writeDataToStorage(data));



    // NOT TRIGGERING???????
    document.addEventListener('js-get-localstorage', (data) => console.log('called'));
    // get form name
    // check if form name is in localstorage
    // if yes, set form value
    // if no, do nothing


    // const data = readDataFromStorage('data');
    // if (data) {
    //     Livewire.emit('set-localstorage', data);
    // }
});

const writeDataToStorage = function (data) {
    console.log('🚀 ~ data:');
    const name = data.detail[0];
    const result = data.detail[1];

    ls.set(name, JSON.stringify(result), { encrypt: true });
}

const readDataFromStorage = function (name) {
    console.log('🚀 ~ name:', name);
    return ls.get(name, { decrypt: true });
}
