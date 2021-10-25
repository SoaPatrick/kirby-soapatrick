# SoaPatrickTen

## Features

- Personal Website created with [Kirby](https://getkirby.com/)
- Uses [Vite](https://vitejs.dev/) with [kirby-vite](https://github.com/arnoson/kirby-vite) plugin
- Multiple pages
- Live Reloading for Kirby templates, snippets, content, ... changes
- [Public folder structure](https://getkirby.com/docs/guide/configuration#custom-folder-setup__public-folder-setup)

## Installation

Clone this repository and run:

```
composer install
```

```
npm install
```

## Development

Start vite's dev server and a simple php dev server by running:

```
npm run dev
```

Visit `localhost:8888` in the browser. Vite's dev server (`localhost:3000`) is only used for serving js, css and assets.

## Production

Build optimized frontend assets to `public/dist`:

```
npm run build
```

## Deployment

Deploy public and site folder to server through rsync

```
npm run deploy
```
