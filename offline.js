const staticCacheName='whitecabcache'
const assets=[
  '/',
  '/404.html',
  '/app.js',
  '/bookingSubmit.js',
  '/bookQuote.js',
  '/head.css',
  '/index.html',
  '/locations.html',
  '/locationStyle.css',
  '/manaliPackages.html',
  '/menu.gif',
  '/shimlaPackages.html',
  '/style.css'
]

//install event
self.addEventListener('install', evt => {
  evt.waitUntil(
    caches.open(staticCacheName).then( cache => {
      console.log('caching cell assets');
        cache.addAll(assets)
    })
  )

})

//activate event
self.addEventListener('activate', evt => {
  console.log('service worker activated');
})

//fetch event
self.addEventListener('fetch', evt => {
  console.log('fetch Event', evt);
})