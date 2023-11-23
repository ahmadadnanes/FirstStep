// install service worker
self.addEventListener('install' , evt =>{
    console.log("service worker has been installed");
});

// activate service worker
self.addEventListener('active' , evt =>{
    console.log('service worker has been activated');
});

// fetch event 
self.addEventListener('fetch' , evt =>{
    console.log('fetch event' , evt);
})