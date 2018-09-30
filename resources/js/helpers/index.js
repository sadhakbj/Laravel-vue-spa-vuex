export const route = (name, params = []) => {
    if (!apiRoutes.hasOwnProperty(name)) {
        throw Error(`Route ${name} not defined.`);
    }

    let url = apiRoutes[name];

    if (params.length === 0) {
        return url;
    }

    params.map(value => {
        url = url.replace(/{[A-Za-z0-9_?]+}/, value);
    });

    return url;
};
