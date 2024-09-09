import 'flowbite';
import './bootstrap';
import { createApp } from 'vue';
import intlTelInput from 'intl-tel-input';
import 'intl-tel-input/build/css/intlTelInput.css';

const app = createApp({});
app.mount('#app');

document.addEventListener('DOMContentLoaded', function () {

    // Select all phone inputs using querySelectorAll
    const phoneInputFields = document.querySelectorAll('.phone');

    // Loop through each input field
    phoneInputFields.forEach(function (phoneInputField) {
        var iti = intlTelInput(phoneInputField, {
            initialCountry: 'BW', // Set default country to Botswana
            preferredCountries: ['BW', 'ZA'], // Preferred countries
            separateDialCode: true, // Show dial code next to the number
            utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/js/utils.js',
            customPlaceholder: function (selectedCountryPlaceholder) {
                return 'e.g. ' + selectedCountryPlaceholder;
            },
            hiddenInput: function(telInputName) {
                return {
                    phone: phoneInputField.id
                };
            },
        });

        // Log changes in the input
        phoneInputField.addEventListener('input', function () {
            console.log(`Current input value (${phoneInputField.id}):`, iti.getNumber());
        });
    });
});
