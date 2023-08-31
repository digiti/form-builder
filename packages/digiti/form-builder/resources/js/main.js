import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import ls from 'localstorage-slim';

document.addEventListener("DOMContentLoaded", function () {
    Livewire.start();
});

// document.addEventListener('livewire:init', () => {
//     Livewire.on('js-set-values-localstorage', (data) => writeDataToStorage(data));
//     Livewire.on('js-get-values-localstorage', ([data]) => readDataFromStorage(data));

//     Livewire.on('js-set-result-localstorage', (data) => writeResultToStorage(data));
//     Livewire.on('js-get-result-localstorage', (data) => readResultFromStorage(data));

//     Livewire.on('log', (data) => console.log(data));
//     // $this->dispatch('log', 'mount hasValue');
// });


// const writeDataToStorage = function (data) {
//     const name = data[0];
//     const result = data[1];

//     ls.set(name, result, { encrypt: true });
//     //setCookie(name, result); //unsecured cookie
// }

// const readDataFromStorage = function (keys) {
//     let data = {};

//     keys.forEach((key) => {
//         const value = ls.get(key, { decrypt: true });

//         if (value) {
//             data[key] = ls.get(key, { decrypt: true });
//         }
//     });

//     if (data) {
//         setTimeout(() => {
//             // TODO: Currently not sending data to PHP because it is breaking stuff
//             Livewire.dispatch('get-values-localstorage', [data]);
//         });

//     }
// }

// //
// // Result LocalStorage
// //
// const writeResultToStorage = function (data) {
//     const name = data[0];
//     const result = data[1];

//     ls.set(name, JSON.stringify(result), { encrypt: true });
//     //setCookie(name, result); //unsecured cookie
// }

// const readResultFromStorage = function (name) {
//     const storedData = JSON.parse(ls.get(name, { decrypt: true }));

//     if (storedData) {
//         setTimeout(() => {
//             Livewire.dispatch('get-result-localstorage', [storedData]);
//         });

//     }
// }

// //
// // Store Cookie
// //

// const setCookie = function (name,value,days) {
//     var expires = "";
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime() + (days*24*60*60*1000));
//         expires = "; expires=" + date.toUTCString();
//     }
//     document.cookie = name + "=" + (value || "")  + expires + "; path=/";
//  }
