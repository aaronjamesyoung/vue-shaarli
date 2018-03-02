# vue-shaarli

A new way to browse your [Shaarli](https://github.com/shaarli/Shaarli) bookmarks.

On pageload, it lists **all** your Shaarli bookmarks. By default they will be sorted A-Z, but you
can choose to sort by Newest as well.

You can then type anything (link name, description, url, or tags) in the search bar and the links
will filter until it's easy for you to choose which one you want.

This is great for a browser start page.

## How does it get the links?

The Vue app makes a request to a PHP script that I've bundled in the `static` folder of this
repository. That PHP script will contain your Shaarli URL and API key. It implements one method of
the Shaarli API (getLinks) and simply asks Shaarli for all your links. This script will likely
reside at a publicly-accessible URL, so someone could use it to get a list of your Shaarli links.

Since you're running the PHP script on a server, your Shaarli API key will not be readable to the
world and no other API functionality is present in the script.

## Get it

Clone this repo, switch to the directory and run:

```
npm install
```

## Configure

Configuration is a work in progress and future updates may require you to redo your configuration
if you keep up.

At this point, there are just a couple files you need to edit.

## Build for production:

```
npm run build
```

After building, you'll have a `dist/` directory. Copy the contents of this directory wherever you
would like. Remember your server needs to be able to process PHP scripts.

## Next

Over time I'm hoping to work further with this to:

* better figure out static asset handling from within .vue components (https://github.com/BoltDoggy/parcel-plugin-vue/issues/5)
  * This is underway; at this point, any assets in /static will be copied to /dist/static while in dev mode or when building
* probably make it better, but who knows

This is currently mainly for my use but if you want to use it or tell me what I did wrong, that'd be much appreciated. Thanks!
