import Http from "axios";

class Api {
    async get(url, params = {}) {
        const options = {
            params
        };

        const response = await Http.get(url, options);

        return response;
    }

    /**
     *
     * @param {String} url
     * @param {*} data
     * @param {*} header
     */
    async post(url, data, header = {}) {
        const options = {
            header
        };
        const response = await Http.post(url, data, options);

        return response;
    }
}

export default new Api();
