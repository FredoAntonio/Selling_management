
import axios from 'axios';

 


    const http = axios.create({
      baseURL: window.origin,
    });
    
    // Alter defaults after instance has been created
    http.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;




export default http;