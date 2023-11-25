if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/sw.js')
        .then((reg) => console.log('service Worker registered')) 
        .catch((err) => console.log('service Worker not registered'))
}