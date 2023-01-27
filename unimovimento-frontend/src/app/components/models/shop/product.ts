export class Product {
    id: number;
    title: string;
    price: number;
    discount: number;
    image: [];
    timestamp: number;
    postdate: string;

    constructor(id: number, title: string, discount: number, price: number, image: [], timestamp: number, postdate: string,) {
        this.id = id;
        this.title = title;
        this.price = price;
        this.discount = discount;
        this.image = image;
        this.timestamp = timestamp;
        this.postdate = postdate;
    }
}
