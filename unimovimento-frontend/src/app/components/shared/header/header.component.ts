import { Component, OnInit } from '@angular/core';
import { HelperService } from '../../helper/helper.service';
import { ProductService } from '../../helper/shop/product.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent extends HelperService implements OnInit {
  public cartlength: number | undefined;
  constructor(
    private productService: ProductService
  ) {
    super();
  }

  ngOnInit(): void {
    this.cartlength = this.productService.getProductsCountInCart();
    this.productService.watchStorage().subscribe((data) => {
      this.cartlength = this.productService.getProductsCountInCart();
    })
  }
}
