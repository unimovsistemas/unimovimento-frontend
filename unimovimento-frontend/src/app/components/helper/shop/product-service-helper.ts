import { Observable, Subject } from 'rxjs';
import { Product } from '../../models/shop/product';

export class ProductServiceHelper {
    // Cart
    private storageSub = new Subject<String>();
    public watchStorage(): Observable<String> {
        return this.storageSub.asObservable();
    }
    protected getProductsObject( products: Product[] ){
        let storage = this.getProductsFromStorage(),
            items: string[];
            if (storage != null && storage != '') {
                 items = JSON.parse(storage);

                return products.filter((product: Product) => {
                    return items.includes(product.id.toString());
                });
            }
            return [];
    } 
    protected addProductToStorage(id: number) {

        let storage = this.getProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);
            items.push(id.toString());
            localStorage.setItem('sacreva_cart', JSON.stringify(items));
            this.storageSub.next(JSON.stringify(storage));
        } else {
            localStorage.setItem('sacreva_cart', JSON.stringify([id.toString()]));
            this.storageSub.next(JSON.stringify(storage));
        }

    }

    protected getProductsFromStorageById(id: number) {
        let storage = this.getProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);

            items = items.filter((item: string) => {
                return parseInt(item) == id;
            });
            return items
        }
        return [];
    }

    protected decrementQuantityFromStorage( id: number ){

        let storage = this.getProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);
            
            items.splice( items.indexOf( id.toString() ), 1 );

            localStorage.setItem('sacreva_cart', JSON.stringify(items));
            this.storageSub.next(JSON.stringify(items));

        }

    }

    protected deleteProductFromStorage(id: number) {

        let storage = this.getProductsFromStorage(),
            items: string[],
            itemsToDelete;
        if (storage != null && storage != '') {

            items = JSON.parse(storage);

            itemsToDelete = this.getProductsFromStorageById(id);

            itemsToDelete.forEach((item: string) => items.splice(items.findIndex((e: string) => e == item), 1));
            localStorage.setItem('sacreva_cart', JSON.stringify(items));

            this.storageSub.next(JSON.stringify(items));

        }

    }
    protected getProductsFromStorage() {
        return localStorage.getItem('sacreva_cart') != null ? localStorage.getItem('sacreva_cart') : '';
    }
    protected getProductsLengthFromStorage() {
        let storage = this.getProductsFromStorage();
        return (storage != null && storage != '') ? JSON.parse(storage).length : 0;
    }
    // Wishlist
    protected getWishlistProductsObject( products: Product[] ){
        let storage = this.getWishlistProductsFromStorage(),
            items: string[];
            if (storage != null && storage != '') {
                 items = JSON.parse(storage);

                return products.filter((product: Product) => {
                    return items.includes(product.id.toString());
                });
            }
            return [];
    }
    protected addWishlistProductToStorage(id: number) {

        let storage = this.getWishlistProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);
            items.push(id.toString());
            localStorage.setItem('sacreva_wishlist', JSON.stringify(items));
            this.storageSub.next(JSON.stringify(storage));
        } else {
            localStorage.setItem('sacreva_wishlist', JSON.stringify([id.toString()]));
            this.storageSub.next(JSON.stringify(storage));
        }

    }

    protected getWishlistProductsFromStorageById(id: number) {
        let storage = this.getWishlistProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);

            items = items.filter((item: string) => {
                return parseInt(item) == id;
            });
            return items
        }
        return [];
    }

    protected decrementWishlistQuantityFromStorage( id: number ){

        let storage = this.getWishlistProductsFromStorage(),
            items;
        if (storage != null && storage != '') {
            items = JSON.parse(storage);
            
            items.splice( items.indexOf( id.toString() ), 1 );

            localStorage.setItem('sacreva_wishlist', JSON.stringify(items));
            this.storageSub.next(JSON.stringify(items));

        }

    }

    protected deleteWishlistProductFromStorage(id: number) {

        let storage = this.getWishlistProductsFromStorage(),
            items: string[],
            itemsToDelete;
        if (storage != null && storage != '') {

            items = JSON.parse(storage);

            itemsToDelete = this.getWishlistProductsFromStorageById(id);

            itemsToDelete.forEach((item: string) => items.splice(items.findIndex((e: string) => e == item), 1));
            localStorage.setItem('sacreva_wishlist', JSON.stringify(items));

            this.storageSub.next(JSON.stringify(items));

        }

    }
    protected getWishlistProductsFromStorage() {
        return localStorage.getItem('sacreva_wishlist') != null ? localStorage.getItem('sacreva_wishlist') : '';
    }
    
    protected getWishlistProductsLengthFromStorage() {
        let storage = this.getWishlistProductsFromStorage();
        return (storage != null && storage != '') ? JSON.parse(storage).length : 0;
    }

}
