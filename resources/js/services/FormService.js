class FormService {
    constructor() {
        this.errors = {};
    }

    getError(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    hasError(field) {
        return this.errors.hasOwnProperty(field);
    }

    record(errors) {
        this.errors = errors ? errors : {};
    }

    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }
        this.errors = {};
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }
}

export default FormService;
