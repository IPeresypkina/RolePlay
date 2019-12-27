import axios from "axios";

/**
 * HTTP компонент для отправки запросов по REST API
 * @type {AxiosInstance}
 */
export const HTTP = axios.create({
    baseURL: 'http://127.0.0.1:50002/api',
    headers: {
        'Content-Type': 'application/json'
    }
});

export default HTTP;