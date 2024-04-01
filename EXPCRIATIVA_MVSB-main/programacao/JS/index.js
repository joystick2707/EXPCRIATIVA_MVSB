const PI = 3.14;

class Circulo{
    #raio;

    constructor(raio) {
        this.raio = raio;
    }

    set raio(valor) {
        this.raio = Math.abs(valor);
    }

    get raio(){
        return this.#raio;
    }

    get perimetro() {
        return 2 * PI * this.raio;
    }

    get perimetro() {
        return PI * this.raio;
    }
}

const c1 = new Circulo(5);
console.log(c1.area);   