import axios from 'axios';

const config = {
    baseURL: window.__ENV__.base_url,
    timeout: window.__ENV__.http_timeout,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
};

const http = axios.create(config);

export const restaurant = {
    list: (config = null) => {
        return http.get('/api/restaurant', config);
    },
    favorite: (restaurant_name) => {
        return http.post(`/api/restaurant/${restaurant_name}/favorite`);
    },
    unfavorite: (restaurant_name) => {
        return http.delete(`/api/restaurant/${restaurant_name}/favorite`);
    },
}
