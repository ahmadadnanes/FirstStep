if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/sw.js')
        .then((reg) => console.log('service Worker registered' , reg)) 
        .catch((err) => console.log('service Worker not registered' , err))
}