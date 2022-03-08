# SoaPatrick

My Personal Website [SoaPatrick.com](https://www.soapatrick.com/) created with [Kirby](https://getkirby.com/) that uses [Vite](https://vitejs.dev/) with the [kirby-vite](https://github.com/arnoson/kirby-vite) plugin and [TailwindCSS](https://tailwindcss.com/).

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

## Content

The content folder is it's own repository (submodule). The repository for the content doesn't contain any media files. For the website to work, the latest content with all it's media files needs to be pulled through rsync from the production environment.

```
npm run content:pull
```
