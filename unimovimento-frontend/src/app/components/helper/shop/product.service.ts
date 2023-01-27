import { Injectable } from '@angular/core';
import { Product } from '../../models/shop/product';

import { ProductServiceHelper } from './product-service-helper';
import productblock from '../../data/shop/shop.json';

@Injectable({
  providedIn: 'root'
})
export class ProductService extends ProductServiceHelper {

  public products = productblock;
  // Return all products from object
  getProducts(): Product[] {
    return this.products
  } 
  // Add item to cart
  addToCart( product: Product ){
    this.addProductToStorage( product.id );
  } 
  // Delete item from cart
  deleteFromCart( product: Product ){
    this.deleteProductFromStorage( product.id );
  } 
  // Remove a single quantity of an item from cart
  decrementQuantity( product: Product ){
      this.decrementQuantityFromStorage( product.id );
  }
  // Return the count of items in the cart
  getProductsCountInCart(){
    return this.getProductsLengthFromStorage();
  }
  // Return the quantity of a product in cart.
  getProductCountInCart( product: Product ){
    return this.getProductsFromStorageById( product.id ).length;
  }
  getProductsFromCart(){
    return this.getProductsObject( this.products );
  }
  getGrandTotal(products: Product[]){ 
      return products.reduce((subtotal: number, item: Product
        ) => subtotal + this.getProductCountInCart(item) * item.price * (100 - item.discount) / 100,0)
  }
  
  // WIshlist
  // Add item to Wishlist
  addToWishlist( product: Product ){
    this.addWishlistProductToStorage( product.id );
  } 
  // Delete item from Wishlist
  deleteFromWishlist( product: Product ){
    this.deleteWishlistProductFromStorage( product.id );
  } 
  // Remove a single quantity of an item from Wishlist
  decrementWishlistQuantity( product: Product ){
      this.decrementWishlistQuantityFromStorage( product.id );
  }
  // Return the count of items in the Wishlist
  getProductsCountInWishlist(){
    return this.getWishlistProductsLengthFromStorage();
  }
  // Return the quantity of a product in Wishlist.
  getProductCountInWishlist( product: Product ){
    return this.getWishlistProductsFromStorageById( product.id ).length;
  }
  getProductsFromWishlist(){
    return this.getWishlistProductsObject( this.products );
  }
  getWishlistGrandTotal(products: Product[]){
      return products.reduce((subtotal: number, item: Product
        ) => subtotal + this.getProductCountInWishlist(item) * item.price,0)
  }
}
