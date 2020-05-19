# Icon Components for Laravel + Vue

A package to generate icon components from your Laravel projects.

```html
<hero-icon name="heart" class="w-5 h-5 text-red-500" />
<hero-icon name="heart" class="w-5 h-5 text-red-500" is-outline />
```

## Installation

You can install this package via composer:

```bash
compose require plmrlnsnts/heroicon-generator
```

Next, install the [heroicon](https://github.com/refactoringui/heroicons) library.

```bash
npm install heroicons
```

## Usage

This will generate all the ui components from the `heroicons` package.

```bash
php artisan heroicons:build
```

You may also specify a different path like so:

```bash
php artisan heroicons:build --path=js/HeroIcons
```

Finally, run this command to publish the asset files.

```bash
php artisan vendor:publish --tag=heroicons
```

## Javascript

Add this line to your `app.js` file to register these components "globally".

```diff
+ require('./heroicons.js');

const app = new Vue({
    el: '#app',
});
```

That's it! You can now use the `hero-icon` component anywhere in your Vue components.

```html
<template>
    <div>
        <hero-icon name="heart" class="w-5 h-5 text-red-500" />
        <hero-icon name="heart" class="w-5 h-5 text-red-500" is-outline />
    </div>
</template>
```