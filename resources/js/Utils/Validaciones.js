export class Validaciones {
    static product(value) {
        const regex = /^[a-zA-Z0-9 ]+$/;
        if (!regex.test(value)) {
            return "El campo producto solo puede contener letras, números y espacios en blanco";
        }
        return true;
    }
    static category(value) {
        const regex = /^[a-zA-Z ]+$/;
        if (!regex.test(value)) {
            return "El campo categoría solo puede contener letras y espacios en blanco";
        }
        return true;
    }
}