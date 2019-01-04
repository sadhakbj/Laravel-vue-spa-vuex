import Api from "../libs/Api";
import { route } from "../helpers";

/**
 * Class AuthService
 */
class AuthorService {
  /**
   * Add new author.
   * @param {Object} inputData
   */
  async create(inputData) {
    const response = await Api.post(route("api.authors.store"), inputData, {
      onUploadProgress: progressEvent => {
        console.log(progressEvent.loaded / progressEvent.total)
      }
    });

    return response.data;
  }
}

export default new AuthorService();
