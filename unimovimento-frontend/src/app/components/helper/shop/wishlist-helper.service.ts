import { Injectable, OnInit } from '@angular/core';
import { ProductService } from './product.service';
import { Product } from '../../models/shop/product';

@Injectable({
  providedIn: 'root'
})
export class WishlistHelperService implements OnInit {
  constructor(
    private productService: ProductService
  ) {
    this.wishlistItems = []
  }
  public wishlistItems: Product[];

  public handleDeleteFromWishlist(product: Product) {
    if (confirm('Are you sure you want to delete all this item from your Wishlist?')) {
      this.productService.deleteFromWishlist(product);
    }
  }
  public getItemQuantity(product: Product) {
    return this.productService.getProductCountInWishlist(product);
  }
  public productAddtoCart(product: Product) {
    if (confirm('Are you sure you want to add this item from your Cart?')) {
      this.productService.addToCart(product);
      this.productService.deleteFromWishlist(product);
    }
  }

  ngOnInit(): void { 
    this.wishlistItems = this.productService.getProductsFromWishlist();

    this.productService.watchStorage().subscribe((data) => {
      this.wishlistItems = this.productService.getProductsFromWishlist();
    })
  }

}
