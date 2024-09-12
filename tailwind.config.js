module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                'main': '#faf8f0'
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'], // Add Poppins as a custom font family
            },
        }
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
