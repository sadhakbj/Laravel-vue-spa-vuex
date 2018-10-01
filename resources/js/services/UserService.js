import Api from "../libs/Api";
import { route } from "../helpers/index";
/**
 * User service class.
 */
class UserService {
    /**
     * Get all users.
     */
    async getAllUsers() {
        let response = await Api.get(route("api.users.list"));

        return response.data;
    }
}

export default new UserService();
