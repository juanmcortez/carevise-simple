/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./app/Http/**/*.php",
        "./app/Models/**/*.php",
        "./config/**/*.php",
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.css',
        './resources/**/*.vue',
    ],
    theme: {
        colors: {
            "light": "#ebeeef",
            "dark": "#000e26",
            "primary": "#0c4473",
            "secondary": "#57a0d2",
            "accent": "#ed1ea7",
            "blue-grey": "#a5aebd",
            "light-grey": "#ababab",
            "dark-grey": "#4a4a4a",
            "light-fade": "#2d5976",
            "dark-fade": "#071c33",
            "danger": "#bb0000",
            "danger-dark": "#880000",
        },
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        forms,
        typography,
    ],
};
