# ajy-vue-parcel-template

A very much work-in-progress starting point for a Vue app using Parcel.

* <https://vuejs.org/>
* <https://parceljs.org/>

It uses parcel-plugin-vue and is based primarily on the demo prepared by the author of that package:

* <https://github.com/BoltDoggy/parcel-plugin-vue>
* <https://github.com/BoltDoggy/parcel-vue-demo>

It includes eslint, node-sass, and the Vue router. It also includes husky, with a pre-commit script
to run prettier.

## Get it

Clone this repo, switch to the directory and run:

```
npm install
```

Develop by running one of these two commands:

```
npm run dev
```

Build for production:

```
npm run build
```

## Next

Over time I'm hoping to work further with this to:

* better figure out static asset handling from within .vue components (https://github.com/BoltDoggy/parcel-plugin-vue/issues/5)
  * This is underway; at this point, any assets in /static will be copied to /dist/static while in dev mode or when building
* probably make it better, but who knows

This is currently mainly for my use but if you want to use it or tell me what I did wrong, that'd be much appreciated. Thanks!
