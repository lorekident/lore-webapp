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
            }
        }
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
