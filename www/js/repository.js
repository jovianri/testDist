class Repository {

    constructor(url = window.location.href + 'apiphp/') {
        this.url = url;
    }

    registro(urlRequested, callback, email, contraseña, nombre) {

        axios.post(this.url + urlRequested, {
            user: email,
            password: contraseña,
            name: nombre
        })
            .then((response) => {
                let datos = response.data;
                callback(datos.data);
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                console.log('Axios request executed');
            });


    }

    peticionAjax(urlRequested, callback) {

        axios.get(this.url + urlRequested)
            .then((response) => { // works fine
                let datos = response.data;
                // handle success
                // console.log(datos.data.data);
                callback(datos.data);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
                // console.log("There's a problem with axios");
            })
            .then(function () {
                console.log('Axios request executed');
                // always executed
            });


    }
}