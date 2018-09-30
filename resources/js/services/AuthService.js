import Api from "../libs/Api";
import { route } from "../helpers";

class AuthService {
    async login(credentials) {
        const response = await Api.post(route("api.login"), credentials);

        return response.data;
    }
}

export default new AuthService();
