/**
 * Conversor de unidades en JavaScript
 * Hecho con Vue.JS 2 + Bulma CSS
 * @author parzibyte
 */
const app = new Vue({
    el: '#app',
    data: () => ({
        baseSeleccionada: "10",
        binario: "",
        octal: "",
        decimal: "",
        hexadecimal: "",
        numero: "",
        // Lo siguiente controla únicamente el mensaje de notificación
        mostrarNotificacion: false,
    }),
    methods: {
        onBaseONumeroCambiado() {
            this.convertirDeDecimalALasDemasBases(parseInt(this.numero, this.baseSeleccionada));
        },
        /**
         * ¿Para qué hacer conversiones y muchos ifs, si
         * podemos convertir primero a decimal y de ahi a
         * las demás bases?
         */
        convertirDeDecimalALasDemasBases(numero) {
            if (!numero)
                return;
            this.binario = numero.toString("2");
            this.octal = numero.toString("8");
            this.decimal = numero.toString("10");
            this.hexadecimal = numero.toString("16");
        },
        /**
         * @see https://parzibyte.me/blog/2018/08/24/acceder-al-portapapeles-con-javascript/
         */
        copiarAlPortapapeles(texto) {
            if (!texto) return;
            if (!navigator.clipboard) {
                return this.copiarAlPortapapelesSiLaPrimeraOpcionFalla(texto);
            }
            navigator.clipboard.writeText(texto)
                .then(() => {
                    console.log("El texto ha sido copiado :-)");
                    this.indicarCopiadoExitoso();
                })
                .catch(error => {
                    // Por si el usuario no da permiso u ocurre un error
                    console.log("Hubo un error: ", error);
                    this.copiarAlPortapapelesSiLaPrimeraOpcionFalla(texto);
                });
        },
        copiarAlPortapapelesSiLaPrimeraOpcionFalla(texto) {
            prompt("Presiona CTRL + C para copiar, y luego presiona ENTER", texto);
            this.indicarCopiadoExitoso();
        },
        indicarCopiadoExitoso() {
            this.mostrarNotificacion = true;
            setTimeout(() => {
                this.mostrarNotificacion = false;
            }, 1000);
        }
    },
    /**
     * Vigilar si cambia la base o el número
     * @see https://parzibyte.me/blog/2018/11/05/watch-vue-js-2/
     */
    watch: {
        baseSeleccionada() {
            this.onBaseONumeroCambiado();
        },
        numero() {
            this.onBaseONumeroCambiado();
        }
    }
});