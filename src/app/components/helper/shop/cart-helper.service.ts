import { Injectable, OnInit } from '@angular/core';
import { ProductService } from './product.service';
import { Product } from '../../models/shop/product';

@Injectable({
  providedIn: 'root'
})
export class CartHelperService implements OnInit {
  constructor( 
    private productService: ProductService
  ) {
    this.cartItems = []
  }
  public cartItems: Product[];
  public itemQuantity: number | undefined

  public calculateprice() {
    return this.cartItems != undefined ? this.productService.getGrandTotal(this.cartItems) : 1;
  }
  public handleAddToCart(product: Product) {
    this.productService.addToCart(product);
  }
  public handleDeleteFromCart(product: Product) {
    if (confirm('Are you sure you want to delete all this item from your cart?')) {
      this.productService.deleteFromCart(product);
    }
  }
  public handleDecrementQty(product: Product) {
    this.productService.decrementQuantity(product)
  }
  public getItemQuantity(product: Product) {
    return this.productService.getProductCountInCart(product);
  }
  ngOnInit(): void {
    this.cartItems = this.productService.getProductsFromCart();

    this.productService.watchStorage().subscribe((data) => {
      this.cartItems = this.productService.getProductsFromCart();
    })
  }
}
